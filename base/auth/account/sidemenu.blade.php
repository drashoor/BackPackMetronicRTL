<div class="profile-userpic">
    <img src="{{ backpack_avatar_url(Auth::user()) }}" class="img-responsive" alt="">
</div>
<!-- END SIDEBAR USERPIC -->
<!-- SIDEBAR USER TITLE -->
<div class="profile-usertitle">
    <div class="profile-usertitle-name"> {{ Auth::user()->name }}</div>
    {{--<div class="profile-usertitle-job"> Developer</div>--}}
</div>
<!-- END SIDEBAR USER TITLE -->
<!-- SIDEBAR BUTTONS -->
{{--<div class="profile-userbuttons">--}}
    {{--<button type="button" class="btn btn-circle green btn-sm">Follow</button>--}}
    {{--<button type="button" class="btn btn-circle red btn-sm">Message</button>--}}
{{--</div>--}}
<!-- END SIDEBAR BUTTONS -->
<!-- SIDEBAR MENU -->
<div class="profile-usermenu">
    <ul class="nav">
        <li @if (Request::route()->getName() == 'backpack.account.info')  class="active" @endif>
            <a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.update_account_info') }}</a>
        </li>
        <li @if (Request::route()->getName() == 'backpack.account.password') class="active" @endif>
            <a href="{{ route('backpack.account.password') }}">{{ trans('backpack::base.change_password') }}</a>
        </li>

    </ul>
</div>