<!-- =========================
    Header
=========================== -->
<header class="header header-layout2">
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
                                <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                            </li>
                            <li>
                                <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                            </li>
                        </ul><!-- /.contact__list -->
                        <div class="d-flex">
                            <ul class="social-icons list-unstyled mb-0 mr-30">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            </ul><!-- /.social-icons -->
                            <form class="header-topbar__search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('/assets/web/images/logo/logo-light.png') }}" class="logo-light" alt="logo">
                <img src="{{ asset('/assets/web/images/logo/logo-dark.png') }}" class="logo-dark" alt="logo">
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">Home</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.index') }}" class="nav__item-link">Home Main</a>
                            </li><!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">About Us</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.aboutUs') }}" class="nav__item-link">About Us</a>
                            </li><!-- /.nav-item -->

                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->

                    <li class="nav__item has-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Blog</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.blogs') }}" class="nav__item-link">Blog Grid</a>
                            </li><!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="{{ route('web.contactUs') }}" class="nav__item-link">Contacts</a>
                    </li><!-- /.nav-item -->
                </ul><!-- /.navbar-nav -->
                <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
            </div><!-- /.navbar-collapse -->
            <div class="d-none d-xl-flex align-items-center position-relative ml-30">
                <div class="miniPopup-departments-trigger">
                    <span  style="cursor:pointer" class="menu-lines" id="miniPopup-departments-trigger-icon"><span></span></span>
                </div>
                <ul id="miniPopup-departments" class="miniPopup miniPopup-departments dropdown-menu">
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Neurology Clinic</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Cardiology Clinic</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Pathology Clinic</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Laboratory Clinic</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Pediatric Clinic</a>
                    </li><!-- /.nav-item -->
                    <li class="nav__item">
                        <a href="department-single.html" class="nav__item-link">Cardiac Clinic</a>
                    </li><!-- /.nav-item -->
                </ul> <!-- /.miniPopup-departments -->
                <a href="appointment.html" class="btn btn__primary btn__rounded ml-30">
                    <i class="icon-calendar"></i>
                    <span>Contsultations</span>
                </a>
            </div>
        </div><!-- /.container -->
    </nav><!-- /.navabr -->
</header>
<!-- /.Header -->