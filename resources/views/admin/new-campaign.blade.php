@extends('layouts.admin.main')
@section('title', 'New Campaign - Life Saving Foundation')
@section('content')
<div class="blank">
    <h2>New Campaign</h2>
    <div class="col-md-12 compose-right">
        <div class="inbox-details-default">
            <div class="inbox-details-heading">
                Please fill form to create new campaign.
            </div>
            <div class="inbox-details-body">
                @include('layouts.admin.alerts')
                @include('layouts.admin.errors')
                <form class="com-mail" action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Title" value="{{ old("title") }}" required>
                    <textarea rows="10" name="description" placeholder="Description" maxlength="1000" required>{{ old("description") }}</textarea><br>
                    <div class="col-md-8">
                        <input type="text" name="target" placeholder="Target (e.g 5000)" value="{{ old("target") }}" required>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"> </i> <span id="file_name">Choose an image</span>
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input type="submit" value="Create Campaign">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.plugins.addExternal( 'confighelper', '/admin/plugins/confighelper/', 'plugin.js' );

    var config = {};
    config.extraPlugins = 'confighelper'
    config.placeholder = 'Description';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;

    CKEDITOR.replace( 'description', config);

    $('#image').on("change", function(){
	  // Name of file and placeholder
	  var file = this.files[0].name;
	  if($(this).val()){
	    $('#file_name').html("<strong>"+file+"</strong>");
	  }
	});
</script>
@endsection
