@extends('backpack::auth_layout')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('backpack.auth.password.email') }}" method="post">
        {!! csrf_field() !!}
        <h3 class="font-green">{{ trans('backpack::base.reset_password') }}</h3>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control placeholder-no-fix"
                   placeholder="{{ trans('backpack::base.email_address') }}" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase pull-right">
                <i class="fa fa-btn fa-envelope"></i> {{ trans('backpack::base.send_reset_link') }}
            </button>
        </div>
    </form>
@endsection
