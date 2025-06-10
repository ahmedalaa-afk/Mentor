@extends('user.layouts.master')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Login</h1>
                        <p class="mb-0">Access your Mentor account to continue your learning journey.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Login</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="section login-section">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8" data-aos="fade-up" data-aos-delay="100">

                    <div class="login-form">
                        <div class="section-title">
                            <h2>Welcome Back</h2>
                            <p>Please enter your credentials to login</p>
                        </div>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" value="{{ old('email') }}" autofocus >
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Your Password" >
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        
                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        

                        <div class="mt-4 text-center">
                            <a href="forgot-password.html" class="text-muted">Forgot password?</a>
                            <p class="mt-3">Don't have an account? <a href="register.html">Register here</a></p>
                        </div>

                        <div class="social-login mt-4">
                            <p class="text-center text-muted">Or login with</p>
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

    </section><!-- /Login Section -->

</main>
@endsection