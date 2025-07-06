<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        @include('super-admin.partials.authLogo')

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @yield('home-active')">
            <a href="{{ route('super_admin.index') }}" class="menu-link">
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
        <!-- Manage Roles -->
        <li class="menu-item mt-3 @yield('roles-active')">
            <a href="{{ route('super_admin.roles') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-home-circle' undefined></i>
                <div data-i18n="Analytics">Roles</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->