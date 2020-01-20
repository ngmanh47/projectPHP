<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    /*
    1. Đặt tên
        Dùng cơ chế phát hiện tên bảng tự động theo cú pháp của tiếng anh
        Tên model là số it, tên bảng là số nhiều
        vd: category -> categories
        vd: sanpham -> sanphams

        Nếu tự đặt tên thì config lại bảng model đang làm việc như sau
            Tạo thành viên định nghĩa lại table làm việc: protected $table = 'tenbangcuaban'
    */
    protected $table = 'sanpham';
    /*
    2. Hệ thống tự hiểu cột tên là id -> khóa chính
        Tất cả các bảng trong model laravel đều phải có cột này
        created_at: ngày tạo
        updated_at: ngày cập nhật
    */
    
    protected $primaryKey = 'MA';
    public $timestamps = false; // quản lý created_at và updated_at, nếu muốn tắt thì = false

    public function danhmuc(){
        return $this->hasOne('App\model\danhmuc','MA','MADANHMUC');
    }
    public function thuonghieu(){
        return $this->hasOne('App\model\thuonghieu','MA','MATHUONGHIEU');
    }
    // Cách để thêm một thuộc tính bất kỳ nào đó theo í muốn
    // đặt tên nhu sau: getTên_thuộc_tính_bổ_sungAttribute : chú ý viết hoa
    public function getTendanhmucAttribute(){
        return $this->danhmuc->TEN;
    }
    public function getTenthuonghieuAttribute(){
        return $this->thuonghieu->TEN;
    }
}