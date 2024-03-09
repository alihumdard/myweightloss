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

      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label for="country" class="control-label form-label">Country/Region</label>
                <select id="country" name="countryCode" class="form-select" required>
                    <option value="GB">United Kingdom</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">First name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="First name" aria-label="First name" value="{{ $user->name ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last name (optional)</label>
                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name" required aria-label="Last name">
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Street Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="street address" value="{{ $user->address ?? '' }}" required aria-label="Address">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="address2" class="form-label">Apartment, suite, etc. (optional)</label>
                <input type="text" id="address2" name="address2" class="form-control" placeholder="Apartment, suite, etc. (optional)" aria-label="Apartment, suite, etc. (optional)">
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" value="{{ $user->city ?? '' }}" id="city" name="city" class="form-control" placeholder="City" required aria-label="city">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="zip_code" class="form-label">Postcode</label>
                <input type="text" value="{{ $user->zip_code ?? '' }}" id="zip_code" name="zip_code" class="form-control" placeholder="Postcode" required aria-label="Postcode">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone ?? '' }}" required aria-label="Phone">
            </div>
        </div>
    </div>
    

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