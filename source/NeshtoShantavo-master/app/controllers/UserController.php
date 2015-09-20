<?php

class UserController extends BaseController
{


    public function getProfile()
    {
        // check if visitor is not logged
        if (Auth::guest()) { return Redirect::secure('user/login'); }

        // layouts variables
        $this->layout->title = 'Профил | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/user/profile';
        $this->layout->robots = 'noindex,nofollow,noodp,noydir';
        $this->layout->description = 'Това е потребителски профил';

        // nesting the view into the layout
        $this->layout->nest('content', 'user.profile');
    }


    public function getPublicProfile($username)
    {
        // check if visitor is not logged
        //if (Auth::guest()) { return Redirect::secure('user/login'); }

        $user = User::where('username','=',$username)->first();

        // layouts variables
        $this->layout->title = 'Профил:'.$user->username.' | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/user/'.$user->username;
        $this->layout->robots = 'noindex,nofollow,noodp,noydir';
        $this->layout->description = 'Това е потребителски профил';

        // nesting the view into the layout
        $this->layout->nest('content', 'user.publicprofile',array('user'=>$user));
    }


	public function getLogin()
	{
		if (!Auth::guest()) { return Redirect::secure('/'); }

		// layouts variables
        $this->layout->title = 'Вход | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/login';
        $this->layout->robots = 'noindex,nofollow,noodp,noydir';
        $this->layout->description = 'Това е логин форма';

        Asset::add('css/Login.css');

        // nesting the view into the layout
		$this->layout->nest('content', 'user.login');
	}


	public function postLogin()
	{
        $rules = array(
                'email'  => 'required|email',
                'password' => 'required|min:4',
                //'recaptcha_response_field' => 'required|recaptcha'
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->passes())
        {
            $user = User::where('email','=',strip_tags(Input::get('email')))->first();
            $remember = (Input::has('remember')) ? true : false;

            if (Hash::check(Input::get('password'), $user->password))
            {
                Auth::login($user, $remember);
                return Redirect::secure('/');
            } else {
                return Redirect::secure('/user/login')->withInput();
                }
        } else {
            return Redirect::secure('/user/login')->withInput()->withErrors($validation);
            }
	}


	public function getLogout()
	{
		if (Auth::guest()) { return Redirect::secure('/'); }

        Auth::logout();
        return Redirect::to('/user/login');
	}


	public function getRegister()
	{
		// register form
        if (!Auth::guest()) { return Redirect::secure('/'); }

        // layouts variables
        $this->layout->title = 'Регистрация | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/user/registration';
        $this->layout->robots = 'noindex,nofollow,noodp,noydir';
        $this->layout->description = 'Това е регистрационна форма';

        // nesting the view into the layout
        $this->layout->nest('content', 'user.register');

	}


	public function postRegister()
	{
		// register form post request
        $rules = array(
                'firstName'  => 'required|min:2|max:30',
                'lastName'  => 'required|min:2|max:30',
                'username'  => 'required|min:4|max:16',
                'email'  => 'required|email',
                'sex' => 'required',
                'password' => 'required|min:6',
                //'recaptcha_response_field' => 'required|recaptcha'
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->passes())
        {
            // add to db
            $data = array(
                'first_name' => strip_tags(Purifier::clean(Input::get('firstName'))),
                'last_name' => strip_tags(Purifier::clean(Input::get('lastName'))),
                'username' => strip_tags(Purifier::clean(Input::get('username'))),
                'password' => Hash::make(Input::get('password')),
                'email' => strip_tags(Input::get('email')),
                'sex' => strip_tags(Purifier::clean(Input::get('sex')))
            );

            if(User::insert($data))
            {
                $user = User::where('email','=',strip_tags(Purifier::clean(Input::get('email'))))->first();
                Auth::login($user, true);

                return Redirect::secure('/');
            }

        }

        return Redirect::secure('/user/register');

	}


    public function getAlbums()
    {
        if (Auth::guest()) { return Redirect::secure('/'); }

        // layouts variables
        $this->layout->title = 'Албуми | Нещо Шантаво';
        $this->layout->canonical = 'https://neshto.shantavo.com/user/albums';

        $albums = Album::where('user_id','=',Auth::user()->id)->get();
        $categories = Category::all();

        // nesting the view into the layout
        $this->layout->nest('content', 'user.albums', array('albums' => $albums, 'categories'=>$categories));
    }


}
