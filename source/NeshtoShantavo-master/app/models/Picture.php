<?php

class Picture extends Eloquent
{

    protected $table = 'pictures';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function user()
    {
        $this->primaryKey = 'id';
        return $this->belongsTo('User');
    }


    public function voted()
    {
        $this->primaryKey = 'id';
        return $this->hasMany('Vote','picture_id','id');
    }


    public function album()
    {
        $this->primaryKey = 'id';
        return $this->belongsTo('Album');
    }


}