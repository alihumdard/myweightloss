{{--  @dd($socialmedia);  --}}
<!-- Header Start -->
    <header>
        <!-- Topbar Start -->
        <section class="section_topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="d-flex gap-3">
                            @foreach ($socialmedia as $link)
        <a href="{{ $link['link'] }}">
            <img class="img-circle" src="{{ Storage::url($link['img_url']) }}" alt="{{ $link['type'] }}" height="50" width="50" style="border-radius: 50%" alt="Your Image Alt Text">
        </a>
    @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="d-flex gap-4 justify-content-md-end">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="site search">
                                    <button type="submit" class="btn-search">
                                        <img src="assets/web/images/icon_search.png" alt="search">
                                    </button>
                                </div>
                            </form>
                            <a href="#" class="btn btn-primary">
                                <span>sponsors login</span>
                                <img src="assets/web/images/icon_log.png" alt="icon login here" class="icon-login">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Topbar End -->
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    {{--  @dd($largelogo);  --}}
                    <img src="{{ asset($largelogo) }}" alt="logo" class="img-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item"><a class="nav-link active" href="index.html">home</a></li>
                        <li class="nav-item dropdown-link">
                            <a class="nav-link" href="#">about us</a>
                            <ul class="dropdown-content">
                                <li><a href="#">who we are</a></li>
                                <li><a href="#">team</a></li>
                                <li><a href="#">contact us</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown-link">
                            <a class="nav-link" href="#">membership</a>
                            <ul class="dropdown-content">
                                <li><a href="#">join</a></li>
                                <li><a href="#">benefits</a></li>
                                <li><a href="#">programs</a></li>
                                <li><a href="#">evaluation</a></li>
                                <li><a href="#">rules of engagement</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown-link">
                            <a class="nav-link" href="#">sectors</a>
                            <ul class="dropdown-content">
                                <li><a href="#">construction</a></li>
                                <li><a href="#">agriculture</a></li>
                                <li><a href="#">supply chain</a></li>
                                <li><a href="#">technology</a></li>
                                <li><a href="#">natural resources</a></li>
                                <li><a href="#">energy</a></li>
                                <li><a href="#">textiles</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown-link">
                            <a class="nav-link" href="#">advocacy</a>
                            <ul class="dropdown-content">
                                <li><a href="#">small businesses</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">veterans</a></li>
                                <li><a href="#">support services</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown-link">
                            <a class="nav-link" href="#">events</a>
                            <ul class="dropdown-content">
                                <li><a href="#">event calendar</a></li>
                                <li><a href="#">event request</a></li>
                                <li><a href="#">international events</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">blog</a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasExample">
                                <img src="assets/web/images/icon_menu.png" alt="menu" class="img-menu">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="ps-0">
                    <li class="offcanvas-menu">
                        <a href="#" class="link">financial</a>
                        <ul class="sub_menu">
                            <li><a href="#">grants</a></li>
                            <li><a href="#">funding</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="ps-0">
                    <li class="offcanvas-menu">
                        <a href="#" class="link">partners / sponsors</a>
                        <ul class="sub_menu">
                            <li><a href="#">become a partner</a></li>
                            <li><a href="#">become a sponsor</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="ps-0">
                    <li class="offcanvas-menu">
                        <a href="#" class="link">outreach</a>
                        <ul class="sub_menu">
                            <li><a href="#">chad</a></li>
                            <li><a href="#">ghana</a></li>
                            <li><a href="#">south africa</a></li>
                            <li><a href="#">zimbabwe</a></li>
                            <li><a href="#">cameroon</a></li>
                            <li><a href="#">drc</a></li>
                            <li><a href="#">cote d'ivoire</a></li>
                            <li><a href="#">usa</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="ps-0">
                    <li class="offcanvas-menu">
                        <a href="#" class="link">opportunities</a>
                        <ul class="sub_menu">
                            <li><a href="#">agriculture</a></li>
                            <li><a href="#">construction</a></li>
                            <li><a href="#">mining</a></li>
                            <li><a href="#">rfx</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="ps-0">
                    <li class="offcanvas-menu">
                        <a href="#" class="link">careers</a>
                        <ul class="sub_menu">
                            <li><a href="#">job openings</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Navbar End -->
    </header>