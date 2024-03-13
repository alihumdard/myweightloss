@extends('web.layouts.default')
@section('title', 'cart')
@section('content')
<style>
  .form-control{
    height: 30px !important;
    border-radius: 0;
  }
</style>
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

      <div class="row">

      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Shipping address</h4>
        <h6>{{ $user['address'] }}</h6>
        <form class="needs-validation" action="{{ route('payment') }}" method="post">
          @csrf
          <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="use_different_address">
                <label class="form-check-label" for="use_different_address">Use a different shipping address</label>
            </div>
          </div>
          <div class="shipping-address-div" style="display: none">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
  
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
  
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
  
            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>
  
            <div class="mb-3">
              <label for="mobile">Mobile</label>
              <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number">
            </div>
          </div>

          <hr class="mb-4">

          <div class="mb-3">
            <h4>Shipping Method</h4>
            {{-- <div class="form-check">
              <div class="custom-control">
                <input class="form-check-input" type="radio" name="shipping_method" id="free_delivery" value="free" checked data-ship="0">
                <label class="form-check-label" for="free_delivery">Standard Delivery</label>
                <span class="float-right">FREE</span>
              </div>
              <div class="ml-4 mb-2 small">(3-7 business days)</div>
            </div> --}}
            <div class="form-check">
              <div class="custom-control">
                <input class="form-check-input" type="radio" name="shipping_method" id="express_delivery" value="express" data-ship="3.95">
                <label class="form-check-label" for="express_delivery">Royal Mail Tracked 24</label>
                <span class="float-right">£3.95</span>
              </div>
              <div class="ml-4 mb-2 small">(1-2 working days)</div>
            </div>
            <div class="form-check">
              <div class="custom-control">
                <input class="form-check-input" type="radio" name="shipping_method" id="fast_delivery" value="fast" data-ship="4.95">
                <label class="form-check-label" for="fast_delivery">Royal Mail Tracked 48</label>
                <span class="float-right">£4.95</span>
              </div>
              <div class="ml-4 mb-2 small">(3-5 working days)</div>
            </div>
          </div>

          <hr class="mb-4">
  
          <h4 class="mb-3">Payment</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" name="cardName" class="form-control" id="cc-name" placeholder="" required="">
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Card number</label>
              <input type="text" name="cardNumber" class="form-control" id="cc-number" required>
              <div class="invalid-feedback">
                Card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" id="cardExp" name="cardExp" placeholder="MM/YY" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" name="cardCvv" class="form-control" id="cc-cvv" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <input type="hidden" name="total_ammount" class="total-hidden" value="{{ $total ?? 0}}">
          <input type="hidden" name="product_desc" value="{{ $value['product']['title'] ?? ''}}">
          <button  type="submit" class="btn btn__primary checkout-btn">Proceed To Checkout</button>
        </form>
      </div>
      
      {{-- <div class="col-sm-12 col-md-6 col-lg-4">
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
      </div><!-- /.col-lg-6 --> --}}
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.shopping-cart -->
@stop

@pushOnce('scripts')
<script>
  $(document).ready(function() {
    $('input[name="shipping_method"]').change(function() {
      var shippingCost = $('input[name="shipping_method"]:checked').data('ship');
      var price = (parseInt($('.cart-product__price').text()) * parseInt($('.qty-input').val())) + shippingCost;
      $('.cart-product__total').text(price);
      $('.checkout-btn').text('Proceed To Checkout  ($' + price + ')');
      $('.total-hidden').val(price);
    });

    $('#use_different_address').change(function() {
            if ($(this).is(":checked")) {
                $('.shipping-address-div').show();
            } else {
                $('.shipping-address-div').hide();
            }
        });
  });
</script>
@endPushOnce