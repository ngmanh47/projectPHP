<?php

namespace App\model2;

use Illuminate\Database\Eloquent\Model;

class func extends Model
{
    protected $table = 'funcs';
    protected $primaryKey = 'id';
    // public function getTenchucnangAttribute($id,$id_parent=0){
    //     //$list_func = func::where('id',$id)->where('id_parent',$id_parent)->get();
    //     return $list_func;
    // }
}