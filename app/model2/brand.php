<?php

namespace App\model2;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public function brands(){
        return $this->hasMany('App\model2\brand','id_bra','id');
    }
}