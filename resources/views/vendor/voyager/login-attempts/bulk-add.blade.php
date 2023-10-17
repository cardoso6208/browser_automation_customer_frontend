@extends('voyager::master')

@section('page_title', 'Bulk Add')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        Add Users
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
            action="{{ route('voyager.users.bulk-add-post') }}"
            method="POST" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Number of new accounts to add :</label>
                                <input type="number" class="form-control" id="bulk_add_amount" name="bulk_add_amount" placeholder="Add number of users"
                                value="{{ old('name', $dataTypeContent->name ?? '') }}" max="5000" min="1">
                            </div>
                            <div class="form-group">
                                @php
                                    $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};

                                    $row     = $dataTypeRows->where('field', 'status')->first();
                                    $options = $row->details->options ? $row->details->options : "";

                                    if (isset($dataTypeContent->status)) {
                                        $selected_status = $dataTypeContent->status;
                                    } else {
                                        $selected_status = 3; // enabled
                                    }
                                @endphp

                                <label for="name">Status of new accounts to add :</label>
                                <select class="form-control select2" id="account_status" name="account_status">
                                    @foreach ($options as $key=>$option)
                                    <option value="{{ $key }}"
                                    {{ ($key == $selected_status ? 'selected' : '') }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
