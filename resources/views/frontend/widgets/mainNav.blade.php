<div class="main_nav_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="logo_container">
                <a href="{{route('home')}}">colo<span>shop</span></a>
                </div>
                <nav class="navbar">
                    <ul class="navbar_menu">
                        @foreach ($category as $item)
                        <li><a href="{{$item->router}}">{{$item->name}}</a></li>
                        @endforeach
                    <li><a href="{{route('contact')}}">Liên hệ</a></li>
                    </ul>
                    <ul class="navbar_user">
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li class="checkout">
                            <a href="#">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="checkout_items" class="checkout_items">2</span>
                            </a>
                        </li>
                    </ul>
                    <div class="hamburger_container">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>