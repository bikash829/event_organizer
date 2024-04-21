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
                    {{-- <x-forms.input 
                    name="title"
                    type="text" 
                    label="Title"
                    value="{{old('title',isset($blog)?$blog->title:'')}}"
                    class="@error('title') is-invalid @enderror"
                    id="title"
                    :isRequired="false"
                    errorKey="title"

                    ></x-forms.input> --}}
                    <x-forms.input
                    name="title"
                    label="Title"
                    value="{{old('title',isset($blog)?$blog->title:'')}}"
                    :isRequired="true"
                    ></x-forms.input>
                    <x-forms.input
                    name="content"
                    label="Content"
                    value="{{old('content',isset($blog)?$blog->content:'')}}"
                    :isRequired="true"
                    type="textarea"
                    ></x-forms.input>
                   
                    
                    <button type="submit" class="my-2 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

@endsection