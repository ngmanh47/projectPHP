@extends('backend.master')
@section('main')

<div class="row">
     <!--Left content-->
     <div class="col-sm-6">
        <!--Narbar product images-->
        <img src="{{asset('backend/images/adidas03.jpg')}}" width="400px" height="400px">
        <!--list detail images of product-->
        <div class="row mt-2">
            <ul style="list-style-type: none;">
                <li><img src="{{asset('public/backend/images/adidas01.jpg')}}" width="90px" height="90px"></li>
                <li><img src="{{asset('public/backend/images/adidas01.jpg')}}" width="90px" height="90px"></li>
                <li><img src="{{asset('public/backend/images/adidas01.jpg')}}" width="90px" height="90px"></li>
            </ul>
        </div>
    </div>
    <!--Right content-->
    <div class="col-sm-6">
        <!--Name of product-->
        <div class="row justify-content-center">
            <h2 class="product-name">{{$sanpham->name}}</h2>
        </div>
        <!--Product detail-->
        <div class="row ml-5">
            <dl class="dl-horizontal">
                <!--Current Price: giá hiện tại-->
                <dt>
                    <h5><b>Giá hiện tại:</b></h5>
                </dt>
                <dd>
                    <h5>{{$sanpham->unitprice}}</h5>
                </dd>
                <!--Price: giá mua ngay-->
                <dt>
                    <h5><b>Mô tả sản phẩm:</b></h5>
                </dt>
                <dd>
                    <h5>{{$sanpham->description}}</h5>
                </dd>
                <!--Description: Thông tin người bán và điểm đánh giá-->
                <dt>
                    <h5><b>Chi tiết:</b></h5>
                </dt>
                <dd>
                    <h5>{{$sanpham->detail}}</h5>
                </dd>
                <!--Time start: Thời điểm đăng-->
                <dt>
                    <h5><b>Ngày tạo:</b></h5>
                </dt>
                <dd>
                    <h5>{{$sanpham->created_at}}</h5>
                </dd>
                
            </dl>
        </div>
        <!--Add to cart-->
        <div class="row mt-2 ml-5">
            <a href="{{route('san-pham.edit',$sanpham->id)}}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-edit"></i> Edit
            </a>
        </div>
        
        <!--Đang suy nghĩ-->
    </div>
</div>

@endsection
