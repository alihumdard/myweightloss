<!-- =========================
    Header
=========================== -->
<header class="header header-layout2 pb-3">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                            <li>
                                <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002) 01061245741</a>
                            </li>
                            <li>
                                <i class="icon-location"></i><a href="#">Location: , Nottingham, NG19 9QH, United Kingdom</a>
                            </li>
                            <li>
                                <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <ul class="social-icons list-unstyled mb-0 mr-30">
                                <li><a href="https://www.facebook.com/people/Online-Pharmacy4U/100083173698028/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/74292944" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="https://twitter.com/4uPharmacy" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                            <form class="header-topbar__search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid m-2">
            <a class="navbar-brand" href="{{ route('web.index') }}">
                <img src="{{ asset('/assets/web/images/logo/weightloss_logo.png') }}" class="weightloss_logo" alt="logo" style="max-height: 90px;">

                <!-- <img src="{{ asset('/assets/web/images/logo/weightloss_final_logo.png') }}" class="logo-dark" alt="logo"> -->
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav__item">
                        <a href="{{ route('web.index') }}" class="nav__item-link active">Home</a>
                        <!-- <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.index') }}" class="nav__item-link">Home Main</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('web.aboutUs') }}" class="nav__item-link">About Us</a>
                        <!-- <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.aboutUs') }}" class="nav__item-link">About Us</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('web.products') }}" class="nav__item-link">Products</a>
                        <ul class="dropdown-menu">
                            <!-- <li class="nav__item">
                                <a href="{{ route('web.products') }}" class="nav__item-link">Our Products</a>
                            </li>
                            <li class="nav__item">
                                <a href="cart.html" class="nav__item-link">Cart</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="nav__item ">
                        <a href="{{ route('web.blogs') }}" class="nav__item-link">Blog</a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('web.contactUs') }}" class="nav__item-link">Contacts Us</a>
                    </li>
                </ul>
                <!-- <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button> -->
            </div>
            <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                <!-- <div class="miniPopup-departments-trigger">
                    <span style="cursor:pointer" class="menu-lines" id="miniPopup-departments-trigger-icon"><span></span></span>
                </div> -->
                <!-- <ul id="miniPopup-departments" class="miniPopup miniPopup-departments dropdown-menu">
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Neurology Clinic</a>
                    </li>
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Cardiology Clinic</a>
                    </li>
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Pathology Clinic</a>
                    </li>
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Laboratory Clinic</a>
                    </li>
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Pediatric Clinic</a>
                    </li>
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Cardiac Clinic</a>
                    </li>
                </ul> -->
                <a href="{{ route('web.regisrationFrom')}}" class="btn btn__primary btn__rounded ml-30">
                    <i class="icon-calendar"></i>
                    <span>Let's Start Consultation</span>
                </a>
            </div>
        </div>
    </nav>
</header>
<!-- /.Header -->