<?php
$navLinks = [
    [
        'name' => 'Dashboard',
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'route' => route('admin.index'),
    ],
    [
        'name' => 'Manage Users',
        'icon' => 'fa-solid fa-user-gear',
        'route' => 'admin/user',
        'children' => [
            [
                'name' => 'Pending Seller',
                'icon' => 'fa-solid fa-user-clock',
                'route' => route('admin.pendingSeller'),
            ],
            [
                'name' => 'All Seller',
                'icon' => 'fa-solid fa-user-tie',
                'route' => route('admin.allSeller'),
            ],
            [
                'name' => 'All User',
                'icon' => 'fa-solid fa-users',
                'route' => route('admin.allUser'),
            ],
            [
                'name' => 'Blocked User',
                'icon' => 'fa-solid fa-user-lock',
                'route' => route('admin.blockedUsers'),
            ],
        ],
    ],
    'MANAGE SERVICES' => [
        'name' => 'Manage Services',
        'icon' => 'fa-solid fa-sliders',
        'route' => 'admin/service-category',
        'children' => [
            [
                'name' => 'Service Categores',
                'icon' => 'fa-solid fa-layer-group',
                'route' => route('service-category.index'),
            ],
            [
                'name' => 'Add Category',
                'icon' => 'fa-solid fa-file-circle-plus',
                'route' => route('service-category.create'),
            ],
        ],
    ],
    'Service Status' => [
        'name' => 'Service Status',
        'icon' => 'fa-solid fa-chart-line',
        'route' => '',
        'children' => [
            [
                'name' => 'Booked Services',
                'icon' => 'fa-solid fa-calendar-check',
                'route' => '',
            ],
            [
                'name' => 'Pending Services',
                'icon' => 'fa-solid fa-spinner',
                'route' => '',
            ],
            [
                'name' => 'Services Inprogress',
                'icon' => 'fa-solid fa-hourglass-half',
                'route' => '',
            ],
            [
                'name' => 'Delivered Services',
                'icon' => 'fa-solid fa-truck-ramp-box',
                'route' => '',
            ],
            [
                'name' => 'All Services',
                'icon' => 'fa-solid fa-expand',
                'route' => '',
            ],
        ],
    ],
    'Community' => [
        'name' => 'Blog',
        'icon' => 'fa-solid fa-blog',
        'route' => '',
    ],
    'site info' => [
        'name' => 'Contact Query',
        'icon' => 'fa-solid fa-envelopes-bulk',
        'route' => '',
        'badge' => true,
    ],
    [
        'name' => 'FAQ',
        'icon' => 'fa-solid fa-clipboard-question',
        'route' => '',
    ],
    [
        'name' => 'About',
        'icon' => 'fa-solid fa-circle-info',
        'route' => '',
    ],
];

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashborad</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($navLinks as $key => $navLink)
                    {{-- <x-admin.layouts.nav-item :navLink="$navLink" /> --}}
                    @if (gettype($key) == 'string')
                        <li class="nav-header">{{ strtoupper($key) }}</li>
                    @endif
                    <x-admin.layouts.nav-item :navLink="$navLink" />
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
