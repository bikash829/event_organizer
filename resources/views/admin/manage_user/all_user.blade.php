@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Manage Users')

@section('content')
    <!-- Header props -->
    @php
        if (request()->routeIs('admin.allUser')) {
            $title = 'All User';
        } elseif (request()->routeIs('admin.blockedUsers')) {
            $title = 'Blocked Users';
        } elseif (request()->routeIs('admin.pendingSeller')) {
            $title = 'Pending Sellers';
        } elseif (request()->routeIs('admin.allSeller')) {
            $title = 'All Sellers';
        }

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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Is Active</th>
                        <th>Is Verified</th>
                        {{-- <th>Engine version</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ fullName($user) }}</td>
                            <td>{{ $user->email }}</td>

                            <td> {{ getRole($user->getRoleNames()) }}</td>
                            <td> {{ $user->is_active }}</td>
                            <td> {{ $user->is_verified }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary">Action</button>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item text-success" href="{{ route('admin.viewUser', $user) }}"><i
                                                class="fa-solid fa-eye"></i>
                                            View</a>
                                        <a class="dropdown-item text-primary" href="#"><i
                                                class="fa-solid fa-pen-to-square"></i>Edit</a>

                                        @if ($user->is_active == 'active')
                                            <a class="dropdown-item text-secondary" data-block
                                                href="{{ route('admin.blockUser', $user) }}"><i
                                                    class="fa-solid fa-lock"></i>Block</a>
                                        @else
                                            <a class="dropdown-item text-success" data-unblock
                                                href="{{ route('admin.unblockUser', $user) }}"><i
                                                    class="fa-solid fa-lock"></i>Unblock</a>
                                        @endif


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Is Active</th>
                        <th>Is Verified</th>
                        {{-- <th>Engine version</th> --}}
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

        $(document).ready(function() {
            $("[data-block]").click(function() {
                event.preventDefault();
                const route = $(this).attr('href');
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
                            title: "Blocked!",
                            text: "The user has been blocked.",
                            icon: "success"
                        }).then(() => {
                            // Redirect to the route
                            window.location.href = route;
                        });
                    }
                });
            });




        });
        $(document).ready(function() {
            $("[data-unblock]").click(function() {
                event.preventDefault();
                const route = $(this).attr('href');
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
                            title: "Unblocked!",
                            text: "The user is active now.",
                            icon: "success"
                        }).then(() => {
                            // Redirect to the route
                            window.location.href = route;
                        });
                    }
                });
            });




        });
    </script>
@endpush
