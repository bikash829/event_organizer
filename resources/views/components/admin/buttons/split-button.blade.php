<div class="btn-group">
    <button type="button" class="btn {{ $size }} {{ $color }}">Action</button>
    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu">
        {{-- <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a> --}}
        <x-admin.buttons.split-button-item :buttonItems="$slot" />
    </div>
</div>
