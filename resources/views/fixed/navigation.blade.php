@if (session()->has('user'))
<header class="site-navbar" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-12 search-form-wrap js-search-form">
                <form  method="get" action="#" onkeydown="return event.key != 'Enter';">
                    <input  type="text" name="search" id="search" class="form-control" placeholder="Search People">
                    <a href="#"><span class="icon-cancel cancelSearch"></span></a>
                </form>
            </div>
            <div class="navContainer">
                <div class="col-4 site-logo d-flex align-items-center">
                    <a href="/home" class="text-black h2 mb-0">Mini Blog</a>
                </div>

                <div class="col-8 text-right">
                    <nav class="site-navigation" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                            <li><a href="{{route('profile',session()->get('user')->id)}}">Profile</a></li>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            @if(session()->get('user')->role_id === 1)
                                <li><a href="{{route('admin')}}">Admin Panel</a></li>
                            @endif
                            <li><a href="{{route('logout')}}">Logout</a></li>
                            <li class="d-none d-lg-inline-block"><a href="#" class="searchUsersToggle"><span class="icon-search"></span></a></li>
                        </ul>
                    </nav>
                    <a href="#" class="mobileSearch searchUsersToggle"><span class="icon-search"></span></a>
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
                </div>
                <div class="searchResults">
                    <ul class="list-group" id="searchResultList">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>  
@endif

