@extends('layouts.app')
@section('title', 'Blog')

@push('styles')
    <link rel="stylesheet" href="{{ asset('./css/blogs/blog.css') }}" />
@endpush

@section('header')
    <!-- Breadcumbs -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('blog.index') }}">Blogs </a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.blog.index') }}">My Blogs</a>
                <li class="breadcrumb-item active" aria-current="page">Create Blog
                    Post</li>
            </ol>
        </nav>
    </div>
    <!--./ Breadcumbs -->
@endsection

@section('content')

    <!--./ Create new blog -->
    <div class="card-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Blog</h5>
                <form action="{{route('user.blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <x-forms.input type="text" placeholder="Title" name="title" />
                        <x-forms.input type="textarea" placeholder="Write your blog here" rows="5" name="content" />
                        <x-forms.input type="file" placeholder="Upload Image" name="image" />
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-secondary">Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush
