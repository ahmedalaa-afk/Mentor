<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        @include('admin.partials.authLogo')

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @yield('home-active')">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-home-circle' undefined></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Brows Website -->
        <li class="menu-item mt-3 @yield('website-active')">
            <a href="{{ route('user.home') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-home-circle' undefined></i>
                <div data-i18n="Analytics">Website</div>
            </a>
        </li>
        {{-- Manage Teacher --}}
        <li class="menu-item mt-3 @yield('teacher-active')">
            <a href="{{ route('admin.teacher.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group' undefined></i>
                <div data-i18n="Analytics">Teacher</div>
            </a>
        </li>
        <li class="menu-item mt-3 @yield('teacher-application-active')">
            <a href="{{ route('admin.teacher.application.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group' undefined></i>
                <div data-i18n="Analytics">Teacher Application</div>
            </a>
        </li>
        {{-- Manage Category --}}
        <li class="menu-item mt-3 @yield('category-active')">
            <a href="{{ route('admin.category.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group' undefined></i>
                <div data-i18n="Analytics">category</div>
            </a>
        </li>
        {{-- Manage Announcement --}}
        <li class="menu-item mt-3 @yield('announcement-active')">
            <a href="{{ route('admin.announcements.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-group' undefined></i>
                <div data-i18n="Analytics">Announcement</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->