@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Manage Services')

@section('content')
    <!-- Header props -->
    {{-- @php
        if (request()->routeIs('admin.allUser')) {
            $title = 'All User';
        } elseif (request()->routeIs('admin.blockedUsers')) {
            $title = 'Blocked Users';
        } elseif (request()->routeIs('admin.pendingSeller')) {
            $title = 'Pending Sellers';
        } elseif (request()->routeIs('admin.allSeller')) {
            $title = 'All Sellers';
        }

    @endphp --}}
    <!--./ Header props -->
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Description</th>
                        {{-- <th>Engine version</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceCategories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->status }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary">Action</button>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <div class="dropdown-menu" role="menu">

                                        <a class="dropdown-item text-primary"
                                            href="{{ route('service-category.edit', $category) }}"><i
                                                class="fa-solid fa-pen-to-square"></i>Edit</a>

                                        @if ($category->status == 'enabled')
                                            <a class="dropdown-item text-secondary" data-block
                                                href="{{-- route('admin.blockUser', $user) --}}"><i
                                                    class="fa-solid fa-eye-slash"></i>Disable</a>
                                        @else
                                            <a class="dropdown-item text-success" data-unblock
                                                href="{{-- route('admin.unblockUser', $user) --}}"><i class="fa-solid fa-eye"></i> Enable</a>
                                        @endif
                                        <a class="dropdown-item text-danger" href="{{-- route('admin.viewUser', $user) --}}"><i
                                                class="fa-solid fa-eye"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Description</th>
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
