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
            {{-- @isset($navLink['children']) --}}
            {{-- <i class="fas fa-angle-left right"></i> --}}
            {{-- @endisset --}}
        </p>
    </a>

    @isset($navLink['children'])
        <ul class="nav nav-treeview">
            @foreach ($navLink['children'] as $key => $child)
                <x-admin.layouts.nav-item :navLink="$child" />
            @endforeach
        </ul>
    @endisset
</li>
