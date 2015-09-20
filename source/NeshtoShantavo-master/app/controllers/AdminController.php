<?php

class AdminController extends BaseController
{

    public function getIndex()
    {
        if (Auth::guest() || Auth::user()->isAdmin == 0) { return Redirect::secure('/'); }

        // layouts variables
        $this->layout->title = 'Админ панел | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/admin/';
        $this->layout->robots = 'noindex,nofollow,noodp,noydir';

        $users = count(User::all());
        $admins = count(User::where('isAdmin',">",0)->get());
        $categories = count(Category::all());
        $albums = count(Album::all());
        $votes = count(DB::table('votes')->get());
        $pictures = count(Picture::all());
        $pictureSize = 0;

        foreach (Picture::all() as $p)
        {
            $pictureSize += $p->size;
        }

        // get disqus stats
        include(app_path().'/config/_disqus.php');

        $disqus = new DisqusAPI(getDisqusKey());
        $disqus->setSecure(false);

        $comments = $disqus->posts->list(array('forum'=>'shantavo'));

        // nesting the view into the layout
        $this->layout->nest('content', 'admin.index',array(
                                                        'users'=>$users,
                                                        'admins'=>$admins,
                                                        'votes'=>$votes,
                                                        'categories'=>$categories,
                                                        'albums'=>$albums,
                                                        'pictures'=>$pictures,
                                                        'pictureSize'=>$pictureSize,
                                                        'comments'=>$comments
                                                    ));
    }


}
