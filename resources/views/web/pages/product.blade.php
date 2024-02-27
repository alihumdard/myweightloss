@extends('web.layouts.default')
@section('title', 'Products')
@section('content')
<!-- ========================
       page title 
    =========================== -->
<section class="page-title pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div><!-- /.col-lg-12 -->
        </div>
    </div>
</section><!-- /.page-title -->

<!-- ========================
       shop single
    =========================== -->
<section class="shop pb-40 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
                    <h3 class="alert__title my-1">“{{ $product['title'] ?? ''}}” has been added to your cart.</h3>
                    <a href="cart.html" class="btn btn__secondary btn__rounded">View Cart</a>
                </div>
                <div class="row product-item-single">
                    <div class="col-sm-6">
                        <div class="product__img">
                            <img src="{{ asset('storage/'.$product['main_image'])}}" class="zoomin" alt="product" loading="lazy">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h1 class="product__title">{{ $product['title'] ?? ''}}</h1>
                        <div class="product__meta-review mb-20">
                            <span class="product__rating">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star"></i>
                            </span>
                            <span>4 Review(s)</span>
                            <a href="#">Add Review</a>
                        </div><!-- /.product-meta-review -->
                        <span class="product__price mb-20">£ {{ $product['price'] ?? ''}}</span>
                        <div class="product__desc">
                            <p>
                            {!! $product['desc'] ?? ''!!}
                            </p>
                        </div><!-- /.product-desc -->
                        <div class="product__quantity d-flex mb-30">
                            <div class="quantity__input-wrap mr-20">
                                <i class="decrease-qty fa fa-minus"></i>
                                <input type="number" value="1" class="qty-input">
                                <i class="increase-qty fa fa-plus"></i>
                            </div>
                            <!-- <a class="btn btn__secondary btn__rounded" href="#">add to cart</a> -->
                            <a href="{{ route('web.bmiForm')}}" class="btn btn__primary btn__rounded ml-30">
                                <i class="icon-calendar"></i>
                                <span>Contsultations</span>
                            </a>
                        </div>
                        <div class="product__meta-details">
                            <ul class="list-unstyled mb-30">
                                <li>
                                    <div class="nice-select" tabindex="0"><span class="current">Sort by latest</span>
                                        <ul class="list">
                                            <li data-value="0" class="option selected focus">Select Value</li>
                                             @foreach($product['variants'] as $vrr)
                                             <li data-value="{{ $vrr['value'] }}" class="option selected focus">{{$vrr['value'] }}</li>
                                             @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span>SKU :</span>
                                    <span>#{{ $product['cnn'] ?? ''}}</span>
                                </li>
                                <li>
                                    <span>Category :</span>
                                    <span>{{ $product['category']['name'] ?? ''}}</span>
                                </li>
                                <li><span>Tags :</span> <span>Beauty, Supplements</span></li>
                            </ul>
                        </div><!-- /.product__meta-details -->
                        <ul class="social-icons list-unstyled mb-0">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul><!-- /.social-icons -->
                    </div>
                </div>
                <div class="product__details mt-100">
                    <nav class="nav nav-tabs">
                        <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                        <a class="nav__link" data-toggle="tab" href="#Details">Details</a>
                        <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
                    </nav>
                    <div class="tab-content mb-50" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="Description">
                            <p>It doesn’t contain as much as coffee, but enough to produce a response without causing the jittery
                                effects associated with taking in too much caffeine. Caffeine affects the brain by blocking an
                                inhibitory neurotransmitter called adenosine. This way, it increases the firing of neurons and the
                                concentration of neurotransmitters like dopamine and norepinephrine (4Trusted Source, 5). Research
                                has consistently shown that caffeine can improve various aspects of brain function, including mood,
                                vigilance, reaction time, and memory (6).</p>
                        </div>
                        <div class="tab-pane fade" id="Details">
                            <p>Yorks is not just about graphic design; it's more than that. We offer integral communication
                                services, and we're responsible for our process and results. We thank each of our clients and their
                                portfolios; thanks to them we have grown and built what we are today! After all</p>
                            <p>as described in Web
                                Design Trends 2015 & 2016, vision dominates a lot of our subconscious interpretation of the world
                                around us. On top of that, pleasing images create a better user experience.
                                At League Agency, we shows only the best websites and portfolios built completely with passion,
                                simplicity & creativity !</p>
                        </div>
                        <div class="tab-pane fade" id="Reviews">
                            <form class="reviews__form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Review"></textarea>
                                </div>
                                <button type="submit" class="btn btn__primary btn__rounded">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <h6 class="related__products-title text-center-xs mb-25">Related Products</h6>
                <div class="row">
                    @foreach($rel_products as $key => $value)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="product-item">
                            <div class="product__img">
                                <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                                    <img src="{{ asset('storage/'.$value['main_image'])}}" alt=" no image" loading="lazy">
                                </a>
                                <div class="product__action">
                                    <a href="BMI-Calculator/dashboard.html" class="btn btn__primary btn__rounded">
                                        <i class="icon-cart"></i> <span>Add To Cart</span>
                                    </a>
                                </div>
                            </div>
                            <div class="product__info">
                                <h4 class="product__title">
                                    <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                                        {{ $value['title'] ?? ''}}
                                    </a>
                                </h4>
                                <span class="product__price">£{{ $value['price'] ?? ''}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce