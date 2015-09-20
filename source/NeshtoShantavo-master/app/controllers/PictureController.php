<?php

class PictureController extends BaseController
{

    public function getView($id)
    {
        $picture = Picture::where('id','=',$id)->first();

        // layouts variables
        $this->layout->title = $picture->title.' | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/picture/'.$id;
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Шантава картинка, която ще разведри твоето настроение.';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier';

        // scripts for this view
        Asset::add('https://ws.sharethis.com/button/buttons.js');
        Asset::addScript('var disqus_config=function(){this.language="bg";};','footer');
        Asset::add('js/disqus.js');

        // nesting the view into the layout
        $this->layout->nest('content', 'picture.view', array('picture'=>$picture));
    }


    public function postVote()
    {
        $isVoted=false;
        $picture = Picture::where('id', '=', Input::get('id'))->first();

        if (Auth::check())
        {

            foreach ($picture->voted as $vote)
            {
                if ($vote->user->id == Auth::user()->id)
                {
                    $isVoted = true;
                }
            }

            if (!$isVoted)
            {
                Picture::where('id', '=', Input::get('id'))->increment('votes', 1);
                Vote::insert(array('picture_id' => $picture->id, 'user_id' => Auth::user()->id));

                $picture = Picture::where('id', '=', Input::get('id'))->first();
                return intval($picture->votes);
            }

        }

            return false;
    }


    public function getCreate()
    {
        if (Auth::guest()) { return Redirect::secure('user/login'); }

        $user = User::where('id', '=', Auth::user()->id)->first();

        // layouts variables
        $this->layout->title = 'Качване | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/picture/upload';
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Качи картинка';

        // nesting the view into the layout
        $this->layout->nest('content', 'picture.create', array('user'=>$user));

    }


    public function postCreate()
    {
        if (Auth::guest()) { return Redirect::secure('user/login'); }

        // do not use layout for this
        $this->layout = null;

        // check image size (must be < 10MB)
        if (Input::file('image')->getSize() > 10000000) { return Redirect::secure('picture/upload'); }

        // check image type (must be (jpg, png, gif or jpeg))
        if (Input::file('image')->getClientOriginalExtension() == "jpg"  ||
            Input::file('image')->getClientOriginalExtension() == "jpeg" ||
            Input::file('image')->getClientOriginalExtension() == "png"  ||
            Input::file('image')->getClientOriginalExtension() == "gif")
        {

            // add record to db
            (Input::get('isPrivate') == 1) ? ($isPrivate = 1) : ($isPrivate = 0);
            $id = Picture::insertGetId(array(
                            'user_id'=>Input::get('userId'),
                            'album_id'=>Input::get('albumId'),
                            'filename'=>Input::file('image')->getClientOriginalName(),
                            'size'=>Input::file('image')->getSize(),
                            'title'=>strip_tags(Purifier::clean(Input::get('title'))),
                            'isPrivate'=>$isPrivate
                            ));

            // move to albums folder
            $destinationPath = public_path() . "/files/" . Input::get('userId') . "/" . Input::get('albumId');
            Input::file('image')->move($destinationPath, Input::file('image')->getClientOriginalName());

            // redirect to uploaded picture
            return Redirect::secure('picture/'.$id);
        }

        return Redirect::secure('picture/upload');

    }

}
