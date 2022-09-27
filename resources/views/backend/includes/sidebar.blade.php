
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
{{--        <div class="logo-src"></div>--}}
        <h4>MK BLOG</h4>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                    <span>
                        <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('backend.dashboard')}}" class="{{ Request::is('backend') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Data Section</li>
                <li>
                    <a href="{{route('backend.category.index')}}" class="{{ Request::is('backend/category') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Category
                    </a>
                </li>

                <li>
                    <a href="{{route('backend.blog.index')}}" class="{{ Request::is('backend/blog') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Blog
                    </a>
                </li>
                <li class="app-sidebar__heading">Client Section</li>
                <li>
                    <a href="{{route('backend.comment.index')}}" class="{{ Request::is('backend/comment') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Comment
                    </a>
                </li>

                <li>
                    <a href="{{route('backend.subscriber.index')}}" class="{{ Request::is('backend/subscriber') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Subscribers
                    </a>
                </li>

                <li>
                    <a href="{{route('backend.contract.index')}}" class="{{ Request::is('backend/contract') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Contract Message
                    </a>
                </li>
                <li class="app-sidebar__heading">Setting Section</li>
                <li>
                    <a href="{{route('backend.setting.index')}}" class="{{ Request::is('backend/setting') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Site Settings
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
