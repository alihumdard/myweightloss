@extends('web.layouts.default')
@section('title', 'Home')
@section('content')
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
                        <img src="{{ asset('storage/'.$value['main_image'])}}" alt="Product img" loading="lazy">
                        <div class="product__action">
                            <a href="#" class="btn btn__primary btn__rounded">
                                <i class="icon-cart"></i> <span>Add To Cart</span>
                            </a>
                        </div>
                    </div>
                    <div class="product__info">
                        <h4 class="product__title"><a href="#">{{ $value['title'] ?? ''}}</a></h4>
                        <span class="product__price">${{ $value['price'] ?? ''}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="shop.html" class="btn btn__secondary btn__rounded">
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
    </div><!-- /.container -->
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
    </div><!-- /.container -->
</section><!-- /.blog Grid -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce