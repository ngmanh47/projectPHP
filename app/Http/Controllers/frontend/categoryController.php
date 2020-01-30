<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model2\product;
use App\model2\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index($id)
    {
        $proByCat = product::where('id_cat',$id)->orderBy('id','ASC')->limit(12)->get(); 
        $pagetitle = category::select('name')->where('id',$id)->get(); 
        $data = [
            'proByCat' => $proByCat,
            'pagetitle' => $pagetitle[0]['name'],
        ];
        return view('frontend.products.proByCat', $data);
    }
}