<!-- =========================
    Header
=========================== -->
<header class="header header-layout2 pb-3">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">

                        <ul class="list-items list-items-layout2 list-items-light list-unstyled d-flex justify-content-between mb-0">
                            <li class="mr-3">Dispensed by Regulated UK Pharmacists</li>
                            <li class="mr-3">100% Discreet Packaging</li>
                            <li class="mr-3">Free Delivery on orders over £40+</li>
                        </ul>



                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="social-icons list-unstyled d-flex align-items-center px-2">
                                <li><a href="https://www.facebook.com/profile.php?id=61556213788091" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/official.weightloss_/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <!-- <li><a href="https://twitter.com/4uPharmacy" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
                                <li class="mx-5">
                                    <a href="{{ route('web.cart') }}" class=" fas fa-shopping-cart {{(request()->routeIs(['web.cart'])) ? 'active ' : ''}}"></a>
                                </li>
                            </ul>
                            <!-- <form class="header-topbar__search mb-2">
                            
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                            </form> -->
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
                        <a href="{{ route('web.index') }}" class="nav__item-link {{(request()->routeIs(['web.index'])) ? 'active ' : ''}}">Home</a>
                        <!-- <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.index') }}" class="nav__item-link">Home Main</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('web.aboutUs') }}" class="nav__item-link {{(request()->routeIs(['web.aboutUs'])) ? 'active ' : ''}}">About Us</a>
                        <!-- <ul class="dropdown-menu">
                            <li class="nav__item">
                                <a href="{{ route('web.aboutUs') }}" class="nav__item-link">About Us</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('web.products') }}" class="nav__item-link {{(request()->routeIs(['web.products'])) ? 'active ' : ''}}">Products</a>
                        <!-- <ul class="dropdown-menu"> -->
                        <!-- <li class="nav__item">
                                <a href="{{ route('web.products') }}" class="nav__item-link">Our Products</a>
                            </li>
                            <li class="nav__item">
                                <a href="cart.html" class="nav__item-link">Cart</a>
                            </li> -->
                        <!-- </ul> -->
                    </li>
                    <!-- <li class="nav__item ">
                        <a href="{{ route('web.blogs') }}" class="nav__item-link {{(request()->routeIs(['web.blogs'])) ? 'active ' : ''}}">Blog</a>
                    </li> -->


                    <li class="nav__item">
                        <a href="{{ route('admin.index') }}" class="nav__item-link {{(request()->routeIs(['admin.index'])) ? 'active ' : ''}}"> {{(auth()->user()) ? 'Account':'Login' }} </a>
                    </li>
                    <!-- <li class="nav__item">
                        <a href="{{ route('web.cart') }}" class="nav__item-link {{(request()->routeIs(['web.cart'])) ? 'active ' : ''}}">Cart </a>
                    </li> -->
                    <li class="nav__item">
                        <a href="{{ route('web.blogs') }}" class="nav__item-link {{(request()->routeIs(['web.blogs'])) ? 'active ' : ''}}">Blogs</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('web.contact') }}" class="nav__item-link {{(request()->routeIs(['web.contact'])) ? 'active ' : ''}}">Contact</a>
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
                <a href="{{ route('register')}}" class="btn btn__primary btn__rounded ml-30">
                    <i class="icon-calendar"></i>
                    <span>Start Free Consultation</span>
                </a>
            </div>
        </div>
    </nav>
</header>
<!-- /.Header -->