<?php

namespace App\model2;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public function products(){
        return $this->hasMany('App\model2\category','id_cat','id');
    }
}