<?php

class Vote extends Eloquent
{

    protected $table = 'votes';
    protected $primaryKey = 'picture_id';
    public $timestamps = false;


    public function user()
    {
        $this->primaryKey = 'user_id';
        return $this->belongsTo('User');
    }


    public function picture()
    {
        $this->primaryKey = 'picture_id';
        return $this->belongsTo('Picture');
    }


}