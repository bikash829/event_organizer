@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Service Details')
<!-- Header props -->
@php
    $title = 'Service Items';
@endphp
<!--./ Header props -->

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Service Items</h3>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>Service</th>
                        <th>Vendor</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Price</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->serviceCategory->category_name }}</td>
                            <td>{{ $item->service->service_name }}</td>
                            <td>{{ $item->service->vendor->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>

                            <td>{{ 'Button' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>Service</th>
                        <th>Vendor</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Price</th>

                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
@endsection



@push('scripts')
    <x-admin.packages.data-table-js />
@endpush
