@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Change password</h2>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}" id="change-password-form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control pr-password" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
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
            let password = $("#new-password").val();
            let password_confirmation = $("#new-password-confirm").val();
            if(password != password_confirmation){
                return false;
            }
            return true;
        }, "The password confirmation does not match.");

        $("#change-password-form").validate({
            // ignore: ":hidden",
            rules: {
                "current-password": {
                    required: true
                },
                "new-password": {
                    required: true,
                    password_validation_func: true
                },
                "new-password_confirmation": {
                    required: true,
                    password_match_func: true
                },
            },
            messages: {
                "new-password": {
                    password_validation_func:function(){
                        let password = $("#new-password").val();
                        let ret = window.isStrongPassword(password);
                        return ret;                    
                    },
                },
                "new-password_confirmation": {
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