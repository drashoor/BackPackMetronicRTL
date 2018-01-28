@extends('backpack::auth_layout')

@section('content')
    <!-- BEGIN LOGIN FORM -->

    <form class="login-form" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
        {!! csrf_field() !!}
        <h3 class="form-title font-green">{{ trans('backpack::base.login') }}</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> أدخل اسم المستخدم وكلمة المرور. </span>
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.email_address') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off"
                   placeholder="{{ trans('backpack::base.email_address') }}" name="email"/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('backpack::base.password') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="{{ trans('backpack::base.password') }}" name="password"/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">{{ trans('backpack::base.login') }}</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1"/>{{ trans('backpack::base.remember_me') }}
                <span></span>
            </label>
            <a href="{{ route('backpack.auth.password.reset') }}"
               class="forget-password">{{ trans('backpack::base.forgot_your_password') }}</a>
        </div>
        <div class="login-options">
            <h4>Or login with</h4>
            <ul class="social-icons">
                <li>
                    <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                </li>
            </ul>
        </div>
        <div class="create-account">
            <p>
                <a href="{{ url('admin/register') }}" class="uppercase">{{ trans('backpack::base.register') }}</a>
            </p>
        </div>
    </form>

@endsection
