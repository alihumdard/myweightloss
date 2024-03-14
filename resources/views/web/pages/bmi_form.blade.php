<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="STEPS | BMI FORM">
    <meta name="author" content="Ansonika">
    <title>BMI FORM</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('/assets/web/bmi/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('/assets/web/bmi/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/icon_fonts/css/all_icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/skins/square/grey.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('/assets/web/bmi/css/custom.css') }}" rel="stylesheet">

    <script src="{{ asset('/assets/web/bmi/js/modernizr.js') }}"></script>
    <!-- Modernizr -->

    <style>
        .shahrozheight{
            /* width: auto; */
            height:190px !important;
        }
    </style>

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="/">
                                <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo" alt="Logo">
                            </a></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div id="social">
                        <ul>
                            <li><a href="#0"><i class="icon-facebook"></i></a></li>
                            <li><a href="#0"><i class="icon-twitter"></i></a></li>
                            <li><a href="#0"><i class="icon-google"></i></a></li>
                            <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- /social -->
                    <nav>
                        <ul class="cd-primary-nav">
                            <li><a href="about.html" class="animated_link">Home</a></li>
                            <li><a href="contacts.html" class="animated_link">Contacts</a></li>
                            <li><a href="icon-pack-1.html" class="animated_link">About Us</a></li>
                            <li><a href="icon-pack-2.html" class="animated_link">Products</a></li>
                            <li><a href="icon-pack-2.html" class="animated_link">Log Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- /container -->
    </header>
    <!-- /Header -->

    <main>
        <div class="container">
            <div id="wizard_container">
                <form name="example-1" id="wrapped" method="POST" action="{{ route('web.bmiFormStore') }}">
                    @csrf
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">

                        <div class="step">
                            <div class="question_title">
                                <h3>Let's Create Your Body Profile</h3>
                                <p>Select your gender:</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="male" type="radio" name="gender" value="male" class="required">
                                        <label for="male">
                                            <img src="{{ asset('/assets/web/bmi/img/weightloss/11.png') }}" alt="male" class="bmi-main-images img-fluid">
                                            <strong>Male</strong>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="female" type="radio" name="gender" value="female" class="required">
                                        <label for="female">
                                            <img src="{{ asset('/assets/web/bmi/img/weightloss/4(1).png') }}" alt="Female" class="bmi-main-images img-fluid">
                                            <strong>Female</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->
                        </div>
                        <!-- /step-->

                        <div class="step">
                            <div class="question_title">
                                <h3>PERSONALIZED WORKOUT PLAN</h3>
                                <p>ACCORDING TO YOUR AGE</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-fast">
                                    <div class="item text-center">
                                        <input id="answer_1" type="radio" name="age" value="18-25" class="required">
                                        <label for="answer_1" >
                                            <img src="{{ asset('/assets/web/bmi/img/11.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">18-25</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-normal">
                                    <div class="item text-center">
                                        <input id="answer_2" name="age" type="radio" value="26-35" class="required">
                                        <label for="answer_2">
                                            <img src="{{ asset('/assets/web/bmi/img/7.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">26-35</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                    <div class="item text-center">
                                        <input id="answer_3" name="age" type="radio" value="36-45" class="required">
                                        <label for="answer_3" >
                                            <img src="{{ asset('/assets/web/bmi/img/10.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">36-45</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                    <div class="item text-center">
                                        <input id="answer_4" name="age" type="radio" value="46+" class="required">
                                        <label for="answer_4">
                                            <img src="{{ asset('/assets/web/bmi/img/4.png') }}" alt="" class="img-fluid bg-white mb-2 shahrozheight" >
                                            <button type="button" class=" btn btn-sm btn-primary">46+</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->
                        </div>
                        <!-- /step -->

                        <!-- Last step ============================== -->
                        <div class="submit step">
                            <div class="question_title">
                                <h3>BMI Calculator</h3>
                                <p>What is your weight and height?</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5 animated zoomIn delay-fast">
                                    <div class="box_general">
                                        <div class="form-group">
                                            <input type="number" name="height"  min="20" max="254" step="0.1" class="form-control" placeholder="Your height in (Cm)">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="weight" min="20" max="400" step="0.1" class="form-control" placeholder="Your weight in (Kg)">
                                        </div>
                                        <div class="checkbox_questions">
                                            <input name="terms" type="checkbox" class="icheck required" value="yes">
                                            <label>Please tick this box to confirm you provided the correct information.</label>
                                        </div>
                                    </div>
                                    <!-- /box_general -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /Last step ============================== -->
                    </div>
                    <!-- /middle-wizard -->
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward mx-1">Backward </button>
                        <button type="button" name="forward" class="forward mx-1">Forward</button>
                        <button type="submit"  class="submit mx-1">Submit</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /Container -->
    </main>
    <!-- /main -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->

    <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
    <!-- /cd-nav-trigger -->

    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsLabel">Terms and conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal terms -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/wizard_func_without_branch.js') }}"></script>

</body>

</html>