@extends('layouts.main')
@section('title', 'Make Donation - Life Saving Foundation')
@section('donate-active', 'active')
@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Make a Donation - Save Lives</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap_custom">
    <div class="container">
        <div class="row">
            @foreach($campaigns as $campaign)
                <div class="col-lg-4">
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
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ Ens Our Major Cause section =================-->
@endsection
