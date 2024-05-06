@php
    $navActive = '';
    if (isset($navLink['children'])) {
        if (isAnyRoute($navLink['route'])) {
            $navActive = 'active';
        }
    } elseif (isActiveRoute($navLink['route'])) {
        $navActive = 'active';
    }
@endphp
<li class="nav-item {{ isAnyRoute($navLink['route']) }} ">
    <a href="{{ $navLink['route'] }}" class="nav-link {{ $navActive }}">


        <i class="nav-icon fas {{ $navLink['icon'] }}"></i>
        <p>
            {{ $navLink['name'] }}
            @isset($navLink['children'])
                <i class="right fas fa-angle-left"></i>
            @endisset

        </p>

        {{-- badge  --}}
        @isset($navLink['badge'])
            <span class="right badge badge-danger">New</span>
        @endisset
    </a>

    @isset($navLink['children'])
        <ul class="nav nav-treeview">
            @foreach ($navLink['children'] as $key => $child)
                <x-admin.layouts.nav-item :navLink="$child" />
            @endforeach
        </ul>
    @endisset
</li>
