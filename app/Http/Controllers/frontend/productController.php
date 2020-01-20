<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model2\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function proByCat($id)
    {
        $sanpham = product::where('id_cat',$id)->where('status','!=',0)->get();
        $data = [
            'pageicon' =>'fa fa-eye',
            'pagename' =>'Sản phẩm chi tiết',
            'pagetitle'=>'Sản phẩm chi tiết',
            'sanpham'=>$sanpham
        ];
        return view('backend.products.detail', $data);
    }
    public function proDetail($id)
    {
        $item = product::where('id', $id)->first();
        return view('frontend.products.productDetail', $item);
    }
}