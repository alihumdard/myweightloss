<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="STEPS | Multipurpose Working Wizard with Branches">
    <meta name="author" content="Ansonika">
    <title>BMI Calulation Steps</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('/assets/web/bmi/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/icon_fonts/css/all_icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/skins/square/grey.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('/assets/web/bmi/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('/assets/web/bmi/js/modernizr.js') }}"></script>
    <!-- Modernizr -->

</head>

<body>
    <!-- /Preload -->
    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div>

    <main>
        <div class="container ng-lightgray">
            <div class="row">
                <div class="align-items-center data">
                    <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo" alt="Logo">

                    <a href="{{ route('web.logout') }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> LogOut
                    </a>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="wizard_container">
                <form name="example-1" id="wrapped" method="POST">

                    <input id="website" name="website" type="text" value="">

                    <div class="step" data-state="branchtype">
                        <div class="question_title">
                            <h3 class="fw-bold text-center">Let's Create Your Body Profile</h3>
                            <p><strong>Select your gender:</strong></p>
                        </div>

                        <div class="row">
                            <div class="row align-items-center d-flex justify-content-center">
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-fast d-flex justify-content-center">
                                    <div class="item">
                                        <input id="male" type="radio" name="gender" value="male" class="required">
                                        <label for="male">
                                            <img src="{{ asset('/assets/web/bmi/img/weightloss/11.png') }}" class="bmi-main-images" alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 animated zoomIn delay-normal d-flex justify-content-center">
                                    <div class="item">
                                        <input id="female" name="gender" type="radio" value="female" class="required">
                                        <label for="female">
                                            <img src="{{ asset('/assets/web/bmi/img/weightloss/4(1).png') }}" class="bmi-main-images" alt="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- start input form here  -->
                    <div class="step" id="branchtype"  data-state="budget">
                        <div class="question_title">
                            <h3>PERSONALIZED WORKOUT PLAN</h3>
                            <p>ACCORDING TO YOUR AGE</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 animated zoomIn delay-fast">
                                <div class="item text-center">
                                    <input id="answer_1" type="radio" name="age" value="18-25" class="required">
                                    <label for="answer_1">
                                        <img src="{{ asset('/assets/web/bmi/img/11.png') }}" alt="" class="img-fluid mb-2">
                                        <button type="button"  class=" btn btn-sm btn-primary">18-25</button>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 animated zoomIn delay-normal">
                                <div class="item text-center">
                                    <input id="answer_2" name="age" type="radio" value="26-35" class="required">
                                    <label for="answer_2">
                                        <img src="{{ asset('/assets/web/bmi/img/7.png') }}" alt="" class="img-fluid mb-2">
                                        <button type="button"  class=" btn btn-sm btn-primary">26-35</button>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                <div class="item text-center">
                                    <input id="answer_3" name="age" type="radio" value="36-45" class="required">
                                    <label for="answer_3">
                                        <img src="{{ asset('/assets/web/bmi/img/10.png') }}" alt="" class="img-fluid mb-2">
                                        <button type="button"  class=" btn btn-sm btn-primary">36-45</button>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 animated zoomIn delay-medium">
                                <div class="item text-center">
                                    <input id="answer_4" name="age" type="radio" value="46+" class="required">
                                    <label for="answer_4">
                                        <img src="{{ asset('/assets/web/bmi/img/4.png') }}" alt="" class="img-fluid bg-white mb-2">
                                        <button type="button"  class=" btn btn-sm btn-primary">46+</button>
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- step 3 code -->
                    <div class="step" id="budget" data-state="">
                        <div class="question_title">
                            <h3>BMI Calculator</h3>
                            <p>What is your weight and height</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8 col-sm-10 animated zoomIn delay-fast">
                                <div class="items">
                                    <div class="row m-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="height" class="mb-3 text-left font-weight-bold">Height</label>
                                                <input type="number" class="form-control" id="height" placeholder="cm" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="weight" class="mt-3 text-left font-weight-bold">Weight</label>
                                                <input type="number" class="form-control" id="weight" placeholder="kg" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward btn btn-secondary">Backward</button>
                        <button type="button" name="forward" class="forward btn btn-primary">Continue</button>
                        <button class="submit btn btn-info text-light">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    ٍ <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/wizard_func_multiple_branch.js') }}"></script>

</body>

</html>