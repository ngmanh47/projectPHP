@extends('frontend.master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/styles/order_styles.css')}}">
@endsection

@section('main')
<div class="page-area cart-page spad">
    <div class="container order_container">
    <form class="checkout-form" action="{{route('checkout')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="checkout-title">Người mua</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <input name="name_buy" type="text" placeholder="Họ tên">
                            @error('name_buy')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="phoneNum_buy" type="text" placeholder="Số điện thoại">
                            @error('phoneNum_buy')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input name="address_buy" type="text" placeholder="Địa chỉ">
                            @error('address_buy')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <input name="email_buy" type="text" placeholder="Email">
                            @error('email_buy')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <label><input  name="nhankhacmua" onchange="$('#nguoinhan').toggleClass('d-none')" type="checkbox" value="1"> Nguoi nhan khac nguoi mua</label>
                    </div> --}}
                    <div id="nguoinhan"  class="d-none">
                        <h4 class="checkout-title">Người nhận</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input  name="name_rec" type="text" placeholder="Họ tên">
                            </div>
                            <div class="col-md-6">
                                <input  name="phoneNum_rec" type="text" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-12">
                                <input  name="address_rec" type="text" placeholder="Địa chỉ">
                                <input  name="email_rec" type="text" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order-card">
                        <div class="order-details">
                            <div class="od-warp">
                                <h4 class="checkout-title">Đơn hàng của bạn</h4>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $tong = 0;
                                        @endphp
                                        @foreach (session('cart') as $id=>$item)
                                        @php
                                            $thanhtien = $item['unitprice']*$item['qty_add'];
                                            $tong +=$thanhtien;
                                            session(['tongtien'=>$tong]);
                                        @endphp
                                        <tr>
                                            <td>{{$item['name']}}<sub><span class="text-danger">x{{number_format($item['qty_add']) }}</span></sub></td>
                                            <td>{{number_format($thanhtien) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Tạm tính</td>
                                            <td>{{number_format($tong) }}</td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <td>Phí vận chuyển</td>
                                            <td>Miễn phí</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <th>{{number_format($tong) }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="pm-item">
                                    <input type="radio" value="paypal" name="payment" id="one">
                                    <label for="one">Paypal</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="cod" name="payment" id="two" checked>
                                    <label for="two">Giao hàng nhận tiền</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="atm" name="payment" id="three">
                                    <label for="three">Thẻ ATM</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="ck" name="payment" id="four">
                                    <label for="four">Chuyển khoản</label>
                                </div>
                            </div>
                        </div>
                        <button class="site-btn btn-full" type="submit">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection