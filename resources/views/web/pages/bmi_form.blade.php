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
                <div class="col-md-6 pt-3">
                    <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo">
                </div>
                <div class="col-md-6 pt-4 text-md-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>Login
                    </button>
                    <!-- Modal -->
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
                                    <input id="answer_1" type="radio" name="branch_1_group_1" value="Seo-Optimization" class="required">
                                    <label for="answer_1"><img src="{{ asset('/assets/web/bmi/img/weightloss/11.png') }}" class="bmi-main-images" alt=""></label>
                                </div>
                            </div>
                            <div class="col-lg-3 animated zoomIn delay-normal">
                                <div class="item">
                                    <input id="answer_2" name="branch_1_group_1" type="radio" value="Web-Development" class="required">
                                    <label for="answer_2"><img src="{{ asset('/assets/web/bmi/img/weightloss/4(1).png') }}" class="bmi-main-images" alt=""></label>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                    </div>
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
                                        <input id="branch_2_answer_1" type="radio" name="branch_1_group_1" value="Seo-Optimization" class="required">
                                        <label for="branch_2_answer_1"><img src="{{ asset('/assets/web/bmi/img/11.png') }}" alt=""><button type="button" name="forward" class="forward">18-25</button>
                                    </div>
                                </div>
                                <div class="col-lg-3 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="branch_2_answer_2" name="branch_1_group_1" type="radio" value="Web-Development" class="required">
                                        <label for="branch_2_answer_2"><img src="{{ asset('/assets/web/bmi/img/7.png') }}" alt=""><button type="button" name="forward" class="forward">26-35</button>
                                    </div>
                                </div>
                                <div class="col-lg-3 animated zoomIn delay-medium">
                                    <div class="item">
                                        <input id="answer_3" name="branch_1_group_1" type="radio" value="Design" class="required">
                                        <label for="answer_3"><img src="{{ asset('/assets/web/bmi/img/10.png') }}" alt=""><button type="button" name="forward" class="forward">36-45</button>
                                    </div>
                                </div>
                                <div class="col-lg-3 animated zoomIn delay-medium">
                                    <div class="item">
                                        <input id="answer_4" name="branch_1_group_1" type="radio" value="Design" class="required">
                                        <label for="answer_4"><img src="{{ asset('/assets/web/bmi/img/4.png') }}" alt="" class="bg-white"><button type="button" name="forward" class="forward">46+</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /step -->
                    </div>
                    <!-- /What Type of Project > Seo-Optimization ============================== -->

                    <!-- Second branch Web-Development ============================== -->
                    <div class="branch" id="Web-Development">
                        <div class="step" data-state="branchtype">
                            <div class="question_title">
                                <h3>What is your goal?</h3>
                                <p>Fitcoach will Create a personalized plan tailored to your needs and goal</p>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-lg-4 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="branch_3_answer_1" type="radio" name="branch_2_group_1" value="HTML-Development" class="required">
                                        <label for="branch_3_answer_1"><img src="{{ asset('/assets/web/bmi/img/female_lose_weight.png') }}" alt=""><strong>Lose Weight</strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="branch_3_answer_2" name="branch_2_group_1" type="radio" value="CMS-Development" class="required">
                                        <label for="branch_3_answer_2"><img src="{{ asset('/assets/web/bmi/img/female_gain_muscle.png') }}" alt=""><strong>Get in shape</strong></label>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /Second branch Web-Development ============================== -->

                    <!-- Web-Development > HTML-Development ============================== -->
                    <div class="branch" id="HTML-Development">
                        <div class="step" data-state="budget">
                            <div class="question_title">
                                <h3>Choose your current body type</h3>
                                <!--<p>Multiple Selection (Checkbox based)</p>-->
                            </div>
                            <div class="row">
                                <div class="col-lg-4 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="branch_2_answer_1" type="radio" name="branch_2_group_1" value="HTML-Development" class="required">
                                        <label for="branch_2_answer_1"><img src="{{ asset('/assets/web/bmi/img/download(1).webp') }}" alt=""><strong>Average</strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="branch_2_answer_2" name="branch_2_group_1" type="radio" value="CMS-Development" class="required">
                                        <label for="branch_2_answer_2"><img src="{{ asset('/assets/web/bmi/img/download(2).webp') }}" alt=""><strong>Plump</strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-medium">
                                    <div class="item">
                                        <input id="branch_2_answer_3" name="branch_2_group_1" type="radio" value="FrontEnd-Development" class="required">
                                        <label for="branch_2_answer_3"><img src="{{ asset('/assets/web/bmi/img/download(3).webp') }}" alt=""><strong>Extra</strong></label>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    <!-- /Web-Development > HTML-Development ============================== -->

                    <!-- Web-Development > CMS-Development ============================== -->
                    <div class="branch" id="CMS-Development">
                        <div class="step" data-state="budget">
                            <div class="question_title">
                                <h3>Choose your current body type</h3>
                                <!--<p>Multiple Selection (Checkbox based)</p>-->
                            </div>
                            <div class="row">
                                <div class="col-lg-4 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="branch_2_answer_1" type="radio" name="branch_2_group_1" value="HTML-Development" class="required">
                                        <label for="branch_2_answer_1"><img src="{{ asset('/assets/web/bmi/img/download(1).webp') }}" alt=""><strong>Average</strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="branch_2_answer_2" name="branch_2_group_1" type="radio" value="CMS-Development" class="required">
                                        <label for="branch_2_answer_2"><img src="{{ asset('/assets/web/bmi/img/download(2).webp') }}" alt=""><strong>Plump</strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-medium">
                                    <div class="item">
                                        <input id="branch_2_answer_3" name="branch_2_group_1" type="radio" value="FrontEnd-Development" class="required">
                                        <label for="branch_2_answer_3"><img src="{{ asset('/assets/web/bmi/img/download(3).webp') }}" alt=""><strong>Extra</strong></label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /Web-Development > CMS-Development ============================== -->

                    <!-- Web-Development > FrontEnd-Development ============================== -->
                    <div class="branch" id="FrontEnd-Development">
                        <div class="step" data-state="budget">
                            <div class="question_title">
                                <h3>Web Development: FrontEnd Development</h3>
                                <p>Multiple Selection (Checkbox based)</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5 animated zoomIn delay-fast">
                                    <div class="box_general">
                                        <div class="form-group short">
                                            <label><input type="checkbox" name="branch_2_3_answers[]" class="icheck required" value="Jquery">Jquery</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="checkbox" name="branch_2_3_answers[]" class="icheck required" value="Angularjs 2">Angularjs 2</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="checkbox" name="branch_2_3_answers[]" class="icheck required" value="Angularjs 4">Angularjs 4</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="checkbox" name="branch_2_3_answers[]" class="icheck required" value="Reactjs">Reactjs</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="checkbox" name="branch_2_3_answers[]" class="icheck required" value="Sass">Sass</label>
                                        </div>
                                        <hr>
                                        <h6 class="add_bottom_15">Any particular notes?</h6>
                                        <textarea class="form-control" style="height:100px; margin-bottom:0;" placeholder="Typer here" name="frontend_development_notes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Web-Development > FrontEnd-Development ============================== -->

                    <!-- Design > What Type of Design do you need ============================== -->
                    <div class="branch" id="Design">
                        <div class="step" data-state="budget">
                            <div class="question_title">
                                <h3>What Type of Design do you need?</h3>
                                <p>Multiple Selection (Checkbox based)</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 animated zoomIn delay-fast">
                                    <div class="item">
                                        <input id="branch_3_answer_1" type="checkbox" name="branch_3_answers[]" value="Web Design">
                                        <label for="branch_3_answer_1"><img src="img/design_icon_2.svg" alt=""><strong>Web Design</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-normal">
                                    <div class="item">
                                        <input id="branch_3_answer_2" name="branch_3_answers[]" type="checkbox" value="Print Design">
                                        <label for="branch_3_answer_2"><img src="img/design_icon_3.svg" alt=""><strong>Print Design</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 animated zoomIn delay-medium">
                                    <div class="item">
                                        <input id="branch_3_answer_3" name="branch_3_answers[]" type="checkbox" value="Logo Design">
                                        <label for="branch_3_answer_3"><img src="img/design_icon_4.svg" alt=""><strong>Logo Design</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Design > What Type of Design do you need ============================== -->

                        <!-- Budget ============================== -->
                        <div class="step" id="budget" data-state="">
                            <div class="question_title">
                                <h3>50 million</h3>
                                <p>users have chosen us</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5 animated zoomIn delay-fast">
                                    <div class="items">
                                        <img src="{{ asset('/assets/web/bmi/img/weightloss/25.png') }}" alt="">
                                    </div>
                                    <a href="{{ route('web.regisrationFrom')}}">
                                        <button type="button" class="btn btn-info next-step">Continue</button>
                                    </a>
                                </div>

                            </div>
                            <!-- /Budget ============================== -->

                            <!-- Last step ============================== -->
                            <div class="submit step" id="end">
                                <div class="question_title">
                                    <h3>Plase fill with your details</h3>
                                    <p>Ei duo homero postea dignissim.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 animated zoomIn delay-fast">
                                        <div class="box_general">
                                            <div class="form-group">
                                                <input type="text" name="first_last_name" class="required form-control" placeholder="First and Last name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="required form-control" placeholder="Your Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="telephone" class="form-control" placeholder="Your Telephone">
                                            </div>
                                            <div class="form-group add_bottom_30">
                                                <div class="styled-select">
                                                    <select class="required" name="country">
                                                        <option value="" selected>Select your country</option>
                                                        <option value="Europe">Europe</option>
                                                        <option value="Asia">Asia</option>
                                                        <option value="North America">North America</option>
                                                        <option value="South America">South America</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="checkbox_questions">
                                                <input name="terms" type="checkbox" class="icheck required" value="yes">
                                                <label>Please accept <a href="#" data-bs-toggle="modal" data-bs-target="#terms-txt">terms and conditions</a>.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">Backward </button>
                        <a href="/index.html"><button type="button" name="forward" class="forward">Continue</button></a>

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