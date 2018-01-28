@extends('backpack::layout')

@section('header')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">{{ trans('backpack::base.dashboard') }}</span>
        </li>
    </ul>
@endsection

@section('content')
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-database"></i> {{ trans('backpack::base.login_status') }}
            </div>
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                {{ trans('backpack::base.logged_in') }}
            </div>
        </div>
    </div>
@endsection
