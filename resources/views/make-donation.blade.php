@extends('layouts.main')
@section('title', 'Make a Donation - Life Saving Foundation')
@section('about-active', 'active')
@section('content')
<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center" style="background-image: url('/storage/{{ $campaign->featured_image }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Make a donation - Save Many Lives</h2>
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
                <h1>How to Make a Donation</h1>
                <ol style="font-size: 18px">
                    <li>Fill in your details below: </li>
                    <li>Chat with our customer care using the button at the bottom right of the page to get your secure payment link.</li><br>
                </ol>
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>{{ session()->get('success') }}</strong>
                    </div>
                @endif
                <form action="{{ route('process-donation', $campaign->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Make Donation</button>
                    </div>
                </form>
            </div>

            <div class="offset-lg-1 col-lg-6">
                <div class="content_wrapper">
                    <h1 style="font-weight: 700; text-transform: uppercase">{{ $campaign->title }}</h1>
                    <p>{!! $campaign->description !!}</p>
                    <h2>HELP US REACH OUR TARGET: <strong style="color: #ea2c58">${{ $campaign->target }}</strong></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End About Us Area =================-->

@endsection
