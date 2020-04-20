@extends('layouts.admin.main')
@section('title', 'Manage Campaigns - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2>Manage Campaigns</h2>
    <div class="blankpage-main">
        <div class="row">
            @include('layouts.admin.alerts')
            <div class="col-12">
                <table id="campaigns" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Featured Image</th>
                            <th>Title</th>
                            <th>Donations Count</th>
                            <th>Donations</th>
                            <th>Target</th>
                            {{-- <th>Is Featured?</th> --}}
                            {{-- <th>Expiry Date</th> --}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="my-table">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><img src="/storage/{{ $campaign->featured_image }}" class="img-responsive" style="width: 100px"  alt="{{ $campaign->title }}"></td>
                                <td>{{ $campaign->title }}</td>
                                {{-- <td class="fnt-sz12">{!! substr($campaign->description, 0, 100) !!}...</td> --}}
                                <td><a class="btn btn-primary" href="{{ route('donations.index', ["campaign" => $campaign->title]) }}">{{ count($campaign->donations) }}</a></td>
                                <td>
                                    @if($campaign->donations->sum('amount') >= $campaign->target)
                                        <div class="label label-success">
                                    @else
                                        <div class="label label-warning">
                                    @endif
                                        ${{ $campaign->donations->sum('amount') }} </div>
                                </td>
                                <td><div class="label label-success">${{ $campaign->target }}</div></td>
                                {{-- <td>@if($campaign->is_featured)<div class="label label-success"> Yes @else<div class="label label-danger"> No @endif</div></td> --}}
                                {{-- <td>{{ $campaign->expire_at }}</td> --}}
                                <td><div class="label @if($campaign->status == 'open') label-success @else label-danger @endif">{{ $campaign->status }}</div></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-campaign-{{ $campaign->id }}"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                    <a class="btn btn-warning mb-5" href="{{ route('campaigns.edit', $campaign->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                    <button type="button" class="btn btn-danger" onclick="deleteCampaign('{{ $campaign->id }}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    @include('admin.view-campaign-modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
<script>
    var campaigns_table = $('#campaigns').DataTable({
        "responsive": true
    });
    var query = "{{ $query }}"
    if(query) {
        campaigns_table.search(query).draw()
    }

    function deleteCampaign(id) {
        var alertDelete = confirm("Are you sure you want to delete this campaign?")
        if(alertDelete == true) {
            $.ajax({
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: "/campaigns/" + id,
                success: function(msg){
                    $("#my-table").fadeOut(200, function(){
                            // form.html(msg).fadeIn().delay(2000);
                            $("#my-table").hide().load(location.href + " #my-table>*").fadeIn().delay(200);
                    }).hide()
                alert(msg)
                }
            });
        }
    }
</script>
@endsection
