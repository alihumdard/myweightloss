@extends('web.layouts.default')
@section('title', 'About Us')
@section('content')

<!-- ========================
       page title 
    =========================== -->
<section class="page-title page-title-layout1 bg-overlay">
    <!-- <div class="overlay"></div> -->
    <div class="bg-img"><img src="{{ asset('/assets/web/images/tsp/about-page/2.png') }}" alt="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <h1 class="pagetitle__heading">Your Journey to a Healthier You Begins Here.</h1>
                <p class="pagetitle__desc">With the support of our team of experts and healthcare professionals, begin your weight management journey right now. </p>
                <div class="d-flex flex-wrap align-items-center">
                    <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
                        <span>Meet our Professionals</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    <!-- <a href="services.html" class="btn btn__white btn__rounded">
                        <span>Our Services</span>
                        <i class="icon-arrow-right"></i>
                    </a> -->
                </div>
            </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.page-title -->

<!-- ========================
      About Layout 1
    =========================== -->
<section class="about-layout1 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading-layout2">
                    <h3 class="heading__title mb-40">a dedicated team of professionals in weight management</h3>
                </div><!-- /heading -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="about__Text">
                    <p class="">Welcome to MyWeight-loss Centre, the most expert weight-loss solutions provider and a customised weight management plan made by healthcare professionals. The best team of experts, with a deep understanding of the latest weight loss techniques, conduct online consultations to help you find the best strategy for you. </p>
                    <p class="">We offer weekly video consultations, daily meal tips, exercise routines, medications, as well as medical consultations. Buy direct from our website weight-loss products. Here's how weight loss works:</p>
                    <ul  class="list-items list-items-layout2  list-horizontal list-unstyled">
                    <li>Virtual Assessment</li>
                    <li>Evaluation by Our Weight Loss Expert</li>
                    <li>Online Weight-loss Consultation</li>
                    <li>Ongoing Patient Care</li>
                    </ul>
                    <div class="d-flex align-items-center  mb-30">
                        <a href="doctors-grid.html" class="btn btn__primary btn__outlined btn__rounded mr-30">
                        Meet our Professionals</a>
                        <!-- <img src="{{ asset('/assets/web/images/about/singnture.png') }}" alt="singnture"> -->
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="video-banner">
                    <img src="{{ asset('/assets/web/images/about/1.jpg') }}" alt="about">
                    <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                        <div class="video__player">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                </div><!-- /.video-banner -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.About Layout 1 -->

<!-- ======================
    Features Layout 1
    ========================= -->
<section class="features-layout1 pt-130 pb-50 mt--70">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/backgrounds/1.jpg') }}" alt="background"></div>
    <div class="container">
        <div class="row mb-40">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="heading__layout2">
                    <h3 class="heading__title">Shape Your Future, Define Your Wellness.</h3>
                </div>
            </div><!-- /col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                <p class="heading__desc font-weight-bold">Since losing weight is a complex process, we offer all-encompassing support. Our community provides weekly video consultations from experts, daily meal suggestions, medications and exercise plans as well as our medical expertise, all of which contribute to a supportive environment. Also, you can directly buy weight loss products from our website.
                </p>
                <div class="d-flex flex-wrap align-items-center mt-40 mb-30">
                    <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
                        <span>Our Weightloss Products</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                    <!-- <a href="#" class="btn btn__secondary btn__link">
                        <i class="icon-arrow-right icon-filled"></i>
                        <span>Our Core Values</span>
                    </a> -->
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
            <!-- Feature item #1 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-heart"></i>
                            <i class="icon-heart feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Medical Advices & Check Ups</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-doctor"></i>
                            <i class="icon-doctor feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Trusted Medical Treatment </h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #3 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-ambulance"></i>
                            <i class="icon-ambulance feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Emergency Help Available 24/7</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #4 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-drugs"></i>
                            <i class="icon-drugs feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Medical Research Professionals </h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #5 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-first-aid-kit"></i>
                            <i class="icon-first-aid-kit feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Only Qualified</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #6 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-hospital"></i>
                            <i class="icon-hospital feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Cutting Edge Facility</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #7 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-expenses"></i>
                            <i class="icon-expenses feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Affordable Prices For All Patients</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
            <!-- Feature item #8 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-bandage"></i>
                            <i class="icon-bandage feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Quality Care For Every Patient</h4>
                    </div><!-- /.feature__content -->
                    <a href="#" class="btn__link">
                        <i class="icon-arrow-right icon-outlined"></i>
                    </a>
                </div><!-- /.feature-item -->
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
                <p class="font-weight-bold mb-0">Transforming Lives, One Pound at a Time: Your Personalised Weight Loss Journey Begins Here! Contact us today and take a step towards a healthier, happier you.
                    <!-- <a href="#" class="color-secondary">
                        <span>Contact Us For More Information</span> <i class="icon-arrow-right"></i>
                    </a> -->
                </p>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.Features Layout 1 -->

