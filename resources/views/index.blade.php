@extends('layouts.main')
@section('home-active', 'active')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/img/image1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="offset-lg-2 col-lg-8">
                <img class="img-fluid" src="img/banner/text-img.png" alt="">
                <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some
                    for as low as each.</p>
                <a class="main_btn mr-10" href="#">donate now</a>
                    <a class="white_bg_btn" href="#">view activity</a>
            </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 overlay" src="/img/image2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="offset-lg-2 col-lg-8">
                <img class="img-fluid" src="img/banner/text-img.png" alt="">
                <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some
                    for as low as each.</p>
                <a class="main_btn mr-10" href="#">donate now</a>
                    <a class="white_bg_btn" href="#">view activity</a>
            </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/img/image3.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="offset-lg-2 col-lg-8">
                <img class="img-fluid" src="img/banner/text-img.png" alt="">
                <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some
                    for as low as each.</p>
                <a class="main_btn mr-10" href="#">donate now</a>
                    <a class="white_bg_btn" href="#">view activity</a>
            </div>
        </div>
      </div>
    </div>
</div>


<!--================ Start important-points section =================-->
<section class="donation_details pad_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home1.png" alt="">
                <h4>Total Donation</h4>
                <div class="bigValues text-center">
                    <span id="total-donations">{{ $donations->count() }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home2.png" alt="">
                <h4>Fund Raised</h4>
                <div class="bigValues text-center">
                    $<span id="fund-raised">{{ $donations->sum('amount') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home3.png" alt="">
                <h4>Highest Donation</h4>
                <div class="bigValues text-center">
                    $<span id="highest-donation">{{ $donations->first()->amount }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home4.png" alt="">
                <h4>Completed Campaigns</h4>
                <div class="bigValues text-center">
                    <span id="completed-campaigns">{{ $closed_campaigns }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End important-points section =================-->

<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap">
    <div class="container">
        <div class="row justify-content-center section-title-wrap">
            <div class="col-lg-12">
                <h1>Our Major Causes</h1>
                <p>
                    The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence the natural
                    chain of events.
                </p>
            </div>
        </div>

        <div class="row">
            <div id="our-major-cause" class="owl-carousel">
                @foreach($featured_campaigns as $campaign)
                    <div class="card">
                        <div class="card-body">
                            <figure>
                                <div class="card-img-top img-card" style="background-image: url('/storage/{{ $campaign->featured_image }}')" alt="{{ $campaign->title }}"></div>
                            </figure>
                            @php
                                $percentage = (int)(($campaign->donations->sum('amount')/$campaign->target) * 100);
                            @endphp
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percentage }}%;">

                                    <span>Funded {{ $percentage }}%</span>
                                </div>
                            </div>
                            <div class="card_inner_body">
                                <div class="card-body-top">
                                    <span>Raised: ${{ $campaign->donations->sum('amount') }}</span> / ${{ $campaign->target }}
                                </div>
                                <h4 class="card-title">{!! $campaign->title !!}</h4>
                                <p class="card-text">{!! substr($campaign->description, 0, 200) !!}
                                </p>
                                <a href="#" class="main_btn2">donate here</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--================ Ens Our Major Cause section =================-->

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

<!--================ Support Campaign Area =================-->
<section class="support_campaign pad_bottom">
    <div class="container">
        <div class="row justify-content-center section-title-wrap">
            <div class="col-lg-12">
                <h1>Support a campaign or fundraiser</h1>
                <p>
                    The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence the natural
                    chain of events.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($random_campaigns as $campaign)
                <div class="col-lg-6 mb-30">
                    <div class="campaign_box">
                        <div class="camppaign d-flex">
                            <div class="img-box" style="background: url('/storage/{{ $campaign->featured_image }}')"></div>
                            @php
                                $percentage = (int)(($campaign->donations->sum('amount')/$campaign->target) * 100);
                            @endphp
                            <div>
                                <h4><a class="donate" href="#">{{ $campaign->title }}</a></h4>
                                <h4>${{ $campaign->target }}</h4>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percentage }}%;">
                                <span style="display: inline-block">Funded {{ $percentage }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Support Campaing Area =================-->

<!--================ Start Experience Area =================-->
<section class="experience_donation section_gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <h1>Experience How your Donation Can Reach</h1>
                <p>he French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence, and upturning
                    of the natural chain of events that resounded.</p>
                <a href="#" class="main_btn2 mr-10">make donation now</a>
                <a href="#" class="main_btn2">Create Fundraising today</a>
            </div>
        </div>
    </div>
</section>
<!--================ End Experience Area =================-->
@endsection

@section('moreJS')
<script>
$('#total-donations').animationCounter({
    start: 0,
    delay: 200,
    step: 1,
    end: $('#total-donations').html(),
});
$('#fund-raised').animationCounter({
    start: 0,
    delay: 1,
    step: 11,
    end: $('#fund-raised').html(),
});
$('#highest-donation').animationCounter({
    start: 0,
    delay: 2,
    step: 11,
    end: $('#highest-donation').html(),
});
$('#total-campaigns').animationCounter({
    start: 0,
    delay: 500,
    step: 1,
    end: $('#total-campaigns').html(),
});
</script>
@endsection
