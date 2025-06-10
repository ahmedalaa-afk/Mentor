@extends('user.layouts.master')
@section('body-class','announcement-page')
@section('announcement-active','active')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Announcements</h1>
                        <p class="mb-0">Stay updated with the latest news, events, and important information about our
                            platform, courses, and learning community.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('user.home') }}">Home</a></li>
                    <li class="current">Announcements</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Announcements Section -->
    <section id="announcements" class="announcements section">
        @livewire('user.announcements-filter')
    </section><!-- End Announcements Section -->

</main>
@endsection