<!-- ======================
     Work Process 
    ========================= -->
<section class="work-process work-process-carousel  pb-0 bg-overlay bg-overlay-secondary">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/banners/1.jpg') }}" alt="background"></div>
    <div class="container">
        <div class="row heading-layout2">
            <!-- <div class="col-12">
                <h2 class="heading__subtitle color-primary">Caring For The Health Of You And Your Family.</h2>
            </div> -->
            <!-- /.col-12 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                <h3 class="heading__title color-white">Supporting Your Weight Loss Journey and Family Wellness!
                </h3>
            </div><!-- /.col-xl-5 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
                <p class="heading__desc font-weight-bold color-gray mb-40">Transform yourself through a pathway to a healthier and happier you! Our weight loss program which is designed to support the fitness goals of individuals, also encourages the overall wellness of the family. Experience the pleasure of healthy eating jointly, which results in a common lifestyle that benefits everybody. </p>
                <!-- <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">
                    <li>Fractures and dislocations</li>
                    <li>Health Assessments</li>
                    <li>Desensitisation injections</li>
                    <li>High Quality Care</li>
                </ul> -->
            </div>
            <!-- /.col-xl-6 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
            <h5 class="text-center mt-30 text-light">Here’s How My Weight Loss Centre Works!</h5> 
                <div class="carousel-container mt-50">
                    <div class="slick-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                          
                    <!-- process item #1 -->
                        <div class="process-item">
                            <span class="process__number">01</span>
                            <div class="process__icon">
                                <i class="icon-health-report"></i>
                            </div><!-- /.process__icon -->
                            <h4 class="process__title">Virtual Assessment</h4>
                            <p class="process__desc">To assess your overall health and weight loss goals, fill out our free online consultation, which has been expertly designed by our healthcare team. Based on the available options, our team will recommend a personalised plan of treatment for you. </p>
                            <!-- <a href="#" class="btn btn__secondary btn__link">
                                <span>Doctors’ Timetable</span>
                                <i class="icon-arrow-right"></i>
                            </a> -->
                        </div><!-- /.process-item -->
                        <!-- process-item #2 -->
                        <div class="process-item">
                            <span class="process__number">02</span>
                            <div class="process__icon">
                                <i class="icon-dna"></i>
                            </div><!-- /.process__icon -->
                            <h4 class="process__title">Evaluation by Our Weight Loss Professionals</h4>
                            <p class="process__desc">Our experienced weight-management experts will go over your medical history. They will decide on an effective plan for you based on your preferences and you can buy weight loss medications from the same website.</p>
                            <!-- <a href="#" class="btn btn__secondary btn__link">
                                <span>Start A Check Up</span>
                                <i class="icon-arrow-right"></i>
                            </a> -->
                        </div><!-- /.process-item -->
                        <!-- process-item #3 -->
                        <div class="process-item">
                            <span class="process__number">03</span>
                            <div class="process__icon">
                                <i class="icon-medicine"></i>
                            </div><!-- /.process__icon -->
                            <h4 class="process__title">Get an Online Weight-loss Consultation</h4>
                            <p class="process__desc">Participate in an online weight-loss consultation to stay connected with our healthcare professional team and to address any queries or concerns. The most convenient way to discuss your concerns with us. </p>
                            <!-- <a href="#" class="btn btn__secondary btn__link">
                                <span>Explore Programs</span>
                                <i class="icon-arrow-right"></i>
                            </a> -->
                        </div><!-- /.process-item -->
                        <!-- process-item #4 -->
                        <div class="process-item">
                            <span class="process__number">04</span>
                            <div class="process__icon">
                                <i class="icon-stethoscope"></i>
                            </div><!-- /.process__icon -->
                            <h4 class="process__title">Ongoing Patient Care​</h4>
                            <p class="process__desc">When your monthly treatment plan is about to expire, log into your dashboard to access the consultation. Our experts will evaluate your progress and work with you to modify or continue taking dosages so that you can reach your weight loss objectives and maintain a safe BMI range. </p>
                            <!-- <a href="#" class="btn btn__secondary btn__link">
                                <span>Meet Our Doctors</span>
                                <i class="icon-arrow-right"></i>
                            </a> -->
                        </div><!-- /.process-item -->
                        <!-- process-item #5 -->
                        
                    </div><!-- /.carousel -->
                </div>
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="cta bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <!-- <div class="col-sm-12 col-md-2 col-lg-2">
                    <img src="{{ asset('/assets/web/images/icons/alert.png') }}" class="cta__img" alt="alert">
                </div> -->
                <!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-12">
                    <h4 class="cta__title text-center">Pro Tip for Effective Weight Loss Consultation!</h4>
                    <p class="cta__desc text-center" style="font-style: italic;">Prioritise gradual, sustainable changes in diet and exercise during weight loss consultations. Regularly assess progress with your healthcare professional for personalised adjustments, ensuring steady and lasting weight loss success.</p>
                </div><!-- /.col-lg-7 -->
                <!-- <div class="col-sm-12 col-md-12 col-lg-3">
                    <a href="appointment.html" class="btn btn__secondary btn__secondary-style2 btn__rounded mr-30">
                        <span>Healthcare Programs</span>
                        <i class="icon-arrow-right"></i>
                    </a>
                </div> -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.cta -->
</section><!-- /.Work Process -->

<!-- ======================
      Team
    ========================= -->
<section class="team-layout2 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h3 class="heading__title">Meet Our Healthcare Professionals</h3>
                    <p class="heading__desc">Our healthcare professionals are dedicated experts, providing compassionate care, expertise, and personalised solutions for your weight loss. Trust their commitment!
                    </p>
                </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="slick-carousel" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    <!-- Member #1 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/1.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Muldoone obtained his undergraduate degree in Biomedical Engineering at Tulane
                                University prior to attending St George's University School of Medicine</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                    <!-- Member #2 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/2.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Dermatologists</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He also
                                address cosmetic issues, helping to revitalize the appearance of the skin</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                    <!-- Member #3 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/3.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                            <p class="member__job">Pediatrician</p>
                            <p class="member__desc">Andaloro graduated from medical school and completed 3 years residency program
                                in pediatrics. She passed rigorous exams by the American Board of Pediatrics.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                    <!-- Member #4 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/4.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Dupree Black</a></h5>
                            <p class="member__job">Urologist</p>
                            <p class="member__desc">Black diagnose and treat diseases of the urinary tract in both men and women.
                                He
                                also diagnose and treat anything involving the reproductive tract in men.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                    <!-- Member #5 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/5.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Markus skar</a></h5>
                            <p class="member__job">Laboratory</p>
                            <p class="member__desc">Skar play a very important role in your health care. People working in the
                                clinical laboratory are responsible for conducting tests that provide crucial information.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                    <!-- Member #6 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="{{ asset('/assets/web/images/team/6.jpg') }}" alt="member img">
                        </div><!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with the
                                information needed to ensure appropriate care. He also valuable resources for other physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                                    <span>Read More</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul><!-- /.social-icons -->
                            </div>
                        </div><!-- /.member-info -->
                    </div><!-- /.member -->
                </div><!-- /.carousel -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.Team -->

<!-- ========================= 
      Testimonials layout 1
      =========================  -->
<section class="testimonials-layout1 pt-130 pb-80">
    <div class="container">
        <div class="testimonials-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-5">
                    <div class="heading-layout2">
                        <h3 class="heading__title">Inspiring Stories!</h3>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-7 -->
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="slider-nav mb-60">
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/1.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title"> Emily</h4>
                            </div>
                        </div><!-- /.testimonial-meta -->
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/2.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title">Henry</h4>
                            </div>
                        </div><!-- /.testimonial-meta -->
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/3.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title">Edward </h4>
                            </div>
                        </div><!-- /.testimonial-meta -->
                    </div><!-- /.slider-nav -->
                </div><!-- /.col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="slider-with-navs">
                        <!-- Testimonial #1 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“In my journey, as a working mother, I faced weight-related challenges. The weight loss center provided tailored consultations, guiding me through manageable lifestyle changes. With dedication, I not only lost weight but also discovered newfound energy, resilience, and a positive self-image, transforming my life both inside and out.”
                            </h3>
                        </div><!-- /. testimonial-item -->
                        <!-- Testimonial #2 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“I was once sceptical about weight loss programs but found renewed hope through consultations. I not only shed pounds but also rekindled my passion for fitness. My success story exemplifies the impact of strategic guidance on holistic well-being.”
                            </h3>
                        </div><!-- /. testimonial-item -->
                        <!-- Testimonial #3 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“My weight loss journey wasn't about crash diets. Consultations focused on sustainable changes. With gradual adjustments to my diet and exercise routine, I not only lost weight but also embraced a healthier lifestyle that I could maintain. My story emphasises the long-term impact of making lasting, manageable adjustments.”
                            </h3>
                        </div><!-- /. testimonial-item -->
                    </div><!-- /.slick-carousel -->
                    <!-- <div class="testimonials__rating"> -->
                        <!-- <div class="testimonials__rating-inner d-flex align-items-center">
                            <span class="total__rate">4.9</span>
                            <div>
                                <span class="overall__rate">Zocdoc Overall Rating</span>
                                <span>, based on 7541 reviews.</span>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- /.testimonials__rating -->
                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
        </div><!-- /.testimonials-wrapper -->
    </div><!-- /.container -->
</section><!-- /.testimonials layout 1 -->

<!-- ======================
      Blog Grid
    ========================= -->
<section class="blog-grid pb-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h2 class="heading__subtitle">Resource Library</h2>
                    <h3 class="heading__title">Recent Articles</h3>
                </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
            <!-- Post Item #1 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="https://i.ibb.co/Ycd4ZJx/weightloss1.jpg" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Mental Health</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 30, 2022</span>
                            <a class="post__meta-author" href="#">Martin King</a>
                        </div>
                        <h4 class="post__title"><a href="#">Beginner's Guide to Crushing Your Weight Loss Goals</a></h4>

                        <p class="post__desc">Start your weight loss journey with realistic goals and a supportive mindset for lasting success and improved well-being.</p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #2 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="{{ asset('/assets/web/images/tsp/recent-articles/1.png') }}" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Infectious</a><a href="#">Tips</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 30, 2022</span>
                            <a class="post__meta-author" href="#">John Ezak</a>
                        </div>
                        <h4 class="post__title"><a href="#">5 Weight Loss Myths You Shouldn't Believe</a></h4>
                        <p class="post__desc">Beware of weight loss myths! Crash diets harm metabolism, cardio isn't the sole solution, not all calories are equal, and supplements aren't magic.</p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #3 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="{{ asset('/assets/web/images/tsp/recent-articles/3.png') }}" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Life Style</a><a href="#">Nutrition</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 28, 2022</span>
                            <a class="post__meta-author" href="#">Saul Wade</a>
                        </div>
                        <h4 class="post__title"><a href="#">The Importance of Sleep for Weight Loss</a></h4>

                        <p class="post__desc">Quality sleep influences hormones, metabolism, and psychology, impacting weight loss. Prioritise schedules and stress management for a healthier lifestyle.</p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog Grid -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce