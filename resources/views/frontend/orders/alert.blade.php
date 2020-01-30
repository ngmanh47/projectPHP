@extends('frontend.master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/styles/order_styles.css')}}">
@endsection

@section('main')
<div class="container order_container">
    <div class="page-area cart-page spad">
        <div class="container">
           <div class="alert alert-success">
            Bạn vừa đặt hàng thành công<br>
            Mã số đơn hàng là: <strong>{{session('ordered')->numOrder}}</strong><br>
            Vui lòng kiểm tra email để biết thêm thông tin chi tiết.
           </div>
        </div>
    </div>
</div>
@endsection