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
                <li class="dropdown notification-dropdown">
                    <a href="#" class="notification-toggle d-flex align-items-center position-relative">
                        <i class="fa-solid fa-bell fa-lg"></i>
                        @php
                        $unreadCount = \App\Models\Announcement::where('created_at', '>=', now()->subDays(7))->count();
                        @endphp
                        @if($unreadCount > 0)
                        <span class="notification-badge">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>
                        @endif
                    </a>
                    <div class="notification-dropdown-menu">
                        <div class="notification-header">
                            <h6 class="mb-0">Notifications</h6>
                            @if($unreadCount > 0)
                            <small class="text-muted">{{ $unreadCount }} new</small>
                            @endif
                        </div>
                        <div class="notification-list">
                            @php
                            $recentAnnouncements = \App\Models\Announcement::latest()->take(5)->get();
                            @endphp
                            @forelse($recentAnnouncements as $announcement)
                            <div class="notification-item">
                                <div class="notification-icon">
                                    <i class="fa-solid fa-bullhorn text-primary"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">{{ $announcement->title }}</div>
                                    <div class="notification-text">{{ Str::limit($announcement->content, 50) }}</div>
                                    <div class="notification-time">{{ $announcement->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="notification-item">
                                <div class="notification-content text-center text-muted">
                                    <i class="fa-solid fa-bell-slash mb-2"></i>
                                    <div>No notifications</div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="notification-footer">
                            <a href="{{ route('user.announcement') }}" class="btn btn-sm btn-outline-primary w-100">View
                                All</a>
                        </div>
                    </div>
                </li>
                @if (Auth::user())
                <li class=" dropdown">
                    <a href="#" class="d-flex align-items-center">
                        @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Photo"
                            class="rounded-circle me-2" width="32" height="32" style="object-fit: cover;">
                        @else
                        <img src="{{ asset('assets/img/trainers/trainer-1-2.jpg') }}" alt="Default Profile"
                            class="rounded-circle me-2" width="32" height="32" style="object-fit: cover;">
                        @endif
                        <span>{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down toggle-dropdown ms-1"></i>
                    </a>
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

    </div>
</header>