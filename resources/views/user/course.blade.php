@extends('user.layouts.master')
@section('body-class', 'course-page')
@section('course-active', 'active')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Courses</h1>
                        <p class="mb-0">Explore our courses and find the best one for you!</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="#">Home</a></li>
                    <li class="current">Courses</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">
        <div class="container">
            <div class="row">

                <!-- Sidebar (Filters) -->
                <div class="col-lg-3">
                    <div class="sidebar p-3 shadow-sm bg-white rounded">
                        <h5 class="fw-bold mb-3">Filters</h5>

                        <form action="#" method="GET">
                            <!-- Categories -->
                            <div class="mb-3">
                                <h6 class="fw-bold">Categories</h6>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="category-1">
                                    <label class="form-check-label" for="category-1">Web Development</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="category-2">
                                    <label class="form-check-label" for="category-2">Marketing</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="category-3">
                                    <label class="form-check-label" for="category-3">Content Writing</label>
                                </div>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-3">
                                <h6 class="fw-bold">Price</h6>
                                <select class="form-select">
                                    <option value="all">All Prices</option>
                                    <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>

                            <!-- Course Level -->
                            <div class="mb-3">
                                <h6 class="fw-bold">Level</h6>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="level-1">
                                    <label class="form-check-label" for="level-1">Beginner</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="level-2">
                                    <label class="form-check-label" for="level-2">Intermediate</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="level-3">
                                    <label class="form-check-label" for="level-3">Advanced</label>
                                </div>
                            </div>

                            <!-- Ratings -->
                            <div class="mb-3">
                                <h6 class="fw-bold">Rating</h6>
                                <select class="form-select">
                                    <option value="all">All Ratings</option>
                                    <option value="4">4 stars & above</option>
                                    <option value="3">3 stars & above</option>
                                    <option value="2">2 stars & above</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                        </form>
                    </div>
                </div> <!-- End Sidebar -->

                <!-- Courses Grid -->
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                            <div class="course-item">
                                <img src="assets/img/course-1.jpg" class="img-fluid" alt="Course Image">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">Web Development</p>
                                        <p class="price">$169</p>
                                    </div>
                                    <h3><a href="#">Website Design</a></h3>
                                    <p class="description">Short description of the course goes here...</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                                            <a href="#" class="trainer-link">Antonio</a>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-person user-icon"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item -->

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                            <div class="course-item">
                                <img src="assets/img/course-2.jpg" class="img-fluid" alt="Course Image">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">Marketing</p>
                                        <p class="price">$250</p>
                                    </div>
                                    <h3><a href="#">Search Engine Optimization</a></h3>
                                    <p class="description">Short description of the course goes here...</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-2-2.jpg" class="img-fluid" alt="">
                                            <a href="#" class="trainer-link">Lana</a>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-person user-icon"></i>&nbsp;35
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart heart-icon"></i>&nbsp;42
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item -->

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                            <div class="course-item">
                                <img src="assets/img/course-3.jpg" class="img-fluid" alt="Course Image">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="category">Content Writing</p>
                                        <p class="price">$180</p>
                                    </div>
                                    <h3><a href="#">Copywriting</a></h3>
                                    <p class="description">Short description of the course goes here...</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-3-2.jpg" class="img-fluid" alt="">
                                            <a href="#" class="trainer-link">Brandon</a>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-person user-icon"></i>&nbsp;20
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart heart-icon"></i>&nbsp;85
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item -->

                    </div>
                </div> <!-- End Course Grid -->

            </div>
        </div>
    </section><!-- /Courses Section -->

</main>
@endsection
