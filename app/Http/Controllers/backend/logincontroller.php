<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function login()
    {
        $data = [
            'pagename'=>'Đăng nhập hệ thống',
            'pagetitle'=>'Đăng nhập',
        ];
        return view('backend.admins.login',$data);
    }

    public function loginPost(Request $rq)
    {
        //dd($rq->all());
        if(Auth::guard('backend')->attempt(['username' => $rq->username, 'password' => $rq->password,'status'=>1],$rq->remember))
        {
            return redirect()->route('san-pham.index');
        }else{
            return redirect()->back()->with(['msg'=>'Thông tin đăng nhập không đúng','type'=>'danger']);
        }
    }
    public function logout()
    {
        Auth::guard('backend')->logout();
        return redirect()->route('b.dangnhap')->with(['msg'=>'Bạn đã thoát khỏi hệ thống','type'=>'warning']);
    }
}