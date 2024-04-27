@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Manage Services')

@section('content')
    <!-- Header props -->
    @php
        $title = 'Edit Category';

    @endphp
    <!--./ Header props -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('service-category.update', $serviceCategory) }}">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
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
    @endpush
