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
                            <td>
                                @if ($category->status == 'enabled')
                                    <span class=" text-success">{{ $category->status }}</span>
                                @else
                                    <span class=" text-danger">{{ $category->status }}</span>
                                @endif
                            </td>
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
                                            href="{{ route('admin.service-category.edit', $category) }}"><i
                                                class="fa-solid fa-pen-to-square"></i>Edit</a>

                                        @if ($category->status == 'enabled')
                                            <a class="dropdown-item text-secondary" data-disable
                                                href="{{ route('admin.disableCategory', $category) }} "><i
                                                    class="fa-solid fa-eye-slash"></i>Disable</a>
                                        @else
                                            <a class="dropdown-item text-success" data-enable
                                                href="{{ route('admin.enableCategory', $category) }}"><i
                                                    class="fa-solid fa-eye"></i>
                                                Enable</a>
                                        @endif
                                        <!--<a class="dropdown-item text-danger"
                                                                                                    href="{{ route('admin.service-category.destroy', $category) }}"><i
                                                                                                        class="fa-solid fa-eye"></i>
                                                                                                    Delete</a> -->
                                        <form method="POST"
                                            action="{{ route('admin.service-category.destroy', $category) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button data-delete type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-eye"></i> Delete
                                            </button>
                                        </form>
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
    @if (session('success'))
        <script>
            let message = @json(session('success'));
            $(document).ready(function() {

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Disable category
            $("[data-disable]").click(function() {
                event.preventDefault();
                const route = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",

                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: "Disabled!",
                            text: "The category has been disabled.",
                            icon: "success"
                        }).then(() => {
                            // Redirect to the route
                            window.location.href = route;
                        });
                    }
                });
            });


            // Delete category
            $("[data-delete]").click(function() {
                event.preventDefault();
                const route = $(this).closest('form').attr('action');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: "Enabled!",
                            text: "The category has been deleted",
                            icon: "success"
                        }).then(() => {
                            // Redirect to the route
                            $(this).closest('form').submit();
                        });
                    }
                });
            });




        });
    </script>


@endpush
