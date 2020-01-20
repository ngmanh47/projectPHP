<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    protected $table = 'danhmuc';
    protected $primaryKey = 'MA';
    public $timestamps = false;
    public function sanphams(){
        return $this->hasMany('App\model\danhmuc','MADANHMUC','MA');
    }
}