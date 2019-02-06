<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public $dir = '/images/';
    protected $fillable =['path'];

    public function getPathAttribute($path){
        return $this->dir.$path;
    }
}
