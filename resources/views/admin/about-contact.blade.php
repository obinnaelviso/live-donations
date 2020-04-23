@extends('layouts.admin.main')
@section('title', 'About Us - Life Saving Foundation')
@section('more-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
@endsection
@section('content')
<div class="blank">
    <h2><i class="fa fa-cogs" aria-hidden="true"></i> Settings - About Us & Contact Details</h2>
    <div class="blankpage-main">
        <div class="row" id="form">
            <div class="col-md-12 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading">
                        Edit Contact Details and About Us
                    </div>
                    <div class="inbox-details-body">
                        @include('layouts.admin.errors')
                        @include('layouts.admin.alerts')
                        <form class="com-mail" action="{{ route('settings.about.set', $about_settings->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="col-md-4">
                                <label for="address">Address</label>
                                <input type="text" name="address" maxlength="200" placeholder="Address" value="{{ array_key_exists('address', $about) ? $about['address'] : ''}}">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" maxlength="200" placeholder="Phone Number" value="{{ array_key_exists('phone', $about) ? $about['phone'] : ''}}">
                            </div>
                            <div class="col-md-4">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" maxlength="200" placeholder="Email Address" value="{{ array_key_exists('email', $about) ? $about['email'] : ''}}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <label for="contact_desc">Contact Description</label>
                                <input type="text" name="contact_desc" maxlength="200" placeholder="Contact Description" value="{{ array_key_exists('contact_desc', $about) ? $about['contact_desc'] : ''}}">
                            </div>
                            <div class="col-md-8">
                                <label for="about">About Us</label>
                                <textarea id="about" placeholder="About Us" rows="3" name="about" maxlength="1000">{{ array_key_exists('about', $about) ? $about['about'] : ''}}</textarea>
                            </div>
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
    config.placeholder = 'About Us';
    config.autoParagraph = true;
    config.height = 200
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;

    CKEDITOR.replace('about', config)
</script>
@endsection
