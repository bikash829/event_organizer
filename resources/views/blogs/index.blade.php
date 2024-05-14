@extends('layouts.app')
@section('title', 'Blog')

@push('styles')
    <link rel="stylesheet" href="{{ asset('./css/blogs/blog.css') }}" />
@endpush

@section('header')
    <!-- Carousel -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Blogs </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('blog.create') }}">Create Blog
                        Post</a></li>
            </ol>
        </nav>
    </div>
    <!--./ Carousel -->

@endsection

@section('content')

    <!--./ Create new blog -->

    <div class="card-container"> <!--existed blogs card-container -->
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
                                    <a href="#" class="text-decoration-none text-dark"><strong>Author
                                            Name</strong></a>
                                </div>
                                <div class="col-4">
                                    <p class="card-text text-end"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Brain bucket apres face plant, afterbang laps dope butter face shots wack park
                            glades white room betty. Dust on crust table top couloir, deck brain bucket giblets phat gnar.
                            Tele taco glove brain bucket, McTwist couloir flow wheelie park pillow popping crank gondy avie
                            carve frontside switch. Heli air travel dirtbag Skate. Schwag grind mute flow wheels. </p>
                        <a href="#" class="btn btn-secondary">Read More</a>
                    </div>

                    <div class="card-footer bg-transparent border-0 position-absolute bottom-0 end-0">
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
            </div>
        </div>
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
    </div> <!--./ existed blogs card-container -->


    <!-- toast alert -->
    @foreach (['success', 'error'] as $status)
        @session($status)
            <x-alert.toast-alert :title="ucfirst($status)" message="{{ session('success') }}" />
        @endsession
    @endforeach

@endsection
