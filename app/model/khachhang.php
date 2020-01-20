<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'MA';
    public $timestamps = false;
}