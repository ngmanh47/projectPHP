<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class thuonghieu extends Model
{
    protected $table = 'thuonghieu';
    protected $primaryKey = 'MA';
    public $timestamps = false;
    public function thuonghieus(){
        return $this->hasMany('App\model\thuonghieu','MATHUONGHIEU','MA');
    }
}