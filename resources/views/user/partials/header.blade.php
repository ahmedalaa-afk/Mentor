<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('user.home') }}" class="logo d-flex align-items-center me-3">
            <h1 class="sitename">Mentor</h1>
        </a>

        <!-- Search Form -->
        <form action="{{ route('user.course') }}" method="GET" class="search-form d-flex me-3 flex-grow-1">
            <div class="input-group w-100">
                <span class="input-group-text bg-white border-2 border-success rounded-start-pill ps-3">
                    <i class="bi bi-search text-success"></i>
                </span>
                <input type="text" name="search" class="form-control border-2 border-success rounded-end-pill ps-2"
                    placeholder="Search for courses">
            </div>
        </form>
        <!-- End Search Form -->

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('user.home') }}" class="@yield('home-active')">Home</a></li>
                <li><a href="{{ route('user.about') }}" class="@yield('about-active')">About</a></li>
                <li><a href="{{ route('user.course') }}" class="@yield('course-active')">Courses</a></li>
                <li><a href="{{ route('user.contact') }}" class="@yield('contact-active')">Contact</a></li>
                <li><a href="{{ route('user.announcement') }}" class="@yield('announcement-active')">Announcement</a>
                </li>
                @if (Auth::user())
                <li class="dropdown"><a href="#"><span>User</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('user.profile.edit') }}">Profile</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn bg-transparent">Logout</button>
                            </form>
                        </li>
                        @if (Auth::user()->hasRole('admin'))
                        <li><a href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                        @endif
                        @if (Auth::user()->hasRole('teacher'))
                        <li><a href="{{ route('teacher.index') }}">Teacher Dashboard</a></li>
                        @endif
                    </ul>
                </li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('user.course') }}">Get Started</a>

    </div>
</header>