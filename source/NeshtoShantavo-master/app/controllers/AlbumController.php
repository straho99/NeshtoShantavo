<?php

class AlbumController extends BaseController
{

    public function getView($id)
    {
        $album = Album::where('id','=',$id)->first();
        $pictures = Picture::where('album_id','=',$id)->orderBy('votes','desc')->paginate(12);

        // layouts variables
        $this->layout->title = $album->name . ' | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/album/'.$id;
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Това е албум';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier';

        // nesting the view into the layout
        $this->layout->nest('content', 'album.view', array('album'=>$album,'pictures'=>$pictures));
    }


    public function postCreate()
    {
        if (Auth::guest()) { return Redirect::secure('user/login'); }

        // do not use layout for this
        $this->layout = null;

        // add to db
        (Input::get('isPrivate') == 1) ? ($isPrivate = 1) : ($isPrivate = 0);

        Album::insert(array(
                        'user_id'=>Input::get('userId'),
                        'categories_id'=>Input::get('category'),
                        'name'=>strip_tags(Purifier::clean(Input::get('name'))),
                        'isPrivate'=>$isPrivate
                    ));

        // redirect to albums
        return Redirect::secure('user/albums');

    }

}
