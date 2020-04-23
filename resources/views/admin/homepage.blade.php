@extends('layouts.admin.main')
@section('title', 'Homepage - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2><i class="fa fa-cogs" aria-hidden="true"></i> Settings - Homepage</h2>
    <div class="blankpage-main">
        <div class="row" id="form">
            <div class="col-md-12 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Configure Homepage
                    </div>
                    <div class="inbox-details-body">
                        @include('layouts.admin.errors')
                        @include('layouts.admin.alerts')
                        <form class="com-mail" action="{{ route('homepage.set', $homepage_settings->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="col-md-6">
                                <label for="title_1">Title 1</label>
                                <input type="text" name="title_1" maxlength="200" placeholder="Title 1" value="{{ array_key_exists('title_1', $homepage) ? $homepage['title_1'] : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="description_1">Description 1</label>
                                <textarea id="description_1" name="description_1" maxlength="200">{{ array_key_exists('description_1', $homepage) ? $homepage['description_1'] : ''}}</textarea>
                            </div><br><br>

                            <div class="col-md-6">
                                <label for="title_2">Title 2</label>
                                <input type="text" name="title_2" maxlength="200" placeholder="Title 2" value="{{ array_key_exists('title_2', $homepage) ? $homepage['title_2'] : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="description_2">Description 2</label>
                                <textarea id="description_2" name="description_2" maxlength="200">{{ array_key_exists('description_2', $homepage) ? $homepage['description_2'] : ''}}</textarea>
                            </div> <br><br>

                            <div class="col-md-6">
                                <label for="title_3">Title 3</label>
                                <input type="text" name="title_3" maxlength="200" placeholder="Title 3" value="{{ array_key_exists('title_3', $homepage) ? $homepage['title_3'] : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="description_3">Description 3</label>
                                <textarea id="description_3" name="description_3" maxlength="200">{{ array_key_exists('description_3', $homepage) ? $homepage['description_3'] : ''}}</textarea>
                            </div><br><br>

                                <input type="submit" value="Save Changes">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.plugins.addExternal( 'confighelper', '/admin/plugins/confighelper/', 'plugin.js' );

    var config = {};
    config.extraPlugins = 'confighelper'
    config.placeholder = 'Description 1';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;
    config.height = 100

    CKEDITOR.replace('description_1', config)

    config.placeholder = 'Description 2';

    CKEDITOR.replace('description_2', config)

    config.placeholder = 'Description 3';

    CKEDITOR.replace('description_3', config)
</script>
@endsection
