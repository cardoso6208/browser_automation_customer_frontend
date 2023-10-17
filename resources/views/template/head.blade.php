<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- Global CSS Assets --}}
{!!
    Minify::stylesheet(
        array_merge([],
         (isset($additionalCss) ? $additionalCss : [])
         ))->withFullUrl()
!!}

{{-- Page specific CSS --}}
@yield('styles')
