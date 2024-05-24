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
                <li class="breadcrumb-item active" aria-current="page">Blogs </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.blog.index') }}">My Blogs</a>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.blog.create') }}">Create Blog
                        Post</a></li>
            </ol>
        </nav>
    </div>
    <!--./ Header -->

@endsection

@section('content')

    <!--existed blogs card-container -->
    <div class="row g-4">
        @foreach ($blogs as $blog)
            <div class="card-container">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/slider/slider2.jpg') }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8 position-relative">

                            <div class="card-body">
                                <div class="card-title ">
                                    <div class="row">
                                        <div class="col-8">
                                            <a href="#"
                                                class="text-decoration-none text-dark"><strong>{{ fullName($blog->user) }}</strong></a>
                                        </div>
                                        <div class="col-4">
                                            <p class="card-text text-end"><small
                                                    class="text-body-secondary">{{ $blog->created_at->diffForHumans() }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ wordLimit($blog->content, 30) }}</p>
                                {{-- <a href="{{ route('blog.show', $blog) }}" class="btn btn-secondary">Read More</a> --}}
                                <form action="{{ route('blog.show', $blog) }}">
                                    {{-- @csrf --}}
                                    {{-- @method('GET') --}}
                                    <button type="submit" class="btn btn-secondary">Read More</button>

                                </form>

                            </div>

                            <div class="card-footer bg-transparent border-0 position-absolute bottom-0 end-0">
                                <div class="text-end">
                                    <form class="d-inline" method="POST" action="{{ route('user.like.store') }}">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <button type="submit" class="btn btn-sm btn-link text-dark text-decoration-none">
                                            @if (count($blog->likes) > 0)
                                                <span class="text-info">Unlike</span>
                                            @else
                                                <span class="text-info">Like</span>
                                            @endif <span
                                                class="badge text-bg-secondary">{{ $blog->likes_count }}</span>
                                        </button>
                                    </form>
                                    <a href="{{ route('blog.show', $blog) }}"
                                        class="btn btn-sm btn-link text-dark text-decoration-none">Comment <span
                                            class="badge text-bg-secondary">{{ $blog->comments->count() }}</span></a>
                                    <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Share <span
                                            class="badge text-bg-secondary">0</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-container">
                    <div class="comments card">
                        <div class="comments__body card-body">

                            <div class="comment__form">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-2">
                                        <x-forms.input type="textarea" placeholder="Write your comment Hre"
                                            name="subject" />

                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-sm btn-secondary">Post</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="comments card">
                        <div class="comments__body card-body">
                            <div class="comments__info card-title ">
                                <div class="row">

                                    <div class="comments__user col-8"><strong>Bikash Chwodhury</strong> </div>
                                    <div class="comments__date col-4 text-end"><span class="text-muted">5-7-2005</span>
                                    </div>
                                </div>
                            </div>
                            <p>Bro ipsum dolor sit amet pow pow pow big ring white room, misty park rat shreddin. First
                                tracks
                                crank
                                huck, grab dope stunt rock-ectomy gorby carbon pipe. Air carbon yard sale, first tracks
                                poaching
                                butter
                                sucker hole skid lid fatty over the bars derailleur back country chain ring huckfest. Deck
                                travel
                                trucks
                                reverse camber, presta titanium poaching brain bucket daffy McTwist stomp bomb wheels. Bear
                                trap
                                schwag
                                cornice, over the bars epic 180 ripping. Yard sale fatty 180 pow grind, huck sharkbite 180
                                switch.
                                Presta manny ski bum, back country frontside road rash whip clipless table top bro.</p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--./ existed blogs card-container -->
    <div class="py-2 d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>


    <!-- toast alert -->
    @foreach (['success', 'error'] as $status)
        @session($status)
            <x-alert.toast-alert :title="ucfirst($status)" message="{{ session('success') }}" />
        @endsession
    @endforeach

@endsection
