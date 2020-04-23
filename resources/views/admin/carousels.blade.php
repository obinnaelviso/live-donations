@extends('layouts.admin.main')
@section('title', 'Slideshow Settings - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2><i class="fa fa-cogs" aria-hidden="true"></i> Settings - Slideshow</h2>
    <div class="blankpage-main">
        <div class="row" id="form">
            <div class="col-md-12 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Add Slides
                    </div>
                    <div class="inbox-details-body">
                        @include('layouts.admin.alerts')
                        @include('layouts.admin.errors')
                        <form class="com-mail" action="{{ route('slideshow.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" maxlength="200" placeholder="Title" value="{{ old('title') }}" required>
                            <textarea id="description" name="description" placeholder="Description (optional)" maxlength="300">{{ old('description') }}</textarea>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"> </i> <span id="file_name">Choose an image</span>
                                    <input type="file" id="image" name="img" required>
                                </div>
                            </div>
                            <input type="submit" value="Add Slide">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br><br><br>
        <div class="row">
            <div class="col-12">
                <table id="slides" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="fa fa-user" aria-hidden="true" style="color: grey"></i> Name</th>
                            <th><i class="fa fa-sticky-note" aria-hidden="true" style="color: yellow"></i> Description</th>
                            <th><i class="fas fa-file-image" style="color: green"></i> Image</th>
                            <th><i class="fa fa-tasks" aria-hidden="true"></i>  Actions</th>
                        </tr>
                    </thead>
                    <tbody id="my-table">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($slides as $slide)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $slide->title }}</td>
                                <td>{!! $slide->description !!}</td>
                                <td><img src="{{ url('/storage/'.$slide->image) }}" class="img-responsive" style="width: 300px"  alt="{{ $slide->title }}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="deleteSlide('{{ $slide->id }}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
<script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.plugins.addExternal( 'confighelper', '/admin/plugins/confighelper/', 'plugin.js' );

    var config = {};
    config.extraPlugins = 'confighelper'
    config.placeholder = 'Description (optional)';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;
    config.height = 100

    CKEDITOR.replace('description', config)

    $('#image').on("change", function(){
	  // Name of file and placeholder
	  var file = this.files[0].name;
	  if($(this).val()){
	    $('#file_name').html("<strong>"+file+"</strong>");
	  }
    });

    $('#slides').DataTable({
        "responsive": true
    });
    function deleteSlide(id) {
        var alertDelete = confirm("Are you sure you want to delete this slide?")
        if(alertDelete == true) {
            $.ajax({
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: "/settings/slideshow/" + id,
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
