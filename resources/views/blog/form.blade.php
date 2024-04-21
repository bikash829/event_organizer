@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{isset($blog)? route('blogs.update',$blog) : route('blogs.store') }}" method="POST">
                    
                    @csrf
                    @isset($blog)
                        
                        @method('PUT')
                        
                    @endisset
                    <div class=" my-2 form-group">

                        <label for="title">Title</label>

                        <input 
                        value="{{old('title',isset($blog)?$blog->title:'')}}" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title" 
                        name="title" 
                        placeholder="Enter title">

                        @if($errors->has('title'))
                            <div class="error invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    
                    <div class=" my-2 form-group">
                        <label for="content">Content</label>
                    <textarea  
                    class="form-control @error('content') is-invalid @enderror" 
                    id="content" 
                    name="content" 
                    rows="3">{{old('content',isset($blog)?$blog->content:'')}}</textarea>@if($errors->has('content'))<div class="error invalid-feedback">{{ $errors->first('content') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="my-2 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

@endsection