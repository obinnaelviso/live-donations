@extends('layouts.main')
@section('title', 'Contact - Life Saving Foundation')
@section('contact-active', 'active')
@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>{{ array_key_exists('address', $about) ? $about['address'] : '' }}</h6><br>
                        {{-- <p>Santa monica bullevard</p> --}}
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6>
                            <a href="#">{{ array_key_exists('phone', $about) ? $about['phone'] : '' }}</a>
                        </h6><br>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6>
                            <a href="#">{{ array_key_exists('email', $about) ? $about['email'] : '' }}</a>
                        </h6>
                        <p>{{ array_key_exists('contact_desc', $about) ? $about['contact_desc'] : '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @include('layouts.admin.errors')
                @include('layouts.admin.alerts')
                <form class="row contact_form" action="{{ route('send.mail') }}" method="post" id="contactForm">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required value="{{ old('subject') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="2" placeholder="Enter Message" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
@endsection
