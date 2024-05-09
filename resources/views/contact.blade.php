@extends('layouts.app')

@section('header')
    <!-- Carousel -->

    <x-layouts.banner imgLocation="./assets/images/banner/banner.jpeg" alt="contact us banner" />

    <!--./ Carousel -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="img-container">
                {{-- <img class="img-fluid rounded " src="{{ asset('./assets/images/banner/banner.jpeg') }}" --}}
                {{-- alt="contact us banner" /> --}}
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d29252.103740141778!2d90.31838834999999!3d23.58592925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sbd!4v1715189381084!5m2!1sen!2sbd"
                    class="container-fluid rounded" height="430" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <x-forms.input label="Full Name" name="name" value="{{ old('name') }}" :isRequired="true" />
                            <x-forms.input label="Email" colSize="col-md-6 col-12" name="email" type="email"
                                value="{{ old('email') }}" :isRequired="true" />
                            <x-forms.input label="Phone" colSize="col-md-6 col-12" class="col-12 col-md-6" maxLength="11"
                                name="phone" value="{{ old('phone') }}" :isRequired="true" />
                            <x-forms.input label="Subject" name="subject" value="{{ old('subject') }}" :isRequired="true" />
                            <x-forms.input label="Message" name="message" value="{{ old('message') }}" type="textarea"
                                :isRequired="true" />
                            <div class="col-12 text-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- query alert -->
    {{-- @session('success')
        <x-alert.toast title="Success" message="{{ session('success') }}" />
        @push('scripts')
            <script type="module">
                bootstrap.Toast.getOrCreateInstance($('#toast')[0]).show();
            </script>
        @endpush
    @endsession
    @session('error')
        <x-alert.toast title="Error" message="{{ session('error') }}" />
        @push('scripts')
            <script type="module">
                bootstrap.Toast.getOrCreateInstance($('#toast')[0]).show();
            </script>
        @endpush
    @endsession --}}

    @foreach (['success', 'error'] as $status)
        @session($status)
            <x-alert.toast-alert :title="ucfirst($status)" message="{{ session('success') }}" />
        @endsession
    @endforeach
@endsection
