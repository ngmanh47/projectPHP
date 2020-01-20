<?php

namespace App\model2;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function categories(){
        return $this->hasOne('App\model2\category','id','id_cat');
    }
    public function brands(){
        return $this->hasOne('App\model2\brand','id','id_bra');
    }
    // Cách để thêm một thuộc tính bất kỳ nào đó theo í muốn
    // đặt tên nhu sau: getTên_thuộc_tính_bổ_sungAttribute : chú ý viết hoa
    public function getTendanhmucAttribute(){
        return $this->categories->name;
    }
    public function getTenthuonghieuAttribute(){
        return $this->brands->name;
    }
}