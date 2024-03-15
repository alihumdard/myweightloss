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
        label.btn {
            text-align: left !important;
            color: black;
            padding: 5px auto;
            white-space: normal;
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -o-transform: scale(1.0);
            -webkit-transition: transform 0.3s ease-in-out;
            -moz-transition: transform 0.3s ease-in-out;
            -o-transition: transform 0.3s ease-in-out;
        }

        label.btn:hover {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -o-transform: scale(1.05);
        }

        .question_title {
            text-align: center;
            margin-bottom: 0px !important;
            text-align: left;
        }

        .box_general {
            padding: 3rem 0 !important;
        }

        .displaynone {
            display: none;
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
                    <!-- <div id="logo_home">
                        <h1><a href="/">
                                <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo" alt="Logo">
                            </a></h1>
                    </div> -->
                </div>
                <div class="col-9">
                    <div id="social" class="displaynone">
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
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column justify-content-center align-items-center bg--white consultation-header-section p-2">
                        <a class="f--cyan-dark" title="previous-page" id="surveyPrev" href="#"><i class="fas fa-arrow-left"></i></a>
                        <a href="/" style="margin: auto;">
                            <img class="align-top" style="width:100px;" src="{{ asset('/assets/web/consultation/img/Weighloss_final_logo.png') }}"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /container -->

    </header>
    <!-- /Header -->

    <main>
        <div class="container">
            <div id="wizard_container">
                <form name="example-1" id="wrapped" method="POST" action="{{ route('web.consultationStore') }}" enctype="multipart/form-data">
                    @csrf
                    <input id="website" name="website" type="text" value="">
                    <div id="middle-wizard">

                        <!-- question no 1 -->
                        <div class="step" data-state="branchtype">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" row question_title justify-content-center ">
                                        <div class="col-lg-7 animated zoomIn delay-fast">
                                            <h3>Why do you want to lose weight?</h3>
                                            <p style="margin-bottom: 0;">
                                                It is important we understand the motives for trying to mange your weight as this can dictate the type of treatment plan we offer and more specifically the advice we give you for length of treatment and goals.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-7 animated zoomIn delay-fast">
                                            <div class="box_general" style="border:none;">
                                                <div class="form-group short">
                                                    <label for="question_1_ans_1" class="btn btn-lg btn-outline-success btn-block w-100 ">
                                                        <input id="question_1_ans_1" type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." name="question_1" class="icheck required" value="General I want to be healthier">
                                                        General I want to be healthier
                                                    </label>
                                                </div>
                                                <div class="form-group short">
                                                    <label for="question_1_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                        <input id="question_1_ans_2" type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." name="question_1" class="icheck required" value="Pre IVF I'm planning to have a baby via IVF">
                                                        Pre- IVF- I'm planning to have a baby via IVF
                                                    </label>
                                                </div>
                                                <div class="form-group short">
                                                    <label for="question_1_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                        <input id="question_1_ans_3" type="radio" data-branch_id="branch_2" name="question_1" class="icheck required" value="PCOS I struggle with PCOS weight gain">
                                                        PCOS- I struggle with PCOS weight gain
                                                    </label>
                                                </div>
                                                <div class="form-group short">
                                                    <label for="question_1_ans_4" class="btn btn-lg btn-outline-success btn-block w-100">
                                                        <input id="question_1_ans_4" type="radio" data-branch_id="branch_2" name="question_1" class="icheck required" value="Pre Surgery I need to lose weight before.">
                                                        Pre- Surgery- I need to lose weight before. </label>
                                                </div>
                                                <div class="form-group short">
                                                    <label for="question_1_ans_5" class="btn btn-lg btn-outline-success btn-block w-100">
                                                        <input id="question_1_ans_5" type="radio" data-branch_id="branch_2" name="question_1" class="icheck required" value="Post Pregnancy I recently had a baby">
                                                        Post Pregnancy- I recently had a baby
                                                    </label>
                                                </div>
                                                <div class="form-group short">
                                                    <label for="question_1_ans_6" class="btn btn-lg btn-outline-success btn-block w-100">
                                                        <input id="question_1_ans_6" type="radio" data-branch_id="branch_1" name="question_1" class="icheck required" value="Other">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /box_general -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /step -->

                        <!-- ============== branch_1 ================ -->
                        <div class="branch" id="branch_1">
                            <!-- question 5 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please tell us about your other reasons for wanting to manage your weight?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_5_ans_1" class="fw-bold w-100">
                                                            Describe, reasons in details...
                                                        </label>
                                                        <textarea id="question_5_ans_1" data-branch_id="branch_2" name="question_5" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_1  -->

                        <!-- ============== branch_2 ================ -->
                        <div class="branch" id="branch_2">
                            <!-- question  2 -->
                            <div class="step" data-state="question_4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-9 animated zoomIn delay-fast">
                                                <h3>Could you please indicate a general well being score?</h3>
                                                <p style="margin-bottom: 0;">
                                                    How well do you feel generally speaking.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-lg-4">
                                            <div class="col-lg-10">
                                                <div class="row mx-auto">
                                                    <div class="col-md-4 animated zoomIn delay-fast">
                                                        <div class="item">
                                                            <input id="question_2_ans_1" type="radio" name="question_2" value="Happy" class="required">
                                                            <label for="question_2_ans_1">
                                                                <img style="height: auto !important;" src="{{ asset('/assets/web/consultation/img/img3.png') }}" alt="happy" class="img-fluid">
                                                                <strong>Happy</strong></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 animated zoomIn delay-normal">
                                                        <div class="item">
                                                            <input id="question_2_ans_2" name="question_2" type="radio" value="Neutral" class="required">
                                                            <label for="question_2_ans_2">
                                                                <img style="height: auto !important;" src="{{ asset('/assets/web/consultation/img/img1.png') }}" alt="natural" class="img-fluid">
                                                                <strong>Neutral</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 animated zoomIn delay-medium">
                                                        <div class="item">
                                                            <input id="question_2_ans_3" name="question_2" type="radio" value="Unhappy" class="required">
                                                            <label for="question_2_ans_3">
                                                                <img style="height: auto !important;" src="{{ asset('/assets/web/consultation/img/img2.png') }}" alt="unhappy" class="img-fluid">
                                                                <strong>Unhappy</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                            <!-- question  3 -->
                            <div class="step" id="question_4" data-state="question_5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Can you please upload a photograph of yourself?</h3>
                                                <p style="margin-bottom: 0;">
                                                    So we can make an assessment of the suitability of the requested treatment. We ideally need an image showing the entire body.You can be fully clothed, as long as the clothing is not too loose fitting.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <hr style="margin-top: 0 !important;">
                                                    <div class="form-group add_bottom_30">
                                                        <label for="question_3_ans_1" class="w-100">
                                                            <span class="fw-bold">Optional File upload.</span><br>
                                                            <small>(Files accepted: jpg,jpeg,.png,Web - Max file size: 150KB for demo limit)</small>
                                                        </label>
                                                        <div class="fileupload mt-1">
                                                            <input id="question_3_ans_1" type="file" name="question_3" class="icheck required" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                            <!-- question 4 -->
                            <div class="step" id="question_5" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you have any allergies?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_4_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_4_ans_1" data-branch_id="branch_3" name="question_4" class="icheck required" value="Yes">
                                                            Yes.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_4_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_4_ans_2" data-branch_id="branch_4" name="question_4" class="icheck required" value="No">
                                                            No.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_2 -->

                        <!-- ============== branch_3 ================ -->
                        <div class="branch" id="branch_3">
                            <!-- question 6 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please tell us more about your allergies?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_6_ans_1" class="fw-bold w-100">
                                                            Describe, your allergies in details...
                                                        </label>
                                                        <textarea id="question_6_ans_1" data-branch_id="branch_4" name="question_6" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- / branch_3 -->

                        <!-- =============== branch_4 =============== -->
                        <div class="branch" id="branch_4">
                            <!-- question 7 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you had your blood pressure measured in the last 6 months?</h3>
                                                <p style="margin-bottom: 0;">
                                                    If you struggle with weight management, we advise to have your blood pressure checked at least every 6 months with your NHS GP.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_7_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_7_ans_1" data-branch_id="branch_5" name="question_7" class="icheck required" value="Yes, I know the reading">
                                                            Yes, I know the reading.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_7_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_7_ans_2" data-branch_id="branch_7" name="question_7" class="icheck required" value="Yes, But I do not know the reading">
                                                            Yes, But I do not know the reading.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_7_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_7_ans_3" data-branch_id="branch_7" name="question_7" class="icheck required" value="No, I have not had my blood pressure measured">
                                                            No, I have not had my blood pressure measured.
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_4  -->

                        <!--  ===============  branch_5  =============== -->
                        <div class="branch" id="branch_5">
                            <!-- question 8 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>What was the reading / measurement of the last 6 months?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_8_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_8_ans_1" data-branch_id="branch_6" name="question_8" class="icheck required" value="High 140/90 or above">
                                                            High 140/90 or above
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_8_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_8_ans_2" data-branch_id="branch_7" name="question_8" class="icheck required" value="Normal 90/60 to 139/89">
                                                            Normal 90/60 to 139/89
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_8_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_8_ans_3" data-branch_id="branch_7" name="question_8" class="icheck required" value="Low 90/60 or below">
                                                            Low 90/60 or below
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_4  -->

                        <!--  ===============  branch_6  =============== -->
                        <div class="branch" id="branch_6">
                            <!-- question 10-->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you been prescribed anything to treat your high blood pressure?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_10_ans_1" class="fw-bold w-100">
                                                            Describe, your here in details...
                                                        </label>
                                                        <textarea id="question_10_ans_1" data-branch_id="branch_7" name="question_10" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_6 -->

                        <!--  ===============  branch_7  =============== -->
                        <div class="branch" id="branch_7">
                            <!-- question 9 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you had your blood sugar measured in the last 6 months?</h3>
                                                <p style="margin-bottom: 0;">
                                                    We recommend all patients struggling with weight management have their blood sugar measured at least every 6 months. The reading is known as HbA1c.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_9_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_8" id="question_9_ans_1" name="question_9" class="icheck required" value="Yes, I know the reading">
                                                            Yes, I know the reading.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_9_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_9" id="question_9_ans_2" name="question_9" class="icheck required" value="Yes, But I do not know the reading">
                                                            Yes, I do not know the reading.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_9_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_9" id="question_9_ans_3" name="question_9" class="icheck required" value="No, I have not had my blood sugar measured">
                                                            No, I have not had my blood sugar measuredd.
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_7  -->

                        <!--  ===============  branch_8  =============== -->
                        <div class="branch" id="branch_8">
                            <!-- question 11 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>What was the reading / measurement?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_11_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_9" id="question_11_ans_1" name="question_11" class="icheck required" value="Below or equal to 7.8 mmol/L">
                                                            Below or equal to 7.8 mmol/L
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_11_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_9" id="question_11_ans_2" name="question_11" class="icheck required" value="Above 7.8mmol/L">
                                                            Above 7.8mmol/L
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_7  -->

                        <!--  ===============  branch_9  =============== -->
                        <div class="branch" id="branch_9">
                            <!-- question 12 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you have any medical conditions?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_1" name="question_12" class="icheck required" value="Do you have any medical conditions?">
                                                            Do you have any medical conditions?
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_2" name="question_12" class="icheck required" value="No - No medical conditions">
                                                            No - No medical conditions
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_3" name="question_12" class="icheck required" value="Diabetes">
                                                            Diabetes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_4" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_4" name="question_12" class="icheck required" value="Pancreatitis">
                                                            Pancreatitis
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_5" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_5" name="question_12" class="icheck required" value="Inflamed gall bladder or gallstones">
                                                            Inflamed gall bladder or gallstones
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_6" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_6" name="question_12" class="icheck required" value="Heart failure, heart attack or stroke">
                                                            Heart failure, heart attack or stroke
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_7" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_7" name="question_12" class="icheck required" value="Ketoacidosis">
                                                            Ketoacidosis
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_8" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_8" name="question_12" class="icheck required" value="Inflammatory bowel disease i.e. Ulcerative">
                                                            Inflammatory bowel disease i.e. Ulcerative.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_9" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_9" name="question_12" class="icheck required" value="Personal or Family history of Medullary thyroid">
                                                            Personal or Family history of Medullary thyroid.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_10" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_10" name="question_12" class="icheck required" value="Hormone Condition">
                                                            Hormone Condition.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_12_ans_11" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_10" id="question_12_ans_11" name="question_12" class="icheck required" value="Other">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_9  -->

                        <!--  ===============  branch_10  =============== -->
                        <div class="branch" id="branch_10">
                            <!-- question 13 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Tell us a little more about your medical conditions.</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_13_ans_1" class="fw-bold w-100">
                                                            Describe, your medical conditions.
                                                        </label>
                                                        <textarea id="question_13_ans_1" data-branch_id="branch_11" name="question_13" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_10  -->

                        <!--  ===============  branch_11  =============== -->
                        <div class="branch" id="branch_11">
                            <!-- question 14 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you take any medication?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Please include any prescribed or bought medicines, & vitamins/supplements.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_14_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_12" id="question_14_ans_1" name="question_14" class="icheck required" value="Yes, I have.">
                                                            Yes, I have.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_14_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_13" id="question_14_ans_2" name="question_14" class="icheck required" value="No, I don't have.">
                                                            No, I don't have.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_11 -->

                        <!--  ===============  branch_12  =============== -->
                        <div class="branch" id="branch_12">
                            <!-- question 15 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please list the medications or supplements you currently take.</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_15_ans_1" class="fw-bold w-100">
                                                            Describe in details.
                                                        </label>
                                                        <textarea id="question_15_ans_1" data-branch_id="branch_13" name="question_15" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_12  -->

                        <!--  ===============  branch_13  =============== -->
                        <div class="branch" id="branch_13">
                            <!-- question 16 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do any of the following apply to you?</h3>
                                                <p style="margin-bottom: 0;">
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">Taking levothyroxine, liothyronine or any other thyroid hormone.</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">Taking carbimazole, propylthiouracil or any other anti-thyroid medication.</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">Have a diagnosis of thyroid disease including an under or over-active thyroid gland, Hashimotos or Grave's disease.</p>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_16_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_14" id="question_16_ans_1" name="question_16" class="icheck required" value="Yes, I have apply.">
                                                            Yes, I have apply.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_16_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_L_1" id="question_16_ans_2" name="question_16" class="icheck required" value="No">
                                                            No, I don't.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                        </div>
                        <!-- /branch_13 -->

                        <!--  ===============  branch_14  =============== -->
                        <div class="branch" id="branch_14">
                            <!-- question 17 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please read the information listed and click 'yes' if you are happy to proceed.</h3>
                                                <p style="margin-bottom: 0;">
                                                    Just to inform you that patients with thyroid disease are more likely to develop neck swelling whilst on GLP1 type medication such as semaglutide (Wegovy, Ozempic, Rybelsus) or liraglutide (Saxenda). This may also be the case with GLP1/GIP treatments such as Mounjaro. This is a rare side effect, but you may need closer monitoring of your condition by your GP, and stop using this treatment should you experience this side effect.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_17_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_L_1" id="question_17_ans_1" name="question_17" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_17_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." id="question_17_ans_2" name="question_17" class="icheck required" value="No">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_14 -->

                        <!--  ===============  branch_L_1  =============== -->
                        <div class="branch" id="branch_L_1">
                            <!-- question 18 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do any of the following apply to you?</h3>
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">A personal diagnosis of Medullary Thyroid Cancer (MTC), or any member of your family having this.</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">A diagnosis of Multiple Endocrine Neoplasiam Type 2 (MEN2).</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="{{ asset('/assets/web/consultation/img/c4u-bullet.png') }}" alt="" style="width: 15px;vertical-align: bottom;margin-right: 5px;margin-top: 3px;margin-bottom: 15px;">
                                                    <p class="paragraph">A diagnosis of diabetic eye disease (Diabetic Retinopathy).</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_18_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." id="question_18_ans_1" name="question_18" class="icheck required" value="Yes, I have apply.">
                                                            Yes, I have apply.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_18_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_15" id="question_18_ans_2" name="question_18" class="icheck required" value="No">
                                                            No, I don't.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                        </div>
                        <!-- /branch_L_1 -->

                        <!--  ===============  branch_15  =============== -->
                        <div class="branch" id="branch_15">
                            <!-- question  19 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you ever been told you have any problems with your liver or kidneys?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_19_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_16" id="question_19_ans_1" name="question_19" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_19_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_17" id="question_19_ans_2" name="question_19" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_15 -->

                        <!--  ===============  branch_16  =============== -->
                        <div class="branch" id="branch_16">
                            <!-- question  20 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you ever been told you have any problems with your liver or kidneys?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_20_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_20_ans_1" data-branch_id="branch_17" name="question_20" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_16  -->

                        <!--  ===============  branch_17  =============== -->
                        <div class="branch" id="branch_17">
                            <!-- question  21 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Your mental health can be impacted by your weight. Tell us about your mental health and wellbeing. Which of the below applies to you?</h3>
                                                <p style="margin-bottom: 0;">
                                                    <!-- (Please select all that apply) -->
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_21_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_19" id="question_21_ans_1" name="question_21" class="icheck required" value="No, I have never been diagnosed with any conditions relating to mental health or eating disorders.">
                                                            No, I have never been diagnosed with any conditions relating to mental health or eating disorders.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_21_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_18" id="question_21_ans_2" name="question_21" class="icheck required" value="A diagnosis of mental health disorder i.e. depression, anxiety or other.">
                                                            A diagnosis of mental health disorder i.e. depression, anxiety or other.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_21_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_18" id="question_21_ans_3" name="question_21" class="icheck required" value="A diagnosis of any eating disorders i.e. anorexia, bulimia or other">
                                                            A diagnosis of any eating disorders i.e. anorexia, bulimia or other
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_17 -->

                        <!--  ===============  branch_18  =============== -->
                        <div class="branch" id="branch_18">
                            <!-- question  22 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please tell us more about you mental health.?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_22_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_22_ans_1" data-branch_id="branch_19" name="question_22" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_18  -->

                        <!--  ===============  branch_19  =============== -->
                        <div class="branch" id="branch_19">
                            <!-- question  23 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you had any significant weight loss in the last 6 months?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_23_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_20" id="question_23_ans_1" name="question_23" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_23_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_21" id="question_23_ans_2" name="question_23" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_19 -->

                        <!--  ===============  branch_20  =============== -->
                        <div class="branch" id="branch_20">
                            <!-- question  24 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please tell us more about you mental health.?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_24_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_24_ans_1" data-branch_id="branch_21" name="question_24" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_20  -->

                        <!--  ===============  branch_21  =============== -->
                        <div class="branch" id="branch_21">
                            <!-- question  25 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>What are your primary concerns regarding your weight?</h3>
                                                <p style="margin-bottom: 0;">
                                                    <!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, rerum. -->
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_1" name="question_25" class="icheck required" value="Do you have any medical conditions?">
                                                            I am worried about obesity.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_2" name="question_25" class="icheck required" value="No - No medical conditions">
                                                            My weight affects my personal life.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_3" name="question_25" class="icheck required" value="Diabetes">
                                                            My weight affects my health.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_4" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_4" name="question_25" class="icheck required" value="Pancreatitis">
                                                            My weight gets me down.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_5" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_5" name="question_25" class="icheck required" value="Inflamed gall bladder or gallstones">
                                                            My weight make me depressed.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_6" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_6" name="question_25" class="icheck required" value="Heart failure, heart attack or stroke">
                                                            diet and exercise haven't resulted in sufficient and sustained weight loss.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_7" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_23" id="question_25_ans_7" name="question_25" class="icheck required" value="Ketoacidosis">
                                                            I need to lose weight before surgery.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_25_ans_8" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_22" id="question_25_ans_8" name="question_25" class="icheck required" value="Inflammatory bowel disease i.e. Ulcerative">
                                                            Other (please explain).
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_21 -->

                        <!--  ===============  branch_22  =============== -->
                        <div class="branch" id="branch_22">
                            <!-- question  26 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please let us know about your other concerns?</h3>
                                                <p style="margin-bottom: 0;">

                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_26_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_26_ans_1" data-branch_id="branch_23" name="question_26" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_22  -->

                        <!--  ===============  branch_23  =============== -->
                        <div class="branch" id="branch_23">
                            <!-- question  27 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>What is your target weight?</h3>
                                                <p style="margin-bottom: 0;">
                                                    (If you don't have one please write "Don't know")
                                                    <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt, corporis. -->
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_27_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_27_ans_1" data-branch_id="branch_24" name="question_27" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_23  -->

                        <!--  ===============  branch_24  =============== -->
                        <div class="branch" id="branch_24">
                            <!-- question  28 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Smoking?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Smoking and obesity are both high risk factors for heart disease and other serious illness.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_28_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_25" id="question_28_ans_1" name="question_28" class="icheck required" value="I do NOT Smoke">
                                                            I do NOT Smoke.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_28_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_25" id="question_28_ans_2" name="question_28" class="icheck required" value="I smoke regularl">
                                                            I smoke regularly.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_28_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_25" id="question_28_ans_3" name="question_28" class="icheck required" value="I smoke occasionally">
                                                            I smoke occasionally.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_24 -->

                        <!--  ===============  branch_25  =============== -->
                        <div class="branch" id="branch_25">
                            <!-- question  29 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Drinking Alcohol?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Drinking alcohol regularly contributes to obesity and can lead to further health complications such as heart disease & stroke.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_29_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_26" id="question_29_ans_1" name="question_29" class="icheck required" value="I do NOT drink alcohol">
                                                            I do NOT drink alcohol.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_29_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_26" id="question_29_ans_2" name="question_29" class="icheck required" value="I drink alcohol occasionally">
                                                            I drink alcohol occasionally.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_29_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_26" id="question_29_ans_3" name="question_29" class="icheck required" value="I drink alcohol regularly">
                                                            I drink alcohol regularly.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_25 -->

                        <!--  ===============  branch_26  =============== -->
                        <div class="branch" id="branch_26">
                            <!-- question 30 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Tell us about Takeaways / Fast food.</h3>
                                                <p style="margin-bottom: 0;">
                                                    Takeaways and fast food are typically high in fat and salt which can contribute to obesity as well as high blood pressure and heart disease.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_30_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_27" id="question_30_ans_1" name="question_30" class="icheck required" value="I do NOT eat takeaways / fast food regularly">
                                                            I do NOT eat takeaways / fast food regularly.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_30_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_27" id="question_30_ans_2" name="question_30" class="icheck required" value="I eat takeaway / fast food once or twice a week">
                                                            I eat takeaway / fast food once or twice a week.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_30_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_27" id="question_30_ans_3" name="question_30" class="icheck required" value="I eat takeaway / fast food on most days of the week">
                                                            I eat takeaway / fast food on most days of the week.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_26 -->

                        <!--  ===============  branch_27  =============== -->
                        <div class="branch" id="branch_27">
                            <!-- question  31 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Tell us about unhealthy snacks (crisps, chocolate, cakes or biscuits).</h3>
                                                <p style="margin-bottom: 0;">
                                                    These foods are high in fats and sugar contributing to obesity and other illnesses such as high blood pressure and heart disease.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_31_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_28" id="question_31_ans_1" name="question_31" class="icheck required" value="I do NOT eat takeaways / fast food regularly">
                                                            I do NOT eat unhealthy snacks regularly.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_31_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_28" id="question_31_ans_2" name="question_31" class="icheck required" value="I eat takeaway / fast food once or twice a week">
                                                            I eat unhealthy snacks, once or twice a week.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_31_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_28" id="question_31_ans_3" name="question_31" class="icheck required" value="I eat takeaway / fast food on most days of the week">
                                                            I eat unhealthy snacks most days of the week.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_27 -->

                        <!--  ===============  branch_28  =============== -->
                        <div class="branch" id="branch_28">
                            <!-- question  32 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you do any moderate exercise?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Moderate Exercise - Moderate activity will raise your heart rate, and make you breathe faster and feel warmer. One way to tell if you're working at a moderate intensity level is if you can still talk, but not sing. If the heart rate monitor says you're working at 50 to 60% of your max heart rate, then the exercise is considered moderate I do 75 mins of moderate.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_32_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_29" id="question_32_ans_1" name="question_32" class="icheck required" value="I do 60- 120 mins of moderate exercise a week">
                                                            I do 60- 120 mins of moderate exercise a week.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_32_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_29" id="question_32_ans_2" name="question_32" class="icheck required" value="I do 120 mins or more of moderate exercise a week">
                                                            I do 120 mins or more of moderate exercise a week.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_32_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_30" id="question_32_ans_3" name="question_32" class="icheck required" value="I do not do any moderate exercise">
                                                            I do not do any moderate exercise.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_28 -->

                        <!--  ===============  branch_29  =============== -->
                        <div class="branch" id="branch_29">
                            <!-- question  33 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Is your exercise ever vigorous intensity?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Vigorous intensity activity makes you breathe hard and fast. If you're working at this level, you will not be able to say more than a few words without pausing for breath. If the heart rate monitor shows that you're working at 70 to 85% of your heart rate then it's vigorous exercise.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_33_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_30" id="question_33_ans_1" name="question_33" class="icheck required" value="I do 60-120 mins of vigorous exercise a week">
                                                            I do 60-120 mins of vigorous exercise a week
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_33_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_30" id="question_33_ans_2" name="question_33" class="icheck required" value="I do 120 mins or more of vigorous exercise a week">
                                                            I do 120 mins or more of vigorous exercise a week.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_33_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_30" id="question_33_ans_3" name="question_33" class="icheck required" value="I do not do any Vigorous Exercise">
                                                            I do not do any Vigorous Exercise.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_29 -->

                        <!--  ===============  branch_30  =============== -->
                        <div class="branch" id="branch_30">
                            <!-- question  34 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Have you taken any weight loss medication before?</h3>
                                                <p style="margin-bottom: 0;">
                                                    <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus, perspiciatis!. -->
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_34_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_31" id="question_34_ans_1" name="question_34" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_34_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_34_ans_2" name="question_34" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_30 -->

                        <!--  ===============  branch_31  =============== -->
                        <div class="branch" id="branch_31">
                            <!-- question 35 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please let us know about previous attempts to manage your weight?</h3>
                                                <p style="margin-bottom: 0;">
                                                    Please tick any that apply to you
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_35_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_35_ans_1" name="question_35" class="icheck required" value="I have taken Liraglutide (Saxenda)">
                                                            I have taken Liraglutide (Saxenda)
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_35_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_35_ans_2" name="question_35" class="icheck required" value="I have taken Mysimba">
                                                            I have taken Mysimba
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_35_ans_3" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_35_ans_3" name="question_35" class="icheck required" value="I have taken Orlistat (Xenical or Alli)">
                                                            I have taken Orlistat (Xenical or Alli)
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_35_ans_4" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_35_ans_4" name="question_35" class="icheck required" value="I have taken Semaglutide (Ozempic or Rybelsus)">
                                                            I have taken Semaglutide (Ozempic or Rybelsus)
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_35_ans_5" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_32" id="question_35_ans_5" name="question_35" class="icheck required" value="I have used other methods for weight management">
                                                            I have used other methods for weight management
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_31 -->

                        <!--  ===============  branch_32  =============== -->
                        <div class="branch" id="branch_32">
                            <!-- question 36 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>
                                                    Is there anything else about yourself or your medical history that you think our specialists should know about?
                                                </h3>

                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_36_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_34" id="question_36_ans_1" name="question_36" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_36_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_35" id="question_36_ans_2" name="question_36" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_32 -->

                        <!--  ===============  branch_33  =============== -->
                        <div class="branch" id="branch_33">
                            <!-- question  37 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>
                                                    Are you aware that you should never take more than one weight management medicine at a time? Do you agree to ensure you stop taking all other weight management medication before initiating myBMI treatment plan?
                                                </h3>
                                                <p style="margin-bottom: 0;">
                                                    You should never take more than one weight management medicine at one time. Before starting a myBMI treatment plan you should stop taking any other weight management medication. MyBMI treatment plans on their own are enough to manage weight.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_37_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_33" id="question_37_ans_1" name="question_37" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_37_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." id="question_37_ans_2" name="question_37" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_33 -->


                        <!--  ===============  branch_34  =============== -->
                        <div class="branch" id="branch_34">
                            <!-- question  38 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please provide details.</h3>
                                                <p style="margin-bottom: 0;">
                                                    <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt, corporis. -->
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_38_ans_1" class="fw-bold w-100">
                                                            Please provide details.
                                                        </label>
                                                        <textarea id="question_38_ans_1" data-branch_id="branch_35" name="question_38" class="form-control required" style="height:150px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..." name="cms_development_notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_34  -->

                        <!--  ===============  branch_35  =============== -->
                        <div class="branch" id="branch_35">
                            <!-- question  39 -->
                            <div class="step" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>
                                                    <h3>Are you aware of these potential effects of GLP1 weight loss injections and tablets?</h3>
                                                    <p>GLP1 treatments include Wegovy, Saxenda and other injections and tablets that contain Semaglutide. GLP1/GIP Treatments include Mounjaro.</p><br>
                                                    <p>GLP1 and GLP1/GIP treatments, as one of their actions, slow down gastric emptying, which can help make you feel full. This can cause nausea and acid reflux. But if you experience severe stomach pains, vomiting, nausea, and feeling very full long after a meal is finished, then this may be a sign of gastroparesis, or ‘stomach paralysis’. This is an uncommon side effect of weight loss injections, but you should stop using this treatment if this occurs and seek medical attention.</p><br>
                                                    <p>These injections can cause acid reflux as one of their side effects. If you suffer from gastric conditions such as gastritis, Barrett’s oesophagus or a hiatus hernia, these symptoms could be more significant. If affected by these conditions, please discuss starting weight loss injections with your GP or specialist before commencing treatment.</p><br>
                                                    <p>Acute pancreatitis is an uncommon side effect of this treatment. Patients should look out for the signs of pancreatitis whilst using this injection. These include severe, persistent abdominal pain that radiates to the back, tenderness when touching the abdomen, rapid heartbeat, fever, nausea and vomiting. If you suspect pancreatitis, stop using this treatment and seek medical attention.</p><br>
                                                </h3>

                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_39_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="branch_36" id="question_39_ans_1" name="question_39" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_39_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" data-branch_id="no_branch" data-alert="Please choose an other option. You can not procceed futher with that option." id="question_39_ans_2" name="question_39" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_35 -->

                        <!--  ===============  branch_36  =============== -->
                        <div class="branch" id="branch_36" data-state="end">
                            <!-- question  40 -->
                            <div class="step" data-state="question_41">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you agree to the following?</h3>
                                                <p>You will read the "Patient Information Leaflet" supplied with your medication.</p><br>
                                                <p>You have answered all of the questions accurately and truthfully.</p><br>
                                                <p>You have the capacity to make decisions about your own care and are not under the guardianship of anyone.</p><br>
                                                <p>You have read our privacy policy and our Terms & Conditions.</p><br>
                                                <p>You have ensured that the delivery address you will select is safe to accept medicines by post, with no access for children, vulnerable adults or pets.</p>

                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_40_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_40_ans_1" name="question_40" class="icheck required" value="Yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_40_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_40_ans_2" name="question_40" class="icheck required" value="No, I don't have.">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                            <!-- question 41 -->
                            <div class="step" id="question_41" data-state="branchtype">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Would you like us to contact your doctor informing them of what medicine we have provided after your treatment plan is shipped?</h3>
                                                <p style="margin-bottom: 0;">
                                                    This is optional for most conditions, however for some chronic conditions we cannot treat you unless we have permission to inform your NHS GP.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_41_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_41_ans_1" data-branch_id="branch_37" name="question_41" class="icheck required" value="Yes">
                                                            Yes.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_41_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_41_ans_2" data-branch_id="no_branch" data-alert='We cannot provide this service or associated treatments without your consent to view your NHS medical record, and update your NHS GP.' name="question_41" class="icheck required" value="No">
                                                            No.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_36 -->

                        <!--  ===============  branch_37  =============== -->
                        <div class="branch" id="branch_37">

                            <!-- question 42 -->
                            <div class="step" id="question_42" data-state="question_43">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Please provide the name and address of your GP Surgery?</h3>
                                                <p style="margin-bottom: 0;">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_42_ans_1" class="fw-bold w-100">
                                                            GP Surgery name: address...
                                                        </label>
                                                        <textarea id="question_42_ans_1" data-branch_id="branch_2" name="question_42" class="form-control required" style="height:100px; margin-bottom:0; border-radius:10px; " placeholder="Typer here ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                            <!-- question 43 -->
                            <div class="step" data-state="branchtype" id="question_43">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3>Do you consent to our clinicians viewing your NHS medical record
                                                    through the NHS Summary Care Record Online Service? This can
                                                    help our clinicians ensure we are providing the right treatment for
                                                    you.?</h3>
                                                <p style="margin-bottom: 0;">
                                                    This is optional for most conditions, however for some chronic conditions we cannot treat you without seeing this.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <div class="box_general" style="border:none;">
                                                    <div class="form-group short">
                                                        <label for="question_43_ans_1" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_43_ans_1" data-branch_id="branch_38" name="question_43" class="icheck required" value="Yes">
                                                            Yes.
                                                        </label>
                                                    </div>
                                                    <div class="form-group short">
                                                        <label for="question_43_ans_2" class="btn btn-lg btn-outline-success btn-block w-100">
                                                            <input type="radio" id="question_43_ans_2" data-branch_id="no_branch" data-alert='We cannot provide this service or associated treatments without your consent to view your NHS medical record, and update your NHS GP.' name="question_43" class="icheck required" value="No">
                                                            No.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->

                        </div>
                        <!-- /branch_37 -->

                        <!--  ===============  branch_38  =============== -->
                        <div class="branch" id="branch_38">
                            <!-- thank you page -->
                            <div class="step submit" id="end">
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" row question_title justify-content-center ">
                                            <div class="col-lg-7 animated zoomIn delay-fast">
                                                <h3 style="padding: 20px 0px; text-align:center; font-weight:400;">
                                                    Thank you for completing your consultation , please use the below button to submit this.
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /branch_38 -->

                    </div>
                    <!-- /middle-wizard -->
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward  mx-1 py-2 px-5">Backward </button>
                        <button type="button" name="forward" class="forward mx-1 py-2  px-5">Forward</button>
                        <button type="submit" name="process" class="submit mx-2 py-2  px-5 ">Submit</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /Container -->
    </main>
    <!-- /main -->

    <div class="modal fade" id="consult_msg_modal" tabindex="-1" data-bs-backdrop="true">
        <div class="modal-dialog model-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title fw-bold text-white">HealthCare Professional Feedback</h5>
                    <button type="button" class="btn-close fw-bold text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <h1 id="message_popup"> </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/wizard_func_multiple_branch.js') }}"></script>

</body>

</html>