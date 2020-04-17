@extends('layouts.admin.main')
@section('title', 'New Campaign - Life Saving Foundation')
@section('content')
<div class="blank">
    <h2>New Campaign</h2>
    <div class="col-md-8 compose-left">
        <div class="inbox-details-default">
            <div class="inbox-details-heading">
                Please fill details to create New Campaign
            </div>
            <div class="inbox-details-body">
                @include('layouts.admin.alerts')
                <form class="com-mail">
                    <input type="text"  value="To :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'To';}">
                    <input type="text"  value="Subject :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">

                    <textarea rows="6"  value="Message :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message </textarea>
                    <div class="form-group">
                        <div class="btn btn-default btn-file">
                            <i class="fa fa-paperclip"> </i> Attachment
                            <input type="file" name="attachment">
                        </div>
                    </div>
                    <input type="submit" value="Send Message">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
