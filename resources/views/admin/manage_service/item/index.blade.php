@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Service Details')

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>


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
                        <th>Available</th>
                        {{-- <th>Description</th> --}}
                        <th>Vendor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>

                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>Service</th>
                        <th>Available</th>
                        <th>Vendor</th>
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
