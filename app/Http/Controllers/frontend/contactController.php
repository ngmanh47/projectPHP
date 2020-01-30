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
    public function sendOpinion(Request $rq)
    {
        // dd($rq->all());
        //validation
        $validatedData = $rq->validate([
            'name'=> 'required|max:50',
            'email'=> 'required | email:rfc',
            'message'=> 'required',
        ]);
        
        // Send email
        
        // Notification
        return redirect()->route('home');
    }
}