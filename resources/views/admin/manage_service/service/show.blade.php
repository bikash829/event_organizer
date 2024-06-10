@extends('admin.layouts.app')
@push('styles')
    <x-admin.packages.data-table-css />
@endpush
@section('title', ' Service')
<!-- Header props -->
@php
    $title = 'Service Details';
@endphp
<!--./ Header props -->

@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">


            <div class="row">
                <div class="col-md-6">
                    {{-- <h3 class="card-title">Service Details</h3> --}}
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.item.index') }}" class="btn btn-primary my-2">View Items</a>
                    <a href="{{ route('admin.item.create', ['service_id' => $service->id]) }}" class="btn btn-success my-2">Add
                        Items</a>
                </div>
            </div>


        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.store') }}">
                <div class="row">
                    <x-forms.input colSize="col-md-6" attr="readonly" label="Service Category"
                        value="{{ $service->serviceCategory->category_name }}" />


                    <x-forms.input colSize="col-md-6" label="Service Name" attr="readonly"
                        value="{{ $service->service_name }}" />


                    <x-forms.input colSize="col-md-6" label="Vendor" attr="readonly"
                        value="{{ $service->vendor->email }}" />


                    <x-forms.input colSize="col-md-6" label="Available?" attr="readonly"
                        value="{{ $service->is_available }}" />



                    <x-forms.input label="Description" type="textarea" attr="readonly"
                        value="{{ $service->description }}" />

                    <div class="col-12">
                        <button type="submit" class="my-2 btn btn-primary">Edit</button>
                        <button type="submit" class="my-2 btn btn-danger">Delete</button>
                    </div>


                </div>
            </form>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

@endsection



@push('scripts')
    <x-admin.packages.data-table-js />
@endpush
