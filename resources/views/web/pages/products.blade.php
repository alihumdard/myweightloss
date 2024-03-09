@extends('web.layouts.default')
@section('title', 'Products')
@section('content')
<!-- ========================
       page title 
    =========================== -->
<section class="page-title page-title-layout5 text-center">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/backgrounds/6.jpg') }}" alt="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="pagetitle__heading">Our Products</h1>
                <nav>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">shop</li>
                    </ol>
                </nav>
            </div><!-- /.col-xl-6 -->
        </div>
    </div><!-- /.container -->
</section><!-- /.page-title -->

<!-- ========================
       shop 
    =========================== -->
<section class="shop-grid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9">
                <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
                    <span>Showing 1:9 of 45 product</span>
                    <select>
                        <option selected="" value="0">Sort by latest</option>
                        <option value="1">Sort by Popular</option>
                        <option value="2">Sort by highest Price </option>
                        <option value="3">Sort by lowest Price </option>
                    </select>
                </div>

                <div class="row">
                    @foreach($products as $key => $value)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="product-item">
                            <div class="product__img">
                                <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                                    <img src="{{ asset('storage/'.$value['main_image'])}}" alt=" no image" loading="lazy">
                                </a>
                                <div class="product__action">
                                    <a href="{{ route('web.product', ['id' => $value['id']]) }}" class="btn btn__primary btn__rounded">
                                        <!-- <i class="icon-cart"></i> <span>Add To Cart</span> -->
                                        <i class="icon-calendar"></i> <span> {{ ($user && $user->consult_status == 'done' && $user->profile_status == 'done') ? ' Select Treatment' : ' Detail view' }}</span>
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

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <nav class="pagination-area">
                            <ul class="pagination justify-content-center">
                                <li><a class="current" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <aside class="sidebar-layout2">
                    <div class="widget widget-search">
                        <h5 class="widget__title">Search</h5>
                        <div class="widget__content">
                            <form class="widget__form-search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="btn" type="submit"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </div><!-- /.widget-search -->
                    <div class="widget widget-poducts">
                        <h5 class="widget__title">Best Sellers</h5>
                        <div class="widget__content">
                            <!-- product item #1 -->
                            <div class="widget-product-item d-flex align-items-center">
                                <div class="widget-product__img">
                                    <a href="#"><img src="{{ asset('/assets/web/images/products/11.jpg') }}" alt="Product" loading="lazy"></a>
                                </div>
                                <div class="widget-product__content">
                                    <h5 class="widget-product__title"><a href="#">Calming Herps</a></h5>
                                    <span class="widget-product__price">£ 38.00</span>
                                </div>
                            </div>
                            <!-- product item #2 -->
                            <div class="widget-product-item d-flex align-items-center">
                                <div class="widget-product__img">
                                    <a href="#"><img src="{{ asset('/assets/web/images/products/10.jpg') }}" alt="Product" loading="lazy"></a>
                                </div>
                                <div class="widget-product__content">
                                    <h5 class="widget-product__title"><a href="#">Goji Powder</a></h5>
                                    <span class="widget-product__price">£ 33.00</span>
                                </div>
                            </div>
                            <!-- product item #3 -->
                            <div class="widget-product-item d-flex align-items-center">
                                <div class="widget-product__img">
                                    <a href="#"><img src="{{ asset('/assets/web/images/products/12.jpg') }}" alt="Product" loading="lazy"></a>
                                </div>
                                <div class="widget-product__content">
                                    <h5 class="widget-product__title"><a href="#">Biotin Complex</a></h5>
                                    <span class="widget-product__price">£ 18.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-categories">
                        <h5 class="widget__title">Categories</h5>
                        <div class="widget-content">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $key => $category)
                                <li>
                                    <a href="#">
                                        <span class="cat-count">{{ $category['products_count']  ?? 0}} </span>
                                        <span>{{ $category['name'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-categories -->
                    <!-- <div class="widget widget-filter">
                        <h5 class="widget__title">Pricing Filter</h5>
                        <div class="widget__content">
                            <div id="rangeSlider"></div>
                            <div class="d-flex justify-content-between align-items-center">
                                its temporary comment 
                                <div class="price-output d-flex align-items-center">
                                    <label for="rangeSliderResult">Price: </label>
                                    <input type="text" id="rangeSliderResult" readonly>
                                </div>
                                <button class="btn__filter">Filter</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- /.widget-filter -->
                    <!-- <div class="widget widget-tags">
                        <h5 class="widget__title">Tags</h5>
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                <li><a href="#">Responsive</a></li>
                                <li><a href="#">Fresh</a></li>
                                <li><a href="#">Modern</a></li>
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Business</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- /.widget-Tags -->
                </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-3 -->
        </div>
    </div><!-- /.container -->
</section><!-- /.shop -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce