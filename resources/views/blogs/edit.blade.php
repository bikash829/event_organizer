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
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('blog.show', $blog) }}">Blog </a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Edit Blog
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
                <h5 class="card-title">Edit Blog</h5>
                <form method="POST" action="{{ route('user.blog.update', $blog) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <x-forms.input type="text" placeholder="Title" value="{{ $blog->title }}" name="title" />
                        <x-forms.input type="textarea" value="{{ $blog->content }}" placeholder="Write your blog here"
                            rows="8" name="content" />
                        {{-- <x-forms.input type="file" placeholder="Upload Image" name="image" /> --}}
                        <div class="col-12 text-end">
                            <a href="{{ route('blog.show', $blog) }}" class="btn btn-danger">Cancel</a>
                            <input type="submit" value="Update" class="btn btn-secondary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
