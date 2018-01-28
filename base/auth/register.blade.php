@extends('backpack::auth_layout')

@section('content')

    <form action="{{ route('backpack.auth.register') }}" method="post" novalidate="novalidate">
        <h3 class="font-green">{{ trans('backpack::base.register') }}</h3>
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.name') }}</label>
            <input class="form-control placeholder-no-fix" placeholder="{{ trans('backpack::base.name') }}" name="name"
                   type="text" value="{{ old('name') }}"/>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.email_address') }}</label>
            <input class="form-control placeholder-no-fix" placeholder="{{ trans('backpack::base.email_address') }}"
                   name="email" type="text" value="{{ old('email') }}"/>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.password') }}</label>
            <input class="form-control placeholder-no-fix" placeholder="{{ trans('backpack::base.password') }}"
                   name="password" type="password" value="{{ old('password') }}"/>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.confirm_password') }}</label>
            <input class="form-control placeholder-no-fix"
                   placeholder="{{ trans('backpack::base.confirm_password') }}"
                   name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"/>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.confirm_password') }}</label>
            <input class="form-control placeholder-no-fix"
                   placeholder="{{ trans('backpack::base.confirm_password') }}"
                   name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"/>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-actions">
            <a href="{{ url('admin/login') }}" class="btn green btn-outline">{{ trans('backpack::base.login') }}</a>
            <button type="submit"
                    class="btn btn-success uppercase pull-right">{{ trans('backpack::base.register') }}</button>
        </div>
    </form>

@endsection
