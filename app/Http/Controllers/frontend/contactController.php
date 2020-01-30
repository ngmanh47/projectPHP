<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
        $data = [
            'pagetitle' => 'Liên hệ',
        ];
        return view('frontend.contact', $data);
    }
}