@extends('layouts.admin.main')
@section('title', 'Edit Campaign - Life Saving Foundation')
@section('content')
<div class="blank">
    <h2>Edit Campaign</h2>
    <div class="col-md-12 compose-right">
        <div class="inbox-details-default">
            <div class="inbox-details-heading">
                Edit Campaigns
            </div>
            <div class="inbox-details-body">
                @include('layouts.admin.alerts')
                <form class="com-mail" action="{{ route('campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT') @csrf
                    <input type="text" name="title" placeholder="Title" required value="{{ old('title') ? old('title') : $campaign->title }}">
                    <textarea rows="10" name="description" placeholder="Description" maxlength="1000" required>{{ old('description') ? old('description') : $campaign->description }}</textarea>
                    <br>
                    <div class="col-md-4">
                        <label for="target">Target</label>
                        <input type="text" id="target" name="target" placeholder="Target (e.g 5000)" required value="{{ old('target') ? old('target') : $campaign->target }}">
                    </div>
                    <div class ="col-md-4">
                        <label for="is_featured">Set Campaign as Featured?</label>
                        <select id="is_featured" name="is_featured" class="form-control" style="font-size: 14px">
                            <option @if(!$campaign->is_featured) selected @endif value="0">No</option>
                            <option @if($campaign->is_featured) selected @endif value="1">Yes</option>
                        </select>
                    </div>
                    <div class ="col-md-4">
                        <label for="status">Campaign Status: </label>
                        <select id="status" name="status" class="form-control" style="font-size: 14px">
                            <option @if($campaign->status == "open") selected @endif value="open">Open</option>
                            <option @if($campaign->status == "closed") selected @endif value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"> </i> <span id="file_name">Choose another image</span>
                                <input type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" style="width: 200px" src="/storage/{{ $campaign->featured_image }}">
                    </div>
                    <input type="submit" value="Edit Campaign">
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
