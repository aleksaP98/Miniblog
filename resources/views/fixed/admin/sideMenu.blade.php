<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{route('admin')}}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Website statistics
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Users</li>
                                <li>
                                    <a href="{{route('admin.createUserForm')}}">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Create User
                                    </a>
                                </li>
                                <li  >
                                    <a href="{{route('admin.updateUserForm')}}">
                                        <i class="metismenu-icon pe-7s-display1"></i>
                                        Update & Delete Users
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Posts</li>
                                <li>
                                    <a href="{{route('admin.createPostForm')}}">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Create Post
                                    </a>
                                </li>
                                <li  >
                                    <a href="{{route('admin.updatePostForm')}}">
                                        <i class="metismenu-icon pe-7s-display1"></i>
                                        Update & Delete Posts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
