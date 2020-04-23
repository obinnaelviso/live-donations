@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img class="img-fluid"  src="https://lifesavingfoundation.life/img/logo-w-caption.jpg" alt="Life Saving Foundation" style=" height: 75px">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
