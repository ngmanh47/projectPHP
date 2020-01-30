@extends('frontend.master')

@section('style')
<link rel="stylesheet" href="{{asset('/public/frontend/plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/styles/contact_responsive.css')}}">
@endsection

@section('main')

<div class="container contact_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Map Container -->

    <div class="row">
        <div class="col">
            <div id="google_map">
                <div class="map_container">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gDzgEBH5nBk6Lzw-7e-GzxR3ISQBxeDk" width="100%" height="507px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Us -->

    <div class="row">

        <div class="col-lg-6 contact_col">
            <div class="contact_contents">
                <h1>{{__('contact')}}</h1>
                <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
                <div>
                    <p>(800) 686-6688</p>
                    <p>info.deercreative@gmail.com</p>
                </div>
                <div>
                    <p>mm</p>
                </div>
                <div>
                    <p>Open hours: 8.00-18.00 Mon-Fri</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>

            <!-- Follow Us -->

            <div class="follow_us_contents">
                <h1>Follow Us</h1>
                <ul class="social d-flex flex-row">
                    <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>

        </div>

        <div class="col-lg-6 get_in_touch_col">
            <div class="get_in_touch_contents">
                <h1>Get In Touch With Us!</h1>
                <p>Fill out the form below to recieve a free and confidential.</p>
            <form method="post" action="{{route('home')}}">
                    <div>
                        <input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
                        <input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
                        <textarea id="input_message" class="input_ph input_message" name="message"  placeholder="Message" rows="3" required data-error="Please, write us a message."></textarea>
                    </div>
                    <div>
                        <button type="submit" class="red_button message_submit_btn trans_300" value="Submit">send</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection