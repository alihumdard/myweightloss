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
                <form name="example-1" id="wrapped" method="POST">
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave input above for security protection, read docs for details -->
                    <div id="middle-wizard">

                        <!-- First branch What Type of Project ============================== -->
                        <div class="step" data-state="branchtype">
                            <div class="question_title">
                                <h3>Why do you want to lose weight?</h3>
                                <p>It is important we understand the motives for trying to mange<br> your weight as this can dictate the type of treatment plan we<br> offer and more specifically the advice we give you for length of treatment and goals.</p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5 animated zoomIn delay-fast">
                                    <div class="box_general">
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="general">General- I want to be healthier</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="Pre">Pre- IVF- I'm planning to have a baby via IVF</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="PCOS">PCOS- I struggle with PCOS weight gain</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="Surgery"><small>Pre- Surgery- I need to lose weight before</small></label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="Post">Post Pregnancy- I recently had a baby</label>
                                        </div>
                                        <div class="form-group short">
                                            <label><input type="radio" name="qustion_1" class="icheck required" value="Other">Other</label>
                                        </div>
                                    </div>
                                    <!-- /box_general -->
                                </div>
                            </div>
                        </div>
                        <!-- /First branch What Type of Project ============================== -->

                        <!-- /What Type of Project > Seo-Optimization ============================== -->
                        <div class="branch" id="Seo-Optimization">
                            <div class="step" data-state="budget">
                                <div class="question_title">
                                    <h3>What Type of Seo Optimization do you need?</h3>
                                    <p>Multiple Selection (Checkbox based)</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 animated zoomIn delay-fast">
                                        <div class="item">
                                            <input id="branch_1_answer_1" type="checkbox" name="branch_1_answers[]" value="Page SEO Checker" class="required">
                                            <label for="branch_1_answer_1"><img src="img/seo_icon_2.svg" alt=""><strong>On Page SEO Checker</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 animated zoomIn delay-normal">
                                        <div class="item">
                                            <input id="branch_1_answer_2" name="branch_1_answers[]" type="checkbox" value="Pay Per Click" class="required">
                                            <label for="branch_1_answer_2"><img src="img/seo_icon_3.svg" alt=""><strong>Pay Per Click</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 animated zoomIn delay-medium">
                                        <div class="item">
                                            <input id="branch_1_answer_3" name="branch_1_answers[]" type="checkbox" value="Backlinks Checker" class="required">
                                            <label for="branch_1_answer_3"><img src="img/seo_icon_4.svg" alt=""><strong>Backlinks Checker</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row-->
                            </div>
                            <!-- /step -->
                        </div>
                        <!-- /What Type of Project > Seo-Optimization ============================== -->

                        <!-- Second branch Web-Development ============================== -->
                        <div class="branch" id="Web-Development">
                            <div class="step" data-state="branchtype">
                                <div class="question_title">
                                    <h3>What Type of Web Development do you need?</h3>
                                    <p>Selection with Branch (Second Branch)</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 animated zoomIn delay-fast">
                                        <div class="item">
                                            <input id="branch_2_answer_1" type="radio" name="branch_2_group_1" value="HTML-Development" class="required">
                                            <label for="branch_2_answer_1"><img src="img/web_development_icon_2.svg" alt=""><strong>HTML Development</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 animated zoomIn delay-normal">
                                        <div class="item">
                                            <input id="branch_2_answer_2" name="branch_2_group_1" type="radio" value="CMS-Development" class="required">
                                            <label for="branch_2_answer_2"><img src="img/web_development_icon_3.svg" alt=""><strong>CMS Development</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 animated zoomIn delay-medium">
                                        <div class="item">
                                            <input id="branch_2_answer_3" name="branch_2_group_1" type="radio" value="FrontEnd-Development" class="required">
                                            <label for="branch_2_answer_3"><img src="img/web_development_icon_4.svg" alt=""><strong>FrontEnd Development</strong>Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row-->
                            </div>
                        </div>
                        <!-- /Second branch Web-Development ============================== -->

                        <!-- Web-Development > HTML-Development ============================== -->
                        <div class="branch" id="HTML-Development">
                            <div class="step" data-state="budget">
                                <div class="question_title">
                                    <h3>Web Development: HTML Development</h3>
                                    <p>Multiple Selection (Checkbox based)</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 animated zoomIn delay-fast">
                                        <div class="box_general">
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_1_answers[]" class="icheck required" value="Responsive">Responsive</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_1_answers[]" class="icheck required" value="Boostrap">Boostrap 4.0 based</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_1_answers[]" class="icheck required" value="Jquery">Jquery 3</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_1_answers[]" class="icheck required" value="Google Web Font">Google Web Font</label>
                                            </div>
                                            <hr>
                                            <h6 class="add_bottom_15">How many pages?</h6>
                                            <div class="form-group">
                                                <div class="qty-buttons">
                                                    <input type="button" value="+" class="qtyplus" name="home_page">
                                                    <input type="text" name="home_page" value="" class="qty form-control required" placeholder="Home page">
                                                    <input type="button" value="-" class="qtyminus" name="home_page">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="qty-buttons">
                                                    <input type="button" value="+" class="qtyplus" name="inner_pages">
                                                    <input type="text" name="inner_pages" value="" class="qty form-control required" placeholder="Inner pages">
                                                    <input type="button" value="-" class="qtyminus" name="inner_pages">
                                                </div>
                                            </div>
                                            <h6 class="add_bottom_15">Any particular notes?</h6>
                                            <textarea class="form-control" style="height:100px; margin-bottom:0;" placeholder="Typer here" name="html_development_notes"></textarea>
                                        </div>
                                        <!-- /box_general -->
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                        </div>
                        <!-- /Web-Development > HTML-Development ============================== -->

                        <!-- Web-Development > CMS-Development ============================== -->
                        <div class="branch" id="CMS-Development">
                            <div class="step" data-state="budget">
                                <div class="question_title">
                                    <h3>Web Development: CMS Development</h3>
                                    <p>Multiple Selection (Checkbox based)</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 animated zoomIn delay-fast">
                                        <div class="box_general">
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_2_answers[]" class="icheck required" value="WordPress">WordPress</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_2_answers[]" class="icheck required" value="Magento">Magento</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_2_answers[]" class="icheck required" value="Drupal">Drupal</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_2_answers[]" class="icheck required" value="Joomla">Joomla</label>
                                            </div>
                                            <div class="form-group short">
                                                <label><input type="checkbox" name="branch_2_2_answers[]" class="icheck required" value="PrestaShop">PrestaShop</label>
                                            </div>
                                            <hr>
                                            <h6 class="add_bottom_15">Any particular notes?</h6>
                                            <textarea class="form-control" style="height:100px; margin-bottom:0;" placeholder="Typer here" name="cms_development_notes"></textarea>
                                        </div>
                                        <!-- /box_general -->
                                    </div>
                                </div>
                                <!-- /row -->
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
                                        <!-- /box_general -->
                                    </div>
                                </div>
                                <!-- /row -->
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
                                <!-- /row-->
                            </div>
                            <!-- /Design > What Type of Design do you need ============================== -->

                            <!-- Budget ============================== -->
                            <div class="step" id="budget" data-state="end">
                                <div class="question_title">
                                    <h3>What is your buget?</h3>
                                    <p>Touchscreen friendly Range Slider</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 animated zoomIn delay-fast">
                                        <div class="box_general">
                                            <div class="rounded_slider">
                                                <div id="budget_slider" style="margin: 0 auto 20px;"></div>
                                                <p>Eu sed epicuri mentitum, ex mei hinc justo, no cum dictas deserunt gubergren. Ferri pericula sententiae eu pro.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
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
                                        <!-- /box_general -->
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /Last step ============================== -->
                        </div>
                    </div>
                    <!-- /middle-wizard -->
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">Backward </button>
                        <button type="button" name="forward" class="forward">Forward</button>
                        <button type="submit" name="process" class="submit">Submit</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /Container -->
    </main>
    <!-- /main -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/wizard_func_multiple_branch.js') }}"></script>
</body>

</html>