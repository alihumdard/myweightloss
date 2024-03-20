<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="STEPS | BMI FORM">
    <meta name="author" content="My Weight Loss Centre">
    <title>BMI FORM</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('/assets/web/images/favicon/favicon.png')}}" type="image/x-icon">
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
        .shahrozheight {
            /* width: auto; */
            height: 190px !important;
        }

        .btn-outline-logo {
            border: #5987c3 2px solid;
            font-weight: 500;

        }

        .btn-logo-active {
            background-color: #5987c3;
            color: #fff;
            font-weight: 600;
        }

        .btn-outline-logo:hover {
            background-color: #4287e2;
            color: #fff;
            font-weight: 600;
        }

        .item label {
            border-radius: 30px;
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
                            </a>
                        </h1>
                    </div>
                </div>

            </div>
        </div>

    </header>
    <!-- /Header -->

    <main>
        <div class="container">
            <div id="wizard_container">
                <form name="example-1" id="wrapped" method="POST" action="{{ route('web.bmiFormStore') }}" enctype="multipart/form-data">
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
                                <h3>PERSONALISED WEIGHT LOSS PLAN</h3>
                                <p>ACCORDING TO YOUR AGE</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-fast">
                                    <div class="item text-center">
                                        <input id="answer_1" type="radio" name="age" value="18-25" class="required">
                                        <label for="answer_1">
                                            <img src="{{ asset('/assets/web/bmi/img/18-25.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">18-25</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-normal">
                                    <div class="item text-center">
                                        <input id="answer_2" name="age" type="radio" value="26-35" class="required">
                                        <label for="answer_2">
                                            <img src="{{ asset('/assets/web/bmi/img/26-35.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">26-35</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                    <div class="item text-center">
                                        <input id="answer_3" name="age" type="radio" value="36-45" class="required">
                                        <label for="answer_3">
                                            <img src="{{ asset('/assets/web/bmi/img/36-45.png') }}" alt="" class="img-fluid mb-2 shahrozheight">
                                            <button type="button" class=" btn btn-sm btn-primary">36-45</button>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                    <div class="item text-center">
                                        <input id="answer_4" name="age" type="radio" value="46+" class="required">
                                        <label for="answer_4">
                                            <img src="{{ asset('/assets/web/bmi/img/46-pluls.png') }}" alt="" class="img-fluid bg-white mb-2 shahrozheight">
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
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <label class="btn btn-outline-logo btn-logo-active mx-2 px-5 metric">Metric</label>
                                            <label class="btn btn-outline-logo px-5  imperial">Imperial</label>
                                        </div>
                                        <div class="metricInput">
                                            <label for="cm" class="c-bmi__label"><strong>Height(cm)</strong></label>
                                            <input id="cm" class="c-bmi__range form-range mt-1 form-control cm" type="number" name="cm" min="20" max="254" step="0.1" required />

                                            <label id="weight_kg" class="c-bmi__label"><strong>Weight(kg)</strong></label>
                                            <input id="weight_kg" class="c-bmi__range form-range mt-1 form-control weight-kg" type="number" name="weight_kg" min="20" max="400" step="0.1" required />
                                        </div>

                                        <div class="imperialInput d-none">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="feet" class="c-bmi__label"><strong>Feet</strong></label>
                                                    <input id="feet" class="c-bmi__range form-range mt-1 form-control feet" type="number" name="feet" step="0.1" required />
                                                </div>
                                                <div class="col-6">
                                                    <label for="inches" class="c-bmi__label"><strong>Inches</strong></label>
                                                    <input id="inches" class="c-bmi__range form-range mt-1 form-control inches" type="number" name="inches" step="0.1" required />
                                                </div>
                                                <div class="col-6">
                                                    <label for="weight_st" class="c-bmi__label"><strong>Weight(St)</strong></label>
                                                    <input id="weight_st" class="c-bmi__range form-range mt-1 form-control weight_st" type="number" name="weight_st" required />
                                                </div>
                                                <div class="col-6">
                                                    <label for="weight_lb" class="c-bmi__label"><strong>Weight(lb)</strong></label>
                                                    <input id="weight_lb" class="c-bmi__range form-range mt-1 form-control weight-lb" type="number" name="weight_lb" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="weight_pic" class="c-bmi__label"><strong style="font-size: small;">Please upload a photo of yourself on a scale to verify your weight </strong></label> <small style="float: right;"> (<a href="#" data-bs-toggle="modal" data-bs-target="#weight-img">view example</a>)</small>
                                            <input id="weight_pic" class="c-bmi__range  mt-1 form-control " type="file" name="weight_pic" accept="image/*" required />
                                        </div>
                                        <div class="checkbox_questions">
                                            <input name="terms" type="checkbox" class="icheck required" value="yes">
                                            <label style="display: inline;">Please tick this box to confirm you provided the correct information.</label>
                                        </div>
                                    </div>
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
                        <button type="submit" class="submit mx-1">Submit</button>
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

    <!-- <a href="#0" class="cd-nav-trigger ">Menu<span class="cd-icon"></span></a> -->
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

    <!-- image Modal -->
    <div class="modal fade" id="weight-img" tabindex="-1" data-bs-backdrop="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #5987c3;">
                    <h5 class="modal-title fw-bold text-white">My Weightloss Centre</h5>
                    <button type="button" class="btn-close fw-bold text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ url('images/weight_scale1.jpg') }}" class="img-fluid" alt="Weight Scale Image">
                </div>
            </div>
        </div>
    </div>


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/wizard_func_without_branch.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.metric').click(function() {
                $(this).addClass('btn-logo-active');
                $('.imperial').removeClass('btn-logo-active');
                $('.imperialInput').addClass('d-none');
                $('.metricInput').removeClass('d-none');
            });

            $('.imperial').click(function() {
                $(this).addClass('btn-logo-active');
                $('.metric').removeClass('btn-logo-active');
                $('.metricInput').addClass('d-none');
                $('.imperialInput').removeClass('d-none');
            });

            // Function to handle weight input in stones
            $('.weight_st').on('input', function() {
                const weightSt = parseFloat($('.weight_st').val());
                const weightLb = weightSt * 14.000;
                const weightKg = weightLb * 0.453592;
                $('.weight-lb').val(weightLb.toFixed(2));
                $('.weight-kg').val(weightKg.toFixed(2));
            });

            // Function to handle weight input in pounds
            $('.weight-lb').on('input', function() {
                const weightLb = parseFloat($('.weight-lb').val());
                const weightKg = weightLb * 0.453592;
                const weightSt = weightLb / 14;
                $('.weight-kg').val(weightKg.toFixed(2));
                $('.weight_st').val(weightSt.toFixed(2));
            });

            // Function to handle metric input change
            $('.cm, .weight-kg').on('input', function() {
                const heightCm = parseFloat($('.cm').val());
                const weightKg = parseFloat($('.weight-kg').val());
                const heightInches = heightCm * 0.393701;
                const feet = Math.floor(heightInches / 12);
                const inches = Math.round(heightInches % 12);
                $('.feet').val(feet);
                $('.inches').val(inches);
                const weightLb = weightKg * 2.20462;
                const weightSt = weightKg * 0.157473;
                $('.weight-lb').val(weightLb.toFixed(2));
                $('.weight_st').val(weightSt.toFixed(2));

            });

            // Function to handle height input in feet and inches
            $('.feet, .inches').on('input', function() {
                const feet = parseFloat($('.feet').val());
                let inches = parseFloat($('.inches').val());
                if (isNaN(inches)) {
                    inches = 0;
                }
                const height_cm = (feet * 12 + inches) * 2.54;
                const rounded_height_cm = height_cm.toFixed(2);
                $('.cm').val(rounded_height_cm);
            });


        });
    </script>
</body>

</html>