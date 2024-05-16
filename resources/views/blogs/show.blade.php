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
                                        {{ fullName($blog->user->first_name, $blog->user->last_name) }}</h4>
                                    <h5 class=" text-muted">
                                        {{ ucfirst(getRole($blog->user->getRoleNames())) }}</h5>
                                    <p class="card-text text-end"><small class="text-body-secondary">Last updated
                                            {{ $blog->updated_at->diffForHumans() }}
                                        </small></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 my-auto">
                        <div class="row g-2">
                            {{-- <div class="d-grid text-end">
                                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-outline-primary">Edit</a>
                            </div> --}}
                            <form action="{{ route('blog.edit', $blog) }}" class="d-grid text-end">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-outline-primary">Edit</button>
                            </form>
                            <form class="d-grid  text-end" method="POST" action="{{ route('blog.destroy', $blog) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>

                    </div>

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
                    <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Like <span
                            class="badge text-bg-secondary">4</span></a>
                    <a href="#" class="btn btn-sm btn-link text-dark text-decoration-none">Comment <span
                            class="badge text-bg-secondary">4</span></a>
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
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                                <x-forms.input type="textarea" placeholder="Write your comment Hre" name="subject" />

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
                            <div class="comments__date col-4 text-end"><span class="text-muted">5-7-2005</span> </div>
                        </div>
                    </div>
                    <p>Bro ipsum dolor sit amet pow pow pow big ring white room, misty park rat shreddin. First tracks crank
                        huck, grab dope stunt rock-ectomy gorby carbon pipe. Air carbon yard sale, first tracks poaching
                        butter
                        sucker hole skid lid fatty over the bars derailleur back country chain ring huckfest. Deck travel
                        trucks
                        reverse camber, presta titanium poaching brain bucket daffy McTwist stomp bomb wheels. Bear trap
                        schwag
                        cornice, over the bars epic 180 ripping. Yard sale fatty 180 pow grind, huck sharkbite 180 switch.
                        Presta manny ski bum, back country frontside road rash whip clipless table top bro.</p>
                </div>

            </div>
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
        });
    </script>
@endpush
