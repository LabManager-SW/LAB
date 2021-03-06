<div id="page-container" class="header-navbar-fixed">
    <header id="header-navbar" class="content-mini content-mini-full remove-padding">
        <div class="text-center logo_position">
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <a href="/admin/home"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
                    <ul class="nav-header pull-right" style="position: absolute; right: 0; top: 20px;">
                        <li>
                            <button id="mobile-slideBt" type="button"
                                    class="btn btn-default navbar-toggle hidden-md hidden-lg btn_size"
                                    data-toggle="collapse" data-target=".navbar-main-collapse">
                                <i class="fa fa-navicon fa-2x"></i>
                            </button>
                        </li>
                    </ul>
                    <div id="header_interval" class="navbar-collapse navbar-main-collapse collapse header_spacing"
                         style="height: 1px;">
                        <div id="active_event_1">
                            <ul id="ul_interval" class="ul_list remove-padding">
                                <li class="li_list {{preg_match('/\/admin\/home/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                                    <a href="{{url('/admin/home')}}" class="sliding-link">
                                        Main
                                    </a>
                                </li>
                                <li class="li_list">
                                    <a href="{{route('admin.logout')}}" class="sliding-link">
                                        로그아웃
                                    </a>
                                </li>
                            </ul>
                            <ul class="ul_arrow_list remove-padding row remove-margin-b">
                                <li class="arrow_menu">
                                    <a href="#">
                                        <span class="arrow_up arrow_up_position"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="/user_home"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
                    <ul class="nav-header pull-right" style="position: absolute; right: 0; top: 20px;">
                        <li>
                            <button id="mobile-slideBt" type="button"
                                    class="btn btn-default navbar-toggle hidden-md hidden-lg btn_size"
                                    data-toggle="collapse" data-target=".navbar-main-collapse">
                                <i class="fa fa-navicon fa-2x"></i>
                            </button>
                        </li>
                    </ul>
                    <div id="header_interval" class="navbar-collapse navbar-main-collapse collapse header_spacing"
                         style="height: 1px;">
                        <div id="active_event_1">
                            <ul id="ul_interval" class="ul_list remove-padding">
                                <li class="li_list {{preg_match('/\/user_home/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                                    <a href="{{url('/user_home')}}" class="sliding-link">
                                        Main
                                    </a>
                                </li>
                                <li class="li_list">
                                    <a href="{{route('user.logout')}}" class="sliding-link">
                                        로그아웃
                                    </a>
                                </li>
                                <li class="li_list {{preg_match('/\/user_mypage/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                                    <a href="{{url('/user_mypage')}}" class="sliding-link">
                                        마이페이지
                                    </a>
                                </li>
                            </ul>
                            <ul class="ul_arrow_list remove-padding row remove-margin-b">
                                <li class="arrow_menu">
                                    <a href="#">
                                        <span class="arrow_up arrow_up_position"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            @else
                <a href="/home"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
                <ul class="nav-header pull-right" style="position: absolute; right: 0; top: 20px;">
                    <li>
                        <button id="mobile-slideBt" type="button"
                                class="btn btn-default navbar-toggle hidden-md hidden-lg btn_size"
                                data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-navicon fa-2x"></i>
                        </button>
                    </li>
                </ul>
                <div id="header_interval" class="navbar-collapse navbar-main-collapse collapse header_spacing"
                     style="height: 1px;">
                    <div id="active_event_1">
                        <ul id="ul_interval" class="ul_list remove-padding">
                            <li class="li_list {{preg_match('/\/user_home/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                                <a href="{{url('/user_home')}}" class="sliding-link">
                                    Main
                                </a>
                            </li>
                            <li class="li_list {{preg_match('/\/user_mypage/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                                <a href="{{url('/user_mypage')}}" class="sliding-link">
                                    마이페이지
                                </a>
                            </li>
                        </ul>
                        <ul class="ul_arrow_list remove-padding row remove-margin-b">
                            <li class="arrow_menu">
                                <a href="#">
                                    <span class="arrow_up arrow_up_position"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </header>
    <div class="header_bg"></div>
</div>