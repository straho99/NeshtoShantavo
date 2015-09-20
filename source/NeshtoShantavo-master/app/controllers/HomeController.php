<?php

class HomeController extends BaseController
{

	public function getHome()
	{
		// layouts variables
        $this->layout->title = 'Началo | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com';
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Това е началната страница';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier';

        // how to add css/js files ? (see https://github.com/RoumenDamianoff/laravel-assets/wiki)
        // Asset::add('js/home.js');
        // Asset::add('css/test.css');

        // get 10 most voted pictures
        $pictures = Picture::orderBy('votes','DESC')->paginate(12);

        // nesting the view into the layout
		$this->layout->nest('content', 'home.home', array('pictures'=>$pictures));
	}


	public function getRules()
	{
		// layouts variables
        $this->layout->title = 'Правила | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/rules';
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Това са правилата на сайта';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier, правила';

        Asset::add('css/Login.css');

        // nesting the view into the layout
		$this->layout->nest('content', 'home.rules');
	}


	public function getTeam()
	{
		return Redirect::secure('/');
	}


	public function getContacts()
	{
		return Redirect::secure('/');
	}

	public function getAbout()
	{
		return Redirect::secure('/');
	}


	public function getSitemap()
	{
		// create new sitemap object
	    $sitemap = App::make("sitemap");

	    // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
	    // by default cache is disabled
	    $sitemap->setCache('shantavo.sitemap', 3600);

	    // check if there is cached sitemap and build new only if is not
	    if (!$sitemap->isCached())
	    {
	         // add item to the sitemap (url, date, priority, freq)
	         $sitemap->add(URL::to('/'), '2014-12-16T20:10:00+02:00', '1.0', 'daily');
	         $sitemap->add(URL::to('/rules'), '2014-12-16T20:10:00+02:00', '1.0', 'weekly');
	         $sitemap->add(URL::to('/category/new'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');
	         $sitemap->add(URL::to('/category/shantavo'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');
	         $sitemap->add(URL::to('/category/sexy'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');
	         $sitemap->add(URL::to('/category/sladko'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');
	         $sitemap->add(URL::to('/category/krasivo'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');
	         $sitemap->add(URL::to('/category/strashno'), '2014-12-16T12:30:00+02:00', '0.9', 'daily');

	         $pictures = Picture::orderBy('uploaded_at', 'desc')->get();

	         foreach ($pictures as $picture)
	         {
	            $sitemap->add(secure_url('/picture/'.$picture->id), date('Y-m-d\TH:i:sP',strtotime($picture->uploaded_at)), '0.8', 'weekly');
	         }
	    }

	    return $sitemap->render('xml');
	}


	public function getFeed()
	{

        $feed = Feed::make();

        //$feed->clearCache();
        $feed->setCache(180, 'shantavo-feed');

        if (!$feed->isCached())
        {

            $pictures = Picture::orderBy('uploaded_at', 'desc')->take(20)->get();

            $feed->title = 'Нещо Шантаво';
            $feed->description = 'Последни снимки';
            $feed->link = 'https://neshto.shantavo.com/';
            $feed->logo = "https://neshto.shantavo.com/favicon.png";
            $feed->icon = "https://neshto.shantavo.com/favicon.png";
            $feed->pubdate = $pictures[0]->uploaded_at;
            $feed->lang = 'bg';
            $feed->setDateFormat('datetime');

           foreach ($pictures as $picture)
            {
                $feed->add($picture->title, $picture->user->username, secure_url('picture/'.$picture->id), $picture->uploaded_at, $picture->title, $picture->title);
            }

        }

         return $feed->render('atom');
	}

}
