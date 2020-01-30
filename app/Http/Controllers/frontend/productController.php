<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model2\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function proDetail($id)
    {
        $item = product::where('id', $id)->first();
        $data = [
            'item'=> $item,
            'pagetitle' => $item['name'],
        ];
        return view('frontend.products.productDetail', $data);
    }
}