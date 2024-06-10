@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Add Service items')

@section('content')
    <!-- Header props -->
    @php
        $title = 'Add items';

    @endphp
    <!--./ Header props -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Service Items</h3>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('admin.item.store') }}">
                @csrf

                <div class="form-group">
                    <x-forms.input attr="readonly" label="Service" value="{{ $service->service_name }}" />
                    <x-forms.input type="hidden" name="service_id" value="{{ $service->id }}" :isRequired="true" />
                </div>
                <div class="form-group">
                    <x-forms.input attr="readonly" label="Category" attribute="readonly"
                        value="{{ $service->serviceCategory->category_name }}" />
                    <x-forms.input type="hidden" name="service_category_id" value="{{ $service->serviceCategory->id }}"
                        :isRequired="true" />
                </div>

                <div class="form-group">
                    <x-forms.input label="Item Name" placeholder="Name Of Your Item" name="name" :isRequired="true" />
                </div>

                <div class="form-group">
                    <x-forms.input type="textarea" rows="4" label="Item Description" placeholder="Item Description"
                        name="description" :isRequired="true" />
                </div>
                <div class="form-group ">
                    <x-forms.input type="number" label="Total Product" placeholder="Quantity" name="quantity"
                        :isRequired="true" />
                </div>
                <div class="form-group">
                    <x-forms.input label="Price" placeholder="15.00" name="price" :isRequired="true" />
                </div>
                {{-- @php
                    $categories = $serviceCategories
                        ->map(function ($serviceCategory) {
                            return [
                                'id' => $serviceCategory->id,
                                'value' => $serviceCategory->category_name,
                            ];
                        })
                        ->toArray();
                @endphp

                <div class="form-group">
                    <x-forms.input type="select" label="Service Category" name="service_category_id" :options="$categories"
                        :isRequired="true" />
                </div>

                <div class="form-group">
                    <x-forms.input label="Service Name" placeholder="Music Station" name="service_name" :isRequired="true" />
                </div>

                <div class="form-group">
                    <x-forms.input label="Description" placeholder="Description" name="description" :isRequired="true"
                        type="textarea" />
                </div>

                @php
                    $vendors = $vendors
                        ->map(function ($vendor) {
                            return [
                                'id' => $vendor->id,
                                'value' => $vendor->email,
                            ];
                        })
                        ->toArray();
                @endphp
                <div class="form-group">
                    <x-forms.input type="select" label="Vendor" name="vendor_id" :options="$vendors" :isRequired="true" />
                </div> --}}

                <div class="col-12">
                    <button type="submit" class="my-2 btn btn-primary">Add </button>
                </div>


            </form>
            {{-- <form id="categoryForm"
                action="@isset($serviceCategory){{ route('admin.service-category.update', $serviceCategory) }}@else {{ route('admin.services.store') }} @endisset "
                method="POST" novalidate>
                @csrf
                @isset($serviceCategory)
                    @method('PUT')
                @endisset

                <div class="row g-3">
                    <x-forms.input label="Category Name" name="category_name"
                        value="{{ old('category_name', isset($serviceCategory) ? $serviceCategory->category_name : '') }}"
                        :isRequired="true" />
                    <x-forms.input name="description" label="Description"
                        value="{{ old('description', isset($serviceCategory) ? $serviceCategory->description : '') }}"
                        :isRequired="true" type="textarea" />

                    <div class="col-12">
                        <button type="submit" class="my-2 btn btn-primary">Submit</button>
                    </div>

                </div>


            </form> --}}
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

@endsection

@push('scripts')
    <x-admin.packages.data-table-js />
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });

        // jquery-validation
    </script>
@endpush
