@extends('layouts.admin.main')
@section('title', 'Donations - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2>Donations</h2>
    <div class="blankpage-main">
        <div id="error">
            @include('layouts.admin.errors')
        </div>
        <div class="row" id="form">
            <div class="col-md-12 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Enter New Donation
                    </div>
                    <div class="inbox-details-body">
                        <form class="com-mail" action="{{ route('donations.store') }}" method="POST">
                            @csrf
                            <div class="col-md-4"><input type="text" name="firstname" placeholder="First Name"></div>
                            <div class="col-md-4"><input type="text" name="lastname" placeholder="Last Name"></div>
                            <div class="col-md-4"><input type="text" name="email" placeholder="Email Address"></div>
                            <div class="col-md-4"><input type="text" name="amount" placeholder="Amount"></div>
                            <div class="col-md-4">
                                <select name="campaign_id" class="form-control" style="font-size: 16px">
                                    <option value="#" selected disabled>Select Campaign</option>
                                    @foreach($campaigns as $campaign)
                                        <option @if(old('campaign_id') == $campaign->id) selected @endif value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" value="Add New Donation">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br><br><br>
        <div class="row">
            <div class="col-12">
                <table id="donations" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="fa fa-bar-chart" aria-hidden="true" style="color: blue"></i> Campaign</th>
                            <th><i class="fa fa-user" aria-hidden="true" style="color: grey"></i> Name</th>
                            <th><i class="fa fa-envelope" aria-hidden="true" style="color: orange"></i> Email Address</th>
                            <th><i class="fa fa-money" aria-hidden="true" style="color: green"></i> Amount</th>
                            <th><i class="fa fa-dot-circle-o" aria-hidden="true" style="color: red"></i> Status</th>
                            <th><i class="fa fa-tasks" aria-hidden="true"></i>  Actions</th>
                        </tr>
                    </thead>
                    <tbody id="my-table">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($donations as $donation)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a href="{{ route('campaigns.index', ["campaign" => $donation->campaign->title]) }}">{{ $donation->campaign->title }}</a></td>
                                <td>{{ $donation->firstname.' '.$donation->lastname }}</td>
                                <td>{{ $donation->email }}</td>
                                <td>${{ $donation->amount }}</td>
                                <td><div class="label label-success">{{ $donation->status }}</div></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-donation-{{ $donation->id }}"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteDonation('{{ $donation->id }}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    @include('admin.view-donation-modal')
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
    var donations_table = $('#donations').DataTable({
        "responsive": true
    });
    var query = "{{ $query }}"
    if(query) {
        donations_table.search(query).draw()
    }

    $('form').on('submit', function(e) {
        var err_msg = []
        e.preventDefault();
        var $this = $(this)

        $.ajax({
            url: $this.prop('action'),
            method: 'POST',
            data: $this.serialize(),
            success: function(response) {
                alert(response)
                $("#my-table").fadeOut(200, function(){
                            $("#my-table").hide().load(location.href + " #my-table>*").fadeIn().delay(200);
                    }).hide()
                $this.find('input:text').val('');
            },
            error: function(e) {
                var errors = e.responseJSON.errors
                if(errors.firstname) err_msg.push(errors.firstname + '\n')
                if(errors.lastname) err_msg.push(errors.lastname + '\n')
                if(errors.email) err_msg.push(errors.email + '\n')
                if(errors.amount) err_msg.push(errors.amount + '\n')
                if(errors.campaign_id) err_msg.push(errors.campaign_id + '\n')
                alert(err_msg.join("").trim())
            }
        })
    })
    function deleteDonation(id) {
        var alertDelete = confirm("Are you sure you want to delete this donation?")
        if(alertDelete == true) {
            $.ajax({
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: "/donations/" + id,
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
