@extends('layouts.app')

@section('header')
    <!-- Carousel -->
    <div class="">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slider/slider1.avif') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slider/slider2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/slider/slider3.avif') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--./ Carousel -->
@endsection

@section('content')
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    @auth

        <div>
            <h1>User role : {{ Auth::user()->getRoleNames() }}</h1>
        </div>
    @endauth
    <div class="">
        <!-- About Us -->
        <section class="row">
            <div class="col-12 col-md-6 text-center text-md-start">
                <h1 class="">Something will go here </h1>
            </div>
            <div class="col-12 col-md-6 text-center text-md-start">
                <h1>Something will go there </h1>
            </div>

        </section>
        <button id="clickMe">Click Me</button>
        <!--./ About Us -->
    </div>

    <!-- Datatabel -->
    <section>
        <table id="dataTable1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </section>

    <!--./ Datatabel -->
    <!-- users -->
    <!-- Datatabel -->
    <section>
        <table id="dataTable2" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Edinburgh</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>$320,800</td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </section>


    <!--./ Datatabel -->

@endsection

@push('scripts')
    <script type="module">
        // console.log("hello there");
        // alert("wow");
        $(document).ready(function() {
            $("#dataTable1").DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $("#dataTable2").DataTable({
                responsive: true,
            });
        });
    </script>
@endpush
