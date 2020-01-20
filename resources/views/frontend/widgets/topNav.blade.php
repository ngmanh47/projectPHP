
<div class="top_nav">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="top_nav_left">free shipping on all u.s orders over $50</div>
            </div>
            <div class="col-md-6 text-right">
                <div class="top_nav_right">
                    <ul class="top_nav_menu">

                        <li class="language">
                        <a href="">
                                {{__('language')}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="language_selection">
                            <li><a href="{{route('changeLang','vi')}}">Vietnamese</a></li>
                                <li><a href="{{route('changeLang','en')}}">English</a></li>
                            </ul>
                        </li>
                        <li class="account">
                            <a href="#">
                                {{__('myAccount')}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="account_selection">
                                <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>