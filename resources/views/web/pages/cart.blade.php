@extends('web.layouts.default')
@section('title', 'cart')
@section('content')
<style>
  .form-control {
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

              <tr class="cart-product">
                <td class="d-flex align-items-center">
                  <!-- <i class="fas fa-times cart-product__remove"></i> -->
                  <div class="cart-product__img">
                    @if($cart['img'] ?? '')
                    <img src="{{ asset('storage/'.$cart['img'])}}" alt="product img" />
                    @endif
                  </div>
                  <h5 class="cart-product__title">{{ $cart['title'] ?? ''}}
                </td>
                <td class="cart-product__price">£ <span class="product-price">{{ $cart['price'] ?? 0}} </span> </td>
                <td class="cart-product__quantity d-block">
                  <div class="quantity__input-wrap">
                    <i class="fa fa-minus decrease-qty"></i>
                    <input type="number" id="product_quantaty" max="5" min="1" value="{{ $cart['quantity'] ?? ''}}" class="qty-input">
                    <i class="fa fa-plus increase-qty"></i>
                  </div>
                  <label class="text-danger d-none " id="error_quantity" for="product_quantaty">Not available in stock</label>
                </td>
                <td class="cart-product__total">{{ $cart['total'] ?? 0}}</td>
              </tr>

              <!-- <tr class="cart-product__action">
                <td colspan="4">
                  <div class="cart-product__action-content d-flex align-items-center justify-content-between">
                    <form class="d-flex flex-wrap">
                      <input type="text" class="form-control mb-10 mr-10" placeholder="Coupon Code">
                      <button type="submit" class="btn btn__secondary mb-10">Apply
                        Coupon</button>
                    </form>
                    <div>
                      <a class="btn btn__secondary mr-10" href="#">update cart</a>
                      <a class="btn btn__secondary" href="#">Checkout</a>
                    </div>
                  </div>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div><!-- /.cart-table -->
      </div><!-- /.col-lg-12 -->

      <div class="col-md-8 order-md-1">
        <form class="needs-validation" action="{{ route('payment') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$cart['product_id']}}">
          <input type="hidden" id="quantity" name="quantity" value="{{$cart['quantity']}}">
          <input type="hidden" name="variant_id" value="{{$cart['variant_id'] ?? ''}}">
          <input type="hidden" class="total-hidden" name="total" value="{{ $cart['total'] ?? 0}}">
          <input type="hidden" class="shiping_cost" name="cost" value="4.95">
          <input type="hidden" name="title" value="{{ $cart['title'] }}">
          <h4 class="mb-3">Shipping address</h4>
          <div class="form-group mb-3">
            <label class="form-label mb-1" for="use_different_address">Current shipping address</label>
            <input class="form-control" id="old_address" disabled type="text" value="{{$user['address'] }}">
          </div>
          <div class="form-group mb-3">
            <label for="note" class="form-label mb-1" for="use_different_address">Special Note for Order (Optional)</label>
            <textarea class="form-control" id="note" name="note"> </textarea>
          </div>
          <div class="form-group mt-1">
            <div class="form-check ">
              <input class="form-check-input" type="checkbox" name="old_address" value="no" id="use_different_address">
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
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="phone">Phone</label>
                <input id="phone" type="number" name="phone" max="99999999999" class="form-control" placeholder="" required>
              </div>
              <div class="mb-3 col-md-6">
                <label for="mobile">City</label>
                <input type="text" name="city" class="form-control" id="city" placeholder="" required>
              </div>
            </div>

            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Main St ...." required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="mobile">Postal Code</label>
                <input type="text" name="zip_code" class="form-control" id="city" placeholder="" required>
              </div>
            </div>


            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite ....">
            </div>
          </div>
          <hr class="mb-4">
          <div class="mb-3">
            <h4>Shipping Method</h4>
            <div class="form-check">
              <div class="custom-control">
                <input class="form-check-input" type="radio" name="shipping_method" id="express_delivery" value="express" checked data-ship="4.95">
                <label class="form-check-label" for="express_delivery">Royal Mail Tracked 24</label>
                <span class="float-right">£4.95</span>
              </div>
              <div class="ml-4 mb-2 small">(1-2 working days)</div>
            </div>
            <div class="form-check">
              <div class="custom-control">
                <input class="form-check-input" type="radio" name="shipping_method" id="fast_delivery" value="fast" data-ship="3.95">
                <label class="form-check-label" for="fast_delivery">Royal Mail Tracked 48</label>
                <span class="float-right">£3.95</span>
              </div>
              <div class="ml-4 mb-2 small">(3-5 working days)</div>
            </div>
          </div>
          <hr class="mb-4">
          <button type="submit" class="btn btn__primary checkout-btn">Proceed To Checkout</button>
        </form>
      </div>
    </div>
  </div>
</section>
@stop

@pushOnce('scripts')
<script>
  $(document).ready(function() {
    let shippingCost = $('input[name="shipping_method"]:checked').data('ship');
    let price = (parseInt($('.product-price').text()) * parseInt($('.qty-input').val())) + shippingCost;
    $('.cart-product__total').text('£ ' + price);
    $('.checkout-btn').text('Proceed To Checkout  (£ ' + price + ')');
    $('.total-hidden').val(price);
    $('.shiping_cost').val(shippingCost);

    $('input[name="shipping_method"]').change(function() {
      let shippingCost = $('input[name="shipping_method"]:checked').data('ship');
      let price = (parseInt($('.product-price').text()) * parseInt($('.qty-input').val())) + shippingCost;
      $('.cart-product__total').text('£ ' + price);
      $('.checkout-btn').text('Proceed To Checkout  (£ ' + price + ')');
      $('.total-hidden').val(price);
      $('.shiping_cost').val(shippingCost);

    });

    $('#use_different_address').change(function() {
      if ($(this).is(":checked")) {
        $('.shipping-address-div').show();
        $('#firstName').prop('required', true);
        $('#lastName').prop('required', true);
        $('#address').prop('required', true);
      } else {
        $('.shipping-address-div').hide();
        $('#firstName').prop('required', false);
        $('#lastName').prop('required', false);
        $('#address').prop('required', false);
      }
    });

    $('.onlyDigitsInput').on('keypress', function(event) {
      if (event.which < 48 || event.which > 57) {
        event.preventDefault();
      }
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
    if (!qyt) {
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
      let quatnty = parseInt($('#product_quantaty').val());
      let shippingCost = $('input[name="shipping_method"]:checked').data('ship');
      let price = parseInt($('.product-price').text());
      let total = (price * quatnty) + shippingCost;
      $('.cart-product__total').text('£ ' + total);
      $('.total-hidden').val(total);
      $('.shiping_cost').val(shippingCost);
      $('.checkout-btn').text('Proceed To Checkout  (£ ' + total + ')');
      $('#quantity').val(parseInt($('#product_quantaty').val()));
    }
  }
</script>
@endPushOnce