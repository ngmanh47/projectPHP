@extends('frontend.master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/styles/cart_styles.css')}}">
@endsection

@section('main')
<div class="container cart_container">
    <div class="card">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="{{route('home')}}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <form action="{{route('updatecart')}}" method="POST">
                @csrf
                @if (session('msg'))
                <div class="alert alert-{{session('type')}}">{{session('msg')}}</div>
                @endif
                @php
                    $tong = 0;
                @endphp
                @foreach (session('cart') as $id=>$item)
                @php
                    $thanhtien = $item['unitprice']*$item['qty_add'];
                    $tong +=$thanhtien;
                @endphp
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                        <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                    </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong>{{$item['name']}}</strong></h4>
                        <h4>
                            <small>Product description</small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                            <h6><strong>{{$item['unitprice']}} <span class="text-muted">x</span></strong></h6>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="quantity">
                                <input type="number" step="1" max="99" min="1" value="{{$item['qty_add']}}" title="Qty" class="qty" name="soluong[{{$id}}]">
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <a type="button" class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa cái này không?')" href="{{route('removeitem',$id)}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            
            <!-- END PRODUCT -->

            <div class="pull-right">
                <button class="btn btn-outline-secondary pull-right" type="submit">
                    Update shopping cart
                </button>
            </div>
        </form>
        </div>
        <div class="card-footer">
            <div class="pull-right" style="margin: 10px">
            <a href="{{route('order')}}" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>{{number_format($tong) .' đ'}}</b>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection