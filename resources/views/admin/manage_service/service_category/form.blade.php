@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', 'Manage Services')

@section('content')
    <!-- Header props -->
    @php
        $title = 'Edit Service Category';
    @endphp
    <!--./ Header props -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            {{-- <form action="{{isset($blog)? route('blogs.update',$blog) : route('blogs.store') }}" method="POST"> --}}
            <form
                action="{{ isset($category) ? route('service-category.update', $category) : route('service-category.store') }}"
                method="POST">

                @csrf
                @isset($category)
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
                <x-forms.input name="category_name" label="Category Name"
                    value="{{ old('category_name', isset($category) ? $category->category_name : '') }}"
                    :isRequired="true"></x-forms.input>
                <x-forms.input name="description" label="description"
                    value="{{ old('description', isset($category) ? $category->description : '') }}" :isRequired="true"
                    type="textarea"></x-forms.input>


                <button type="submit" class="my-2 btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

@endsection

@push('scripts')
    <x-admin.packages.data-table-js />
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    @endpush
