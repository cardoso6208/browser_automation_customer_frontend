@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" id="password-reset-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="pr-password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.password.js') }}"></script>
@stop

@push('scripts')
    <script>
        $(".pr-password").passwordRequirements();

        $.validator.addMethod("password_validation_func", function(value, element) {
            let ret = window.isStrongPassword(value);
            if(ret == "") return true;
            return false;
        });
        $.validator.addMethod("password_match_func", function(value, element) {
            let password = $("#password").val();
            let password_confirmation = $("#password-confirm").val();
            if(password != password_confirmation){
                return false;
            }
            return true;
        }, "The password confirmation does not match.");

        $("#password-reset-form").validate({
            // ignore: ":hidden",
            rules: {
                "password": {
                    required: true,
                    password_validation_func: true
                },
                "password_confirmation": {
                    required: true,
                    password_match_func: true
                },
            },
            messages: {
                "password": {
                    password_validation_func:function(){
                        let password = $("#password").val();
                        let ret = window.isStrongPassword(password);
                        return ret;                    
                    },
                },
                "password_confirmation": {
                    password_match_func: "The password confirmation does not match.",
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    </script>
@endpush

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/password/passwordRequirements.css') }}">
@stop