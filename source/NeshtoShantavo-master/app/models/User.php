<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');


	public function pictures()
    {
        return $this->hasMany('Picture','user_id');
    }


    public function votes()
    {
        return $this->hasMany('Vote','user_id');
    }


	public function albums()
    {
        return $this->hasMany('Album','user_id');
    }

}
