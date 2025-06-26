@extends('user.layouts.master')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Register</h1>
                        <p class="mb-0">Create your Mentor account to start your learning journey.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('user.home') }}">Home</a></li>
                    <li class="current">Register</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="section login-section">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8" data-aos="fade-up" data-aos-delay="100">

                    <div class="login-form">
                        <div class="section-title">
                            <h2>Create Account</h2>
                            <p>Please fill in your details to create your account</p>
                        </div>

                        <form action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Your Full Name" value="{{ old('name') }}" autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Your Password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirm Your Password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#"
                                        class="text-primary">Privacy Policy</a>
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                        </div>

                        <div class="social-login mt-4">
                            <p class="text-center text-muted">Or register with</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-outline-primary mx-2"><i class="bi bi-google"></i> Google</a>
                                <a href="#" class="btn btn-outline-primary mx-2"><i class="bi bi-facebook"></i>
                                    Facebook</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section><!-- /Register Section -->

</main>
@endsection