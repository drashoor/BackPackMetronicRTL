@extends('backpack::layout')

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@section('header')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.my_account') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ trans('backpack::base.update_account_info') }}</span>
        </li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="profile-sidebar">

                <div class="portlet light profile-sidebar-portlet bordered">
                    @include('backpack::auth.account.sidemenu')
                </div>
            </div>

            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ trans('backpack::base.update_account_info') }}</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form class="form" action="{{ route('backpack.account.info') }}" method="post">
                                            {!! csrf_field() !!}

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if ($errors->count())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $e)
                                                            <li>{{ $e }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                @php
                                                    $label = trans('backpack::base.name');
                                                    $field = 'name';
                                                @endphp
                                                <label class="control-label required">{{ $label }}</label>
                                                <input required class="form-control" type="text" name="{{ $field }}"
                                                       value="{{ old($field) ? old($field) : $user[$field] }} ">
                                            </div>

                                            <div class="form-group">
                                                @php
                                                    $label = trans('backpack::base.email_address');
                                                    $field = 'email';
                                                @endphp
                                                <label class="control-label required">{{ $label }}</label>
                                                <input required class="form-control" type="email" name="{{ $field }}"
                                                       value="{{ old($field) ? old($field) : $user[$field] }} ">
                                            </div>

                                            <div class="margiv-top-10">
                                                <button type="submit" class="btn green">
                                                    <span class="ladda-label">
                                                        <i class="fa fa-save"></i> {{ trans('backpack::base.save') }}
                                                    </span>
                                                </button>
                                                <a href="{{ backpack_url() }}" class="btn default">
                                                    <span class="ladda-label">{{ trans('backpack::base.cancel') }}</span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/pages/css/profile-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection