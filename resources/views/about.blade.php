@extends('layouts.main')
@section('title', 'About - Life Saving Foundation')
@section('about-active', 'active')
@section('content')
<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>About Us</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================ Start About Us Section =================-->
<section class="about_us section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="about_img">
                    <img class="img-fluid" src="/img/logo-w-caption.jpg" alt="Life Saving Foundation">
                </div>
            </div>

            <div class="offset-lg-1 col-lg-6">
                <div class="content_wrapper">
                    <h1 style="font-weight: 700; text-transform: uppercase">Life Saving Foundation</h1>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
                        in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate
                        behavior is often laughed.</p>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
                        in the workplace.</p>
                    <a href="{{ route('donate') }}" class="main_btn">Donate Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End About Us Area =================-->


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <hr>
        </div>
    </div>
</div>

<!--================ Start Clients Logo Area =================-->
<section class="clients_logo_area section_gap">
    <div class="container">
        <div class="clients_slider owl-carousel">
            <div class="item">
                <img src="img/clients-logo/c-logo-1.png" alt="">
            </div>
            <div class="item">
                <img src="img/clients-logo/c-logo-2.png" alt="">
            </div>
            <div class="item">
                <img src="img/clients-logo/c-logo-3.png" alt="">
            </div>
            <div class="item">
                <img src="img/clients-logo/c-logo-4.png" alt="">
            </div>
            <div class="item">
                <img src="img/clients-logo/c-logo-5.png" alt="">
            </div>
        </div>
    </div>
</section>
<!--================ End Clients Logo Area =================-->
@endsection
