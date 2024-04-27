@extends('admin.layouts.app')
@push('styles')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endpush

@section('title', 'Manage Users')

@section('content')
    <!-- Header props -->
    @php $title = 'User Info'; @endphp
    <!--./ Header props -->
    <div class="container-fluid">
        <x-user-profile :user="$user" />
        {{-- {{ dd($user) }} --}}


    </div><!-- /.container-fluid -->

@endsection

@push('scripts')
    {{-- <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endpush
