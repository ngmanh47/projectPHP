<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Best Sellers</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">
                        @foreach ($bestSeller as $item)
                        <div class="owl-item product_slider_item">
                            <div class="product-item">
                                <div class="product discount">
                                    <div class="product_image">
                                        <img src="public/frontend/images/product_{{$item->id}}.png" >
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20%</span></div>
                                    <div class="product_info">
                                    <h6 class="product_name"><a href="{{route('proDetail',$item->id)}}">{{$item->name}}</a></h6>
                                    <div class="product_price">{{$item->unitprice*0.8}}<span>{{$item->unitprice}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <!-- Slide 1 -->

                        <div class="owl-item product_slider_item">
                            <div class="product-item">
                                <div class="product discount">
                                    <div class="product_image">
                                        <img src="{{asset('frontend/images/product_1.png')}}" >
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                        <div class="product_price">$520.00<span>$590.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->

                        <div class="owl-item product_slider_item">
                            <div class="product-item women">
                                <div class="product">
                                    <div class="product_image">
                                        <img src="{{asset('frontend/images/product_2.png')}}" >
                                    </div>
                                    <div class="favorite"></div>
                                    <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                        <div class="product_price">$610.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Slider Navigation -->

                    <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>