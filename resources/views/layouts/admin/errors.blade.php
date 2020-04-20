
@if($errors->any())
<div id="errors" class="alert alert-danger">
    <ul type="disc">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
