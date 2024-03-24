@extends('web.layouts.default')
@section('title', 'Products')
@section('content')
<!-- ========================
       page title 
    =========================== -->


<style>
    .variants {
        color: #212529 !important;
    }

    .variants:hover {
        color: white !important;
    }
</style>


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
                <!-- <div class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
                    <h3 class="alert__title my-1">“{{ $product['title'] ?? ''}}” has been added to your cart.</h3>
                    <a href="cart.html" class="btn btn__secondary btn__rounded">View Cart</a>
                </div> -->
                <div class="row product-item-single">
                    <div class="col-sm-6">
                        <div class="product__img">
                            <img id="product_img" src="{{ asset('storage/'.$product['main_image'])}}" class="zoomin" alt="product" loading="lazy">
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
                        <span id="product_price" class="product__price mb-20">£ {{ $product['price'] ?? ''}}</span>
                        <div class="product__desc">
                            <p>
                                {!! $product['short_desc'] ?? ''!!}
                            </p>
                        </div><!-- /.product-desc -->
                        <div class="product__quantity d-flex ">
                            <div class="quantity__input-wrap mr-20">
                                <i class="decrease-qty fa fa-minus"></i>
                                <input id="product_quantaty" value="1" type="number" max="5" min="1" class="qty-input">
                                <i class="increase-qty fa fa-plus"></i>
                            </div>
                            <form action="{{ route('web.productQuestion') }}" id="from_product" method="POST">
                                @csrf
                                <input type="hidden" id="product_id" name="product_id" value="{{$product['id']}}" required>
                                <input type="hidden" id="variant_id" name="variant_id" value="">
                                <input type="hidden" id="quantity" name="quantity" value="1">
                            </form>
                            <button  form="from_product" type="submit" class="btn btn__primary btn__rounded ml-30">
                                <i class="icon-calendar"></i>
                                <span>Consultation</span>
                            </button>
                        </div>
                        <div class="mb-30">
                            <label class="text-danger d-none" id="error_quantity" for="product_quantaty">Not available in stock</label>
                        </div>

                        <div class="product__meta-details">
                            <ul class="list-unstyled mb-30">
                                <li>
                                    <span>Category :</span>
                                    <span>{{ $product['category']['name'] ?? ''}}</span>
                                </li>


                                <!-- <li><span>Tags :</span> <span>Beauty, Supplements</span></li> -->
                                <li>
                                    <div style="padding: 20px;" class="widget widget-tags">
                                        <h5 class="widget__title" style="margin-bottom: 10px;"><span id="product_title">{{ $product['variants'][0]['title'] ?? ''}} :</span></h5>
                                        <div class="widget-content">
                                            <ul class="list-unstyled">
                                                @foreach($product['variants'] as $key => $vrr)
                                                <li style="cursor: pointer;"><a class="variants" data-variant_id="{{$vrr['id'] ?? ''}}" data-variant_data="{{ json_encode($vrr) }}">{{ $vrr['value'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.product__meta-details -->


                    </div>
                </div>
                <div class="product__details mt-100">
                    <nav class="nav nav-tabs">
                        <a class="nav__link active" data-toggle="tab" href="#Description">Detail Description</a>
                        <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
                    </nav>
                    <div class="tab-content mb-50" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="Description">
                            <p>
                                {!! $product['desc'] ?? ''!!}
                            </p>
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
                @if($rel_products ?? [])
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
                                    <a href="{{ route('web.product', ['id' => $value['id']]) }}" class="btn btn__primary btn__rounded">
                                        <!-- <i class="icon-cart"></i> <span>Add To Cart</span> -->
                                        <i class="icon-calendar"></i> <span>Detail view</span>
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
                @endif
            </div>
        </div>
    </div>
</section>


@stop

@pushOnce('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.variants', function() {
            let variantId = $(this).data('variant_id');
            $('#variant_id').val(variantId);
            let variantData = $(this).data('variant_data');
            let image_src = "{{ asset('storage/') }}";
            $('#product_img').attr('src', image_src + '/' + variantData.image);
            $('#product_quantaty').attr('max', variantData.inventory);
            $('#product_title').text(variantData.title + ' :')
            $('#product_price').text('£ ' + variantData.price)
        });

        $('#product_quantaty').on('input', function() {
            handleQuantityInput();
        });

        $('.increase-qty').on('click', function() {
            if (!parseInt($('#product_quantaty').val())) {
                $('#product_quantaty').val(1)
            }
            handleQuantityInput();
        });

        $('.decrease-qty').on('click', function() {
            if (!parseInt($('#product_quantaty').val())) {
                $('#product_quantaty').val(1)
            }
            handleQuantityInput();
        });
    });


    function handleQuantityInput() {
        let qyt = parseInt($('#product_quantaty').val());
        if(!qyt){
            $('#error_quantity').text('enter quantity').removeClass('d-none');
            $('#quantity').val(1);
            return false;
        }
        $('#error_quantity').addClass('d-none');
        var maxValue = 5;
        var minValue = 1;

        if (qyt > maxValue) {
            $('#product_quantaty').val(maxValue);
        } else if (qyt < minValue) {
            $('#product_quantaty').val(minValue);
            $('#error_quantity').removeClass('d-none').text('min product should be 1');
        }
        if (parseInt($('#product_quantaty').val())) {
            $('#quantity').val(parseInt($('#product_quantaty').val()));
        } 
    }
</script>


@endPushOnce