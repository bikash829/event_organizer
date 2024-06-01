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

    <div class="blog-card-container"> <!-- card-container -->
        <!-- Blog Card -->
        <x-blog.post :blog="$blog" authId="{{ auth()->id() }}"
            blogImgUrl="{{ $blog->getFirstMediaUrl() ?? $blog->image }}"
            blogImgAlt="{{ $blog->getFirstMedia()->name ?? 'Fake Image' }}" />
        <!--./ Blog Card -->

        <!-- Comment Section -->
        <div class="comment-container">
            <!--comment form -->
            <x-blog.comment-form :blog="$blog" formId="{{ $blog->id }}_blog" />


            @foreach ($blog->comments as $comment)
                <div class="commentSection">
                    <x-blog.comment :comment="$comment" :blog="$blog" authId="{{ auth()->id() }}" />
                    <!-- Replies -->
                    <div class="replies">
                        <p class="m-0 pt-3 px-3 text-muted">Replies</p>
                        <hr />

                        <x-blog.comment-form :blog="$blog" commentId="{{ $comment->id }}"
                            formId="{{ $comment->id }}_comment" />
                        @foreach ($comment->replies as $comment)
                            <x-blog.comment :blog="$blog" :comment="$comment" :isReply="true"
                                authId="{{ auth()->id() }}" />
                        @endforeach

                    </div>
                    <!--./ Replies -->
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

            $('.replies').hide();


            $('.btnReplies').click(function(e) {
                $(e.target).closest('.commentSection').find('.replies').toggle();
            });

            $('.btnReply').click(function(e) {
                window.location.href =
                    `#${$(e.target).closest('.commentSection').find('.form-comment').attr('id')}`;
            });

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
