<?php

class Category extends Eloquent
{

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function albums()
    {
        return $this->hasMany('Album','categories_id');
    }


}