@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Manage Services')

@section('content')
    <!-- Header props -->
    @php
        $title = 'Create Service';

    @endphp
    <!--./ Header props -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Service</h3>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf

                @php
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
                </div>

                <div class="col-12">
                    <button type="submit" class="my-2 btn btn-primary">Create</button>
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
