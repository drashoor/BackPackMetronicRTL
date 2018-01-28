@extends('backpack::layout')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('backpack.auth.password.reset') }}">
        {!! csrf_field() !!}
        <h3 class="font-green">{{ trans('backpack::base.reset_password') }}</h3>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control placeholder-no-fix" name="email"
                   value="{{ $email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password"
                   placeholder="{{ trans('backpack::base.password') }}">

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password_confirmation"
                   placeholder="{{ trans('backpack::base.confirm_password') }}">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase pull-right">
                <i class="fa fa-btn fa-refresh"></i> {{ trans('backpack::base.reset_password') }}
            </button>
        </div>
    </form>
    
@endsection
