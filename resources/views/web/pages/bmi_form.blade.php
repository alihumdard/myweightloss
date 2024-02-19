<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="STEPS | Multipurpose Working Wizard with Branches">
        <meta name="author" content="Ansonika">
        <title>STEPS | Multipurpose Working Wizard with Branches</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png') }}">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
            href="img/apple-touch-icon-72x72-precomposed.png') }}">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
            href="img/apple-touch-icon-114x114-precomposed.png') }}">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
            href="img/apple-touch-icon-144x144-precomposed.png') }}">

        <!-- GOOGLE WEB FONT -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
            rel="stylesheet">

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
                    <div class="col-md-6 pt-3">
                        <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo">
                    </div>
                    <div class="col-md-6 pt-4 text-md-end">
                        <a href="{{ route('web.logout') }}" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>LogOut
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
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
                        <!-- Leave input above for security protection, read docs for details -->
                        <div class="step" data-state="branchtype">
                            <div class="question_title">
                                <h3>Let's Create Your Body Profile</h3>
                                <p><strong>Select your gender:</strong></p>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-lg-3 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="answer_1" type="radio" name="branch_1_group_1"
                                            value="Seo-Optimization" class="required">
                                        <label for="answer_1"><img
                                                src="{{ asset('/assets/web/bmi/img/weightloss/11.png') }}"
                                                class="bmi-main-images" alt=""></label>
                                    </div>
                                </div>
                                <div class="col-lg-3 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="answer_2" name="branch_1_group_1" type="radio"
                                            value="Seo-Optimization" class="required">
                                        <label for="answer_2"><img
                                                src="{{ asset('/assets/web/bmi/img/weightloss/4(1).png') }}"
                                                class="bmi-main-images" alt=""></label>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                        </div>
                        <!-- start input form here  -->
                        <!-- /First branch What Type of Project ============================== -->

                        <!-- /What Type of Project > Seo-Optimization ============================== -->
                        <div class="branch" id="Seo-Optimization">
                            <div class="step" data-state="budget">
                                <div class="question_title">
                                    <h3>PERSONALIZED WORKOUT PLAN</h3>
                                    <p>ACCORDING TO YOUR AGE</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 animated zoomIn delay-fast">
                                        <div class="item">
                                            <input id="branch_2_answer_1" type="radio" name="branch_1_group_1"
                                                value="Seo-Optimization" class="required">
                                            <label for="branch_2_answer_1"><img
                                                    src="{{ asset('/assets/web/bmi/img/11.png') }}" alt=""><button
                                                    type="button" name="forward" class="forward">18-25</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 animated zoomIn delay-normal">
                                        <div class="item">
                                            <input id="branch_2_answer_2" name="branch_1_group_1" type="radio"
                                                value="Web-Development" class="required">
                                            <label for="branch_2_answer_2"><img
                                                    src="{{ asset('/assets/web/bmi/img/7.png') }}" alt=""><button
                                                    type="button" name="forward" class="forward">26-35</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 animated zoomIn delay-medium">
                                        <div class="item">
                                            <input id="answer_3" name="branch_1_group_1" type="radio" value="Design"
                                                class="required">
                                            <label for="answer_3"><img src="{{ asset('/assets/web/bmi/img/10.png') }}"
                                                    alt=""><button type="button" name="forward"
                                                    class="forward">36-45</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 animated zoomIn delay-medium">
                                        <div class="item">
                                            <input id="answer_4" name="branch_1_group_1" type="radio" value="Design"
                                                class="required">
                                            <label for="answer_4"><img src="{{ asset('/assets/web/bmi/img/4.png') }}"
                                                    alt="" class="bg-white"><button type="button" name="forward"
                                                    class="forward">46+</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /What Type of Project > Seo-Optimization ============================== -->

                        <!-- Additional branch with ID Seo-Optimization -->
                        <!-- under working  -->
                        <div class="branch" id="Seo-Optimization">
                            <div class="step" data-state="budget">
                                <div class="question_title">
                                    <h3>SEO Optimization Details</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="answer_1">SEO Title</label>
                                            <input type="text" id="seo_title" name="branch_1_group_1" class="required"
                                                placeholder="Enter SEO Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="answer_2">SEO Description</label>
                                            <input type="text" id="seo_description" name="seo_description"
                                                class="required" placeholder="Enter SEO Description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- /Web-Development > FrontEnd-Development ============================== -->

                        <!-- Design > What Type of Design do you need ============================== -->
                        <div class="branch" id="Design">


                            <!-- Budget ============================== -->
                            <div class="step" id="budget" data-state="">
                                <div class="question_title">
                                    <h3>BMI Calculator</h3>
                                    <p>What is your weighi and height</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 animated zoomIn delay-fast">
                                        <div class="items">
                                            <div class="form-group">
                                                <label for="height" class="mb-3 text-left f-bold">Height</label>
                                                <input type="number" class="form-control" id="height" placeholder="cm"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="weight" class="mt-3 text-left f-bold">Weight</label>
                                                <input type="number" class="form-control" id="weight" placeholder="kg"
                                                    required>
                                            </div>

                                            <a href="{{ route('web.consultationForm')}}">
                                                <button type="button"
                                                    class="btn btn-info text-light next-step">Continue</button>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                                <!-- /Budget ============================== -->
                            </div>
                        </div>
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">Backward </button>
                            <a href="/index.html"><button type="button" name="forward"
                                    class="forward">Continue</button></a>

                            <button type="submit" name="process" class="submit">Submit</button>
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
