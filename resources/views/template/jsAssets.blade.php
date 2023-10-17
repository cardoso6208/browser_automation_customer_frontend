{{-- Global JS Assets --}}


{{-- <script language="javascript">
    var noPrint=false;
    var noCopy=false;
    var noScreenshot=false;
    var autoBlur=false;
</script> --}}

{!!
    Minify::javascript(
        array_merge([
            '/libs/jquery/dist/jquery.min.js',
            '/libs/jquery/dist/jquery.validate.min.js',
            '/js/inactivity.js',
            '/js/global.js',
            ],
            (isset($additionalJs) ? $additionalJs : [])
        )
    )->withFullUrl()
!!}

{{-- Page specific JS --}}
@yield('scripts')
@stack('scripts')

<script src="{{ asset('js/app.js') }}" defer></script>
