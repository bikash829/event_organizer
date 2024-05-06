<li class="nav-item menu-open">
    {{-- <a href="#" class="nav-link {{ Route::CurrentRouteName() == 'admin.pendingSeller' ? 'menu-open' : '' }}"> --}}
        <a href="#" class="nav-link active">
            <span><i class="fa-solid fa-user-gear"></i></span>

            <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.pendingSeller') }}"
                    class="nav-link active {{ Route::CurrentRouteName() == 'admin.pendingSeller' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Seller</p>
                </a>
            </li>
            {{--
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Seller</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blocked User</p>
                </a>
            </li>
            --}}
        </ul>
</li>

<li class="nav-header">SERVICE STATUS</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Booked Services
            <span class="badge badge-info right">2</span>
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Pending Services

        </p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Services Inprogress

        </p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Delivered Services
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            All Services
        </p>
    </a>
</li>
<li class="nav-header">MANAGE SERVICES</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Service Category

        </p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Add Category
        </p>
    </a>
</li>
<li class="nav-header">COMMUNITY</li>
<li class="nav-item">
    <a href="pages/calendar.html" class="nav-link">
        {{-- <i class="nav-icon far fa-calendar-alt"></i> --}}
        <p>
            Blogs
        </p>
    </a>
</li>



<li class="nav-header">SITE INFO</li>
<li class="nav-item">
    <a href="pages/examples/contact-us.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact Query </p>
        <span class="right badge badge-danger">New</span>
    </a>
</li>
<li class="nav-item">
    <a href="pages/examples/contact-us.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>FAQ</p>
    </a>
</li>
<li class="nav-item">
    <a href="pages/examples/contact-us.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>About</p>
    </a>
</li>





<li class="nav-item ">
    {{-- <a href="#" class="nav-link {{ request()->routeIs($navLink['route']) }} "> --}}
        <a href="#" class="nav-link {{ isActiveRoute($navLink['route']) }} ">
            <i class="{{ $navLink['icon'] }}"></i>

            <p>
                {{ $navLink['name'] }}
                {{ isActiveRoute($navLink['route']) }}
                {{ $navLink['route'] }}
                <i class="{{ $navLink['rightIcon'] }}"></i>
            </p>
        </a>

</li>
{{-- <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
    </ul>
</li> --}}