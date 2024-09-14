@extends('layouts.main')
@section('home-active', 'active')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @php $i = 0; @endphp
    @foreach($slideshow as $slide)
        @php $i++ @endphp
      <div class="carousel-item @if($i == 1) active @endif">
        <img class="d-block w-100" src="/storage/{{ $slide->image }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="offset-lg-1 col-lg-10">
                <h1 class="carousel-title">{{ $slide->title }}</h1>
                <p>{!! $slide->description !!}</p>
                <a class="main_btn" href="{{ route('donate') }}">donate now</a>
            </div>
        </div>
      </div>
    @endforeach
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
                    $<span id="funds-raised">{{ $donations->sum('amount') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 single_donation_box">
                <img src="img/icons/home3.png" alt="">
                <h4>Highest Donation</h4>
                <div class="bigValues text-center">
                    $<span id="highest-donations">{{ $donations->first()->amount ?? ''}}</span>
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
                <h1>{{ array_key_exists('title_1', $homepage) ? $homepage['title_1'] : '' }}</h1>
                <p>
                    {!! array_key_exists('description_1', $homepage) ? $homepage['description_1'] : '' !!}
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
                                <a href="{{ route('make-donation', $campaign->id) }}" class="main_btn2">donate here</a>
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
            @foreach($partners as $partner)
                <div class="item">
                    <img src="/storage/{{ $partner->image }}" style="height: 120px" class="img-fluid" alt="{{ $partner->title }}" title="{{ $partner->title }}">
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Clients Logo Area =================-->

<!--================ Support Campaign Area =================-->
<section class="support_campaign pad_bottom">
    <div class="container">
        <div class="row justify-content-center section-title-wrap">
            <div class="col-lg-12">
                <h1>{{ array_key_exists('title_2', $homepage) ? $homepage['title_2'] : '' }}</h1>
                <p>
                    {!! array_key_exists('description_2', $homepage) ? $homepage['description_2'] : '' !!}
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
                                <h4><a class="donate" href="{{ route('make-donation', $campaign->id) }}">{{ $campaign->title }}</a></h4>
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
                <h1>{{ array_key_exists('title_3', $homepage) ? $homepage['title_3'] : '' }}</h1>
                <p>
                    {!! array_key_exists('description_3', $homepage) ? $homepage['description_3'] : '' !!}
                </p>
                <a href="{{ route('donate') }}" class="main_btn2 mr-10">make donation now</a>
                {{-- <a href="#" class="main_btn2">Create Fundraising today</a> --}}
            </div>
        </div>
    </div>
</section>
<!--================ End Experience Area =================-->
@endsection

@section('moreJS')
<script type="module">
    import { CountUp } from  "/vendors/countUp/countUp.min.js";
    var totalDonations = $('#total-donations').html()
    var fundRaised = $('#funds-raised').html()
    var highestDonation = $('#highest-donations').html()
    var completedCampaigns = $('#completed-campaigns').html()

// Total Donations
let td_count = new CountUp('total-donations', totalDonations, {duration: 10});
if (!td_count.error) {
  td_count.start();
} else {
  console.error(td_count.error);
}
// Funds Raised
let fr_count = new CountUp('funds-raised', fundRaised, {duration: 7});
if (!fr_count.error) {
  fr_count.start();
} else {
  console.error(fr_count.error);
}
// Highest Donation
let hd_count = new CountUp('highest-donations', highestDonation, {duration: 5});
if (!hd_count.error) {
  hd_count.start();
} else {
  console.error(hd_count.error);
}
// Completed Campaigns
let cc_count = new CountUp('completed-campaigns', completedCampaigns, {duration: 10});
if (!cc_count.error) {
  cc_count.start();
} else {
  console.error(cc_count.error);
}
</script>
@endsection
