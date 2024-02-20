<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>login</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">
        <link href="{{asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}">
        </link>
        <!-- custome styling -->
        <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/style.css') }}">


    </head>

    <body>
        <main>
            <div class="container">


                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                                        <img src="assets/img/logo.png" alt="">
                                        <span class="d-none d-lg-block">My WeightLoss</span>
                                    </a>
                                </div><!-- End Logo -->

                                <div class="card mb-3">

                                    <div class="card-body">

                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                            <p class="text-center small">Enter your username & password to login</p>
                                        </div>

                                        <div class="col-12 mx-auto">
                                            <!-- Display Validation Errors -->
                                            @if(session('status') === 'error')
                                            <div class="alert alert-danger">
                                                <strong>Error:</strong>
                                                @foreach(session('message')->all() as $error)
                                                <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                            @endif

                                            <!-- Display Success Message -->
                                            @if(session('status') === 'success')
                                            <div class="alert alert-success">
                                                <strong>Success:</strong> {{ session('message') }}
                                            </div>
                                            @endif

                                            <!-- Display Invalid Credentials or Admin Contact Message -->
                                            @if(session('status') === 'invalid')
                                            <div class="alert alert-danger">
                                                <strong>Error:</strong> {{ session('message') }}
                                            </div>
                                            @endif

                                            <!-- Display Unverified User Message -->
                                            @if(session('status') === 'Unverfied')
                                            <div class="alert alert-warning">
                                                <strong>Warning:</strong> {{ session('message') }}
                                            </div>
                                            @endif

                                            <!-- Display Deactivated User Message -->
                                            @if(session('status') === 'Deactive')
                                            <div class="alert alert-danger">
                                                <strong>Error:</strong> {{ session('message') }}
                                            </div>
                                            @endif

                                            @if(session('status') === 'noexitance')
                                            <div class="alert alert-danger">
                                                <strong>Error:</strong> {{ session('message') }}
                                            </div>
                                            @endif
                                        </div>
                                        <form class="row g-3 needs-validation" action="{{ route('web.login')}}"
                                            method="post" novalidate>
                                            @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        value="{{ session('email') ?? ''}}" required>
                                                    <div class="invalid-feedback">Please enter valid email.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        value="true" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Don't have account?</p>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->

        <script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="{{asset('/assets/admin/plugins/tinymce/tinymce.min.js') }}"></script>
        <script src="{{asset('/assets/admin/dist/js/main.js')}}"></script>


    </body>

</html>
