@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @guest
                        {{ __('Welcome. Please login!') }}
                    @else
                        {{ __('Hello') }} {{ Auth::user()->name }}
                        <br>
                        {{ __('You are logged in!') }}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
