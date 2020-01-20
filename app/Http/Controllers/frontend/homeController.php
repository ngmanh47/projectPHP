<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model2\product;
use App\Http\Requests\validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        $newArrivals = product::orderBy('id','ASC')->limit(10)->get(); // order by create_at
        $bestSeller = product::orderBy('id','ASC')->limit(8)->get();
        $data = [
            'newArrivals' => $newArrivals,
            'bestSeller' => $bestSeller,
        ];
        return view('frontend.home', $data);
    }
}