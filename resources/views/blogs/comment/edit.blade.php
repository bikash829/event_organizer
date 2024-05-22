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
                <li class="breadcrumb-item active" aria-current="page">Edit Comment</li>
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
                <h5 class="card-title">Edit Comment</h5>
                <form method="POST" action="{{ route('user.blog.comment.update', [$blog, $comment]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        @csrf
                        @method('PUT')
                        <div class="row g-2">
                            <x-forms.input name="comment" value="{{ $comment->comment }}" type="textarea" required />
                            <div class="text-end">
                                <a href="{{ route('blog.show', $blog) }}"
                                    class="comment-cancel-update btn btn-sm btn-danger">Cancel</a>
                                <button type="submit" class="comment-update btn btn-sm btn-info">Update</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
