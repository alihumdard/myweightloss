@extends('web.layouts.default')
@section('title', 'Home')
@section('content')

<!-- ============================
        Slider
    ============================== -->
<section class="slider slider-centerd">
    <div class="slick-carousel m-slides-0 carousel-arrows-light carousel-dots-light" data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
        <div class="slide-item align-v-h">
            <div class="bg-img"><img src="{{ asset('/assets/web/images/sliders/8.jpg') }}" alt="slide img"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                        <div class="slide__content">
                            <h2 class="slide__title color-white">Medical Supplies <br> And Equipment</h2>
                            <p class="slide__desc color-white">The health and well-being of our patients and their health care
                                team will
                                always be our priority, so we follow the best practices for cleanliness.</p>
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <a href="about-us.html" class="btn btn__white btn__rounded mr-30">
                                    <span>More About Us</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                    <div class="video__player">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <span class="video__btn-title color-white">Watch Our Video!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item align-v-h">
            <div class="bg-img"><img src="{{ asset('/assets/web/images/sliders/9.jpg') }}" alt="slide img"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                        <div class="slide__content">
                            <h2 class="slide__title color-white">Large Selections <br> Of Medical Products</h2>
                            <p class="slide__desc color-white">The health and well-being of our patients and their health care
                                team will
                                always be our priority, so we follow the best practices for cleanliness.</p>
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <a href="about-us.html" class="btn btn__white btn__rounded mr-30">
                                    <span>More About Us</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                                <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                    <div class="video__player">
                                        <i class="fa fa-play"></i>
                                    </div>
                                    <span class="video__btn-title color-white">Watch Our Video!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================
       shop 
    =========================== -->
<section class="shop-grid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h2 class="heading__subtitle">Low Priced Medical Supplies</h2>
                    <h3 class="heading__title">The Largest Selections Of Medical Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $key => $value)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                    <div class="product__img">
                        <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                            <img src="{{ asset('storage/'.$value['main_image'])}}" alt="Product img" loading="lazy">
                        </a>
                        <div class="product__action">
                            <a href="{{ route('web.bmiForm')}}" class="btn btn__primary btn__rounded">
                                <!-- <i class="icon-cart"></i> <span>Add To Cart</span> -->
                                <i class="icon-calendar"></i> <span>Contsultations</span>
                            </a>
                        </div>
                    </div>
                    <div class="product__info">
                        <h4 class="product__title">
                            <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                                {{ $value['title'] ?? ''}}
                            </a>
                        </h4>
                        <span class="product__price">${{ $value['price'] ?? ''}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('web.products') }}" class="btn btn__secondary btn__rounded">
                    <span>Explore All</span>
                    <i class="icon-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     Banner Layout 2
    =========================== -->
<section class="banner-layout2 py-0">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/backgrounds/8.jpg') }}" alt="backgrounds"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="banner-text">
                    <div class="heading-layout2 heading-light">
                        <h2 class="heading__title">Committed To Build A Positive, Safe, Patient Focused Culture.</h2>
                        <p class="heading__desc mb-40">Today the hospital is recognised as a world renowned institution, not
                            only providing outstanding care and treatment, our goal is to deliver quality care in a respectful &
                            compassionate manner. We strive to be the first and best choice for healthcare.
                        </p>
                    </div>
                    <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled mb-50">
                        <li>Fractures and dislocations</li>
                        <li>Health Assessments</li>
                        <li>Desensitisation injections</li>
                        <li>High Quality Care</li>
                        <li>Desensitisation injections</li>
                    </ul>
                    <div class="d-flex flex-wrap">
                        <a href="doctors-timetable.html" class="btn btn__white btn__rounded mr-30">
                            <span>Find A Doctor</span> <i class="icon-arrow-right"></i>
                        </a>
                        <a href="contact-us.html" class="btn btn__white btn__outlined btn__rounded">
                            Contact us
                        </a>
                    </div>
                </div><!-- /.banner-text -->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 banner-img">
                <div class="bg-img">
                    <img src="{{ asset('/assets/web/images/banners/9.jpg') }}" alt="backgrounds">
                </div>
            </div>
        </div>
    </div>
</section><!-- /.Banner Layout 2 -->

<!-- ======================
      Blog Grid
    ========================= -->
<section class="blog-grid pt-170 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h2 class="heading__subtitle">Resource Library</h2>
                    <h3 class="heading__title">Recent Articles</h3>
                </div><!-- /.heading -->
            </div>
        </div>
        <div class="row">
            <!-- Post Item #1 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="{{ asset('/assets/web/images/blog/grid/1.jpg') }}" alt="post image" loading="lazy">
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
                        <h4 class="post__title"><a href="#">6 Tips to Protect Your Mental Health When You’re Sick</a></h4>

                        <p class="post__desc">It’s normal to feel anxiety, worry and grief any time you’re diagnosed with a
                            condition that’s certainly true if you test positive for COVID-19, or are presumed to be positive...
                        </p>
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
                            <img src="{{ asset('/assets/web/images/blog/grid/2.jpg') }}" alt="post image" loading="lazy">
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
                        <h4 class="post__title"><a href="#">Unsure About Wearing a Face Mask? Here’s How and Why</a></h4>
                        <p class="post__desc">That means that you should still be following any shelter-in-place orders in your
                            community. But when you’re venturing out to the grocery store, pharmacy or hospital..
                        </p>
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
                            <img src="{{ asset('/assets/web/images/blog/grid/3.jpg') }}" alt="post image" loading="lazy">
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
                        <h4 class="post__title"><a href="#">Tips for Eating Healthy When You’re Working From Home </a></h4>

                        <p class="post__desc">It’s normal to feel anxiety, worry and grief any time you’re diagnosed with a
                            condition that’s certainly true if you test positive for COVID-19, or are presumed to be positive...
                        </p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
        </div>
    </div>
</section><!-- /.blog Grid -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce