<?php

class Album extends Eloquent
{

    protected $table = 'albums';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function user()
    {
        $this->primaryKey = 'id';
        return $this->belongsTo('User');
    }


    public function category()
    {
        $this->primaryKey = 'id';
        return $this->belongsTo('Category');
    }


    public function pictures()
    {
        return $this->hasMany('Picture','album_id')->orderBy('votes','DESC');
    }


}