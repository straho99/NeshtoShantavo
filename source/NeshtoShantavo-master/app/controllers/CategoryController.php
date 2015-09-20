<?php

class CategoryController extends BaseController
{

	public function getView($slug)
	{
		$category = Category::where('slug', '=', $slug)->first();
		$albums = array();

		foreach ($category->albums as $a)
		{
			$albums[] = $a->id;
		}

		$pictures = Picture::whereIn('album_id', $albums)->orderBy('votes','DESC')->paginate(12);


		// layouts variables
        $this->layout->title = 'Категория: '.$category->name.' | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/category/'.$category->slug;
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Това е началната страница';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier';


        // nesting the view into the layout
		$this->layout->nest('content', 'category.view', array('category' => $category,'pictures' => $pictures));
	}


	public function getNew()
	{
		$pictures = Picture::orderBy('uploaded_at','DESC')->paginate(12);

		// layouts variables
        $this->layout->title = 'Последно качени | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/category/new';
        $this->layout->robots = 'index,follow,noodp,noydir';
        $this->layout->description = 'Това е началната страница';
        $this->layout->keywords = 'начало, нещо шантаво, team navy pier';


        // nesting the view into the layout
		$this->layout->nest('content', 'category.new', array('pictures' => $pictures));
	}

}
