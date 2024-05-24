@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">

            <a href="{{route("blogs.create")}}" class="btn btn-lg btn-primary my-2">Create New Blog</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($blogs as $post)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->content }}</p>
                            <a href="{{ route('blogs.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            <a href="{{ route('blogs.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $post->created_at->format('Y-m-d') }} by
                            <a href="#">{{ $post?->user?->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection