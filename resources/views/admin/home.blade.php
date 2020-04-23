@extends('layouts.admin.main')
@section('title', 'Home - Life Saving Foundation')
@section('content')
<div class="blank">
    <h2>Home</h2>
    <div class="blankpage-main">
        <div class="row text-center">
            <div class="col-md-3">
                <h6>TOTAL DONATIONS</h6>
                <h1 style="color: darkred">{{ $donations->count() }}</h1>
            </div>
            <div class="col-md-3">
                <h6>TOTAL CAMPAIGNS CREATED</h6>
                <h1 style="color: darkred">{{ $total_campaigns }}</h1>
            </div>
            <div class="col-md-3">
                <h6>ACTIVE CAMPAIGNS</h6>
                <h1 style="color: darkred">{{ $open_campaigns }}</h1>
            </div>
            <div class="col-md-3">
                <h6>TOTAL FUNDS RAISED</h6>
                <h1 style="color: darkred">${{ $donations->sum('amount') }}</h1>
            </div><br><br><br><br><br>
            <div class="col-md-3">
                <h6>HIGHEST FUNDS</h6>
                <h1 style="color: darkred">${{ $donations->count() ? $donations->first()->amount : $donations->count()  }}</h1>
            </div>
            <div class="col-md-3">
                <h6>CLOSED CAMPAIGNS</h6>
                <h1 style="color: darkred">{{ $closed_campaigns }}</h1>
            </div><br>
        </div>

    </div>
</div>
@endsection
