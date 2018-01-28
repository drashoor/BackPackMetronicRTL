<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
               data-close-others="true">
                <span class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
                <img class="img-circle" src="{{ backpack_avatar_url(Auth::user()) }}"/>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="{{ route('backpack.account.info') }}">
                        <i class="fa fa-user"></i> {{ trans('backpack::base.my_account') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('backpack.auth.logout') }}">
                        <i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>


