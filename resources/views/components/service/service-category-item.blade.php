@php
    $collapseId = 'collapse-' . $category->id;
@endphp

<li class="mb-1">
    @if ($category->subcategories->isNotEmpty())
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse"
            data-bs-target="#{{ $collapseId }}" aria-expanded="false">
            {{ $category->category_name }}
        </button>
        <div class="collapse" id="{{ $collapseId }}">
            <ul class="ps-2 btn-toggle-nav list-unstyled fw-normal pb-1 small">
                @foreach ($category->subcategories as $subcategory)
                    <x-service.service-category-item :category="$subcategory" />
                @endforeach
            </ul>
        </div>
    @else
        <button class="btn d-inline-flex align-items-center rounded border-0">
            {{ $category->category_name }}
        </button>
    @endif
</li>



{{-- <li class="mb-1">
    <button class="btn d-inline-flex align-items-center rounded border-0">
        {{ $category->category_name }}
    </button>
    @if ($category->subcategories->isNotEmpty())
        <ul class="list-unstyled ps-0">
            @foreach ($category->subcategories as $subcategory)
                <x-service.service-category-item :category="$subcategory" />
            @endforeach
        </ul>
    @endif
</li> --}}
