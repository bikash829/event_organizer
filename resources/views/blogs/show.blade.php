@extends('layouts.app')
@section('title', 'Blog')

@push('styles')
    <link rel="stylesheet" href="{{ asset('./css/blogs/blog.css') }}" />
@endpush

@section('header')
    <!-- Header -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
                {{-- {{ dd($blog) }} --}}
                @if (auth()->id() == $blog->user_id)
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.blog.index') }}">My
                            Blogs</a>
                @endif
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
    <!--./ Header -->
@endsection

@section('content')

    <div class="card-container"> <!-- card-container -->
        <!-- Blog Card -->
        <div class="card">
            <div class="card-header blog-header">
                <div class="row">
                    <div class="col-10">
                        <div class="row g-3 ">
                            <div class="col-auto">
                                <img src="{{ Storage::url('users-avatar/avatar.png') }}" class="img-thumbnail"
                                    alt="...">
                            </div>
                            <div class="col-auto ">
                                <div class="my-2">
                                    <h4 class="card-title text-muted">
                                        {{ fullName($blog->user) }}</h4>
                                    <h5 class=" text-muted">
                                        {{ ucfirst(getRole($blog->user->getRoleNames())) }}</h5>
                                    <p class="card-text text-end"><small class="text-body-secondary">Last updated
                                            {{ $blog->updated_at->diffForHumans() }}
                                        </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (auth()->id() == $blog->user_id)
                        <div class="col-2 my-auto">
                            <div class="row g-2">
                                {{-- <div class="d-grid text-end">
                                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-outline-primary">Edit</a>
                            </div> --}}
                                <form action="{{ route('user.blog.edit', $blog) }}" class="d-grid text-end">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                                </form>
                                <form class="d-grid  text-end" method="POST"
                                    action="{{ route('user.blog.destroy', $blog) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('assets/images/slider/slider2.jpg') }}" class="rounded col-md-6" alt="...">
                </div>
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->content }}</p>
            </div>

            <div class="card-footer bg-transparent border-0 position-relative bottom-0 end-0">
                <div class="text-end">
                    {{-- <a href="{{ route('blog.like', $blog) }}"
                        class="btn btn-sm btn-link text-dark text-decoration-none">Like <span
                            class="badge text-bg-secondary">{{ $blog->likes_count }}</span></a> --}}
                    <form class="d-inline" method="POST" action="{{ route('user.like.store') }}">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">
                            Like <span class="badge text-bg-secondary">{{ $blog->likes_count }}</span>
                        </button>
                    </form>
                    <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Comment <span
                            class="badge text-bg-secondary">{{ $blog->comments_count }}</span></a>
                    <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Share <span
                            class="badge text-bg-secondary">4</span></a>
                </div>
            </div>
        </div>
        <!--./ Blog Card -->

        <!-- Comment Section -->
        <div class="comment-container">
            <div class="comments card">
                <div class="comments__body card-body">

                    <div class="comment__form">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('user.blog.comment.store', $blog) }}">
                            @csrf
                            @method('POST')
                            <div class="row g-2">
                                <x-forms.input type="textarea" placeholder="Write your comment Hre" name="comment" />
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-sm btn-secondary">Post</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            @foreach ($blog->comments as $comment)
                <div class="comments card">
                    <div class="comments__body card-body">
                        <div class="comments__info card-title ">
                            <div class="row">
                                <div class="comments__user col-8"><strong>{{ fullName($comment->user) }}</strong> </div>
                                {{-- <div class="comments__user col-8 "><strong>{{ fullName($comment->user) }}</strong> </div> --}}
                                <div class="comments__settings col-4 text-end">

                                    <a class="pe-2 comment-edit btn  btn-sm btn-outline-primary "
                                        href="{{ route('user.blog.comment.edit', [$blog, $comment]) }}">Edit</a>

                                    <form method="POST"
                                        action="{{ route('user.blog.comment.destroy', [$blog, $comment]) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger">
                                    </form>
                                    {{-- <a class="text-danger comment-delete"
                                        href="{{ route('user.blog.comment.destroy', [$blog, $comment]) }}">Delete</a> --}}
                                </div>
                            </div>
                        </div>
                        <p class="comment-description">{{ $comment->comment }}</p>
                        <!-- Comment update form -->
                        {{-- <form method="POST" action="{{ route('user.blog.comment.update', [$blog, $comment]) }}"
                            class="frm-comment-update">
                            @csrf
                            @method('PUT')
                            <div class="row g-2">
                                <x-forms.input name="comment" value="{{ $comment->comment }}" type="textarea" required />
                                <div class="text-end">
                                    <button type="button" id="comment_{{ $comment->id }}"
                                        class="comment-cancel-update btn btn-sm btn-danger">Cancel</button>
                                    <button type="submit" class="comment-update btn btn-sm btn-info">Update</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="row">
                            <div class="col-6">
                                <span
                                    class="text-muted
                                    text-decoration-none">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-6   text-end">
                                <form class="d-inline" method="POST" action="{{ route('user.like.store') }}">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">
                                        @if (count($comment->likes) > 0)
                                            <span class="text-info">Unlike</span>
                                        @else
                                            <span class="text-info">Like</span>
                                        @endif <span
                                            class="badge text-bg-secondary">{{ $comment->likes_count }}</span>
                                    </button>
                                </form>

                                <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--./ Comment Section -->
    </div> <!--./ card-container -->

@endsection
@foreach (['success', 'error'] as $status)
    @session($status)
        <x-alert.toast-alert :title="ucfirst($status)" message="{{ session('success') }}" />
    @endsession
@endforeach

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('.comment-container').show();

            // comment interation
            /*
            const btnCommentEdit = $('.comment-edit');
            const btnCommentDelete = $('.comment-delete');
            $('.frm-comment-update').hide();

            $('.comment-edit').click(function(e) {
                console.log($(e.target).closest('.comments').find('.frm-comment-update'));
                $(e.target).closest('.comments').find('.comment-description').hide();
                $(e.target).closest('.comments').find('.frm-comment-update').show();
            });

            $('.comment-cancel-update').click(function(e) {
                $(e.target).closest('.comments').find('.frm-comment-update').each(function() {
                    this.reset();
                }).hide();
                $(e.target).closest('.comments').find('.comment-description').show();
            });
            */

        });
    </script>
@endpush
