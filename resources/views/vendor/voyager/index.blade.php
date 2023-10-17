@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">
            <div class="row">
                <div class="col-12">
                    <h3 style="margin-top:20px; margin-left:20px;"> Account Status </h3>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getAccountEnabledCount() }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted"> Enabled Account </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getAccountDisabledCount() }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted"> Disabled Account </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getAccountWaitingEmailConfirmCount() }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted"> Waiting Email Confirm </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getAccountPasswordResetRequestCount() }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted"> Password Reset Request </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 style="margin-top:20px; margin-left:20px;"> Login Successed </h3>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 5, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 5 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 30, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 30 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 60 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 6, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 6 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 24, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 24 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 24 * 7, 1) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 1 Week</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 style="margin-top:20px; margin-left:20px;"> Login Failed </h3>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 5, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 5 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 30, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 30 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 60 minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 6, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 6 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 24, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 24 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                    <div class="card shadow rounded p-5">
                        <div class="card-body text-muted font-weight-medium">
                            <div class="d-flex align-items-center">
                                <div class="ml-4 d-flex align-items-center">
                                    <div>
                                        <div class="text-muted font-weight-bolder">
                                            <h1>
                                                {{ \App\Providers\DashboardServiceProvider::getLoginStatusUsersCount( 60 * 24 * 7, 2) }}
                                            </h1>
                                        </div>
                                        <p class="m-0 text-muted">In 1 Week</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('javascript')
    <script>
    </script>
@stop
