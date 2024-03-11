@extends('web.layouts.default')
@section('title', 'cart')
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
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.page-title -->

<!-- =========================
				Shopping Cart
		=========================== -->
<section class="shopping-cart pt-0 pb-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="cart-table table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>

              @foreach($cart as $key => $value)
              <tr class="cart-product">
                <td class="d-flex align-items-center">
                  <i class="fas fa-times cart-product__remove"></i>
                  <div class="cart-product__img">
                    <img src="{{ asset('storage/'.$value['product']['main_image'])}}" alt="product" />
                  </div>
                  <h5 class="cart-product__title">{{ $value['product']['title'] ?? ''}}/h5>
                </td>
                <td class="cart-product__price">{{ $value['product']['price'] ?? ''}}</td>
                <td class="cart-product__quantity">
                  <div class="quantity__input-wrap">
                    <i class="fa fa-minus decrease-qty"></i>
                    <input type="number" value="{{ $value['quantity'] ?? ''}}" class="qty-input">
                    <i class="fa fa-plus increase-qty"></i>
                  </div>
                </td>
                @php
                $total += $value['product']['price'];
                @endphp
                <td class="cart-product__total">{{ $total ?? ''}}</td>
              </tr>
              @endforeach
              <tr class="cart-product__action">
                <td colspan="4">
                  <div class="cart-product__action-content d-flex align-items-center justify-content-between">
                    <form class="d-flex flex-wrap">
                      <input type="text" class="form-control mb-10 mr-10" placeholder="Coupon Code">
                      <button type="submit" class="btn btn__secondary mb-10">Apply
                        Coupon</button>
                    </form>
                    <div>
                      <a class="btn btn__secondary mr-10" href="#">update cart</a>
                      <!-- <a class="btn btn__secondary" href="#">Checkout</a> -->
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.cart-table -->
      </div><!-- /.col-lg-12 -->
      
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="cart__total-amount">
          <h6>Cart Totals</h6>
          <ul class="list-unstyled mb-30">
            <li><span>Cart Total :</span><span>£ {{ $total ?? ''}}</span></li>
            <!-- <li><span>Order Total :</span><span>$ 140.00</span></li> -->
          </ul>
          <form action="{{ route('payment') }}" method="post">
            @csrf
            <input type="hidden" name="total_ammount" value="{{ $total ?? 0}}">
            <input type="hidden" name="product_desc" value="{{ $value['product']['title'] ?? ''}}">
            <button  type="submit" class="btn btn__primary">Proceed To Checkout</button>
          </form>
        </div><!-- /.cart__total-amount -->
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.shopping-cart -->
@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce