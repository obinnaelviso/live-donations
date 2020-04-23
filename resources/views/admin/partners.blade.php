@extends('layouts.admin.main')
@section('title', 'Partners - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2>Partners</h2>
    <div class="blankpage-main">
        <div class="row" id="form">
            <div class="col-md-12 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Add Partner
                    </div>
                    <div class="inbox-details-body">
                        @include('layouts.admin.errors')
                        @include('layouts.admin.alerts')
                        <form class="com-mail" action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4"><input type="text" name="name" maxlength="200" placeholder="Name" value="{{ old('name') }}" required></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fa fa-paperclip"> </i> <span id="file_name">Choose an image</span>
                                        <input type="file" id="image" name="img" required>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add Partner">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br><br><br>
        <div class="row">
            <div class="col-12">
                <table id="partners" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="fa fa-user" aria-hidden="true" style="color: grey"></i> Name</th>
                            <th><i class="fas fa-file-image" style="color: green"></i> Image</th>
                            <th><i class="fa fa-tasks" aria-hidden="true"></i>  Actions</th>
                        </tr>
                    </thead>
                    <tbody id="my-table">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($partners as $partner)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $partner->name }}</td>
                                <td><img src="{{ url('/storage/'.$partner->image) }}" class="img-responsive" style="width: 100px"  alt="{{ $partner->title }}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deletePartner('{{ $partner->id }}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
    $('#image').on("change", function(){
	  // Name of file and placeholder
	  var file = this.files[0].name;
	  if($(this).val()){
	    $('#file_name').html("<strong>"+file+"</strong>");
	  }
    });

    $('#partners').DataTable({
        "responsive": true
    });
    function deletePartner(id) {
        var alertDelete = confirm("Are you sure you want to delete this partner?")
        if(alertDelete == true) {
            $.ajax({
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: "/partners/" + id,
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
