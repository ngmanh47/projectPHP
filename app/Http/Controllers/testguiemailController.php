<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class testguiemailController extends Controller
{
    public function index()
    {
        return view('testEmail');
    }

    public function gui(Request $rq)
    {
        //dd($rq);
        Mail::raw($rq->noidung, function ($message) use($rq) {
            //$message->from('john@johndoe.com', 'John Doe');                //đã cấu hình rồi
            //$message->sender('john@johndoe.com', 'John Doe');
            $message->to($rq->email, 'Test mail');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            // $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject($rq->tieude);
            //$message->priority(3);                                        // độ ưu tiên mail
            //$message->attach('pathToFile');
        });
    }
}