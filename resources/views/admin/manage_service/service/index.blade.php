@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Services')

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
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->serviceCategory->category_name }}</td>
                            <td>{{ $service->service_name }}</td>

                            <td>
                                @if ($service->is_available == 'yes')
                                    <span class=" text-success">{{ $service->is_available }}</span>
                                @else
                                    <span class=" text-danger">{{ $service->is_available }}</span>
                                @endif

                            </td>
                            <td>{{ $service->vendor->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary">Action</button>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <div class="dropdown-menu" role="menu">


                                        <a class="dropdown-item text-primary"
                                            href="{{ route('admin.services.show', $service) }}"><i
                                                class="fa-solid fa-eye"></i> View</a>
                                        <a class="dropdown-item text-primary" href="{{ route('admin.item.index') }}"><i
                                                class="fa-solid fa-folder-plus"></i> Items</a>

                                        @if ($service->is_available == 'enabled')
                                            <a class="dropdown-item text-secondary" data-disable href="# "><i
                                                    class="fa-solid fa-eye-slash"></i>Disable</a>
                                        @else
                                            <a class="dropdown-item text-success" data-enable href="#"><i
                                                    class="fa-solid fa-eye"></i>
                                                Enable</a>
                                        @endif
                                        <!--<a class="dropdown-item text-danger" href="{{-- route('admin.service-category.destroy', $category) --}}"><i
                                                                                                                                                                        class="fa-solid fa-eye"></i>Delete</a> -->

                                        <a class="dropdown-item text-primary" href="#"><i
                                                class="fa-solid fa-pen-to-square"></i>Edit</a>
                                        <form method="POST" action="#">
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
