@extends('layouts.fronted')

@section('fronted')
    <div class="content">
        <section class="breadcrumb-option">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Check Out</h4>
                            <div class="breadcrumb__links">
                                <a href="./index.html">Home</a>
                                <a href="./shop.html">Shop</a>
                                <span>Check Out</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad-70">
            <div class="container">
                <div class="checkout__form">

                    <form action="{{ route('shipaddress') }}" class="checkoutForm mt-5" id="submitform" method="post">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZOR_KEY') }}"
                                            data-amount="100"
                                            data-buttontext="Pay 1 INR"
                                            data-name="Demo Payment Page"
                                            data-description="CodeHunger"
                                            data-image="{{ asset('/image/nice.png') }}"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#9FE2BF">
                                    </script>
                    <div class="row ">
                        <div class="col-lg-8 col-md-6">                            
                                <h6 class="checkout__title">Billing Details</h6>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Full Name<span>*</span></p>
                                            <input type="text" class="form-control" name="fullname"
                                                value="{{ old('fullname',isset($user_address->name) ? $user_address->name : '') }}">
                                        </div>
                                        @if ($errors->has('fullname'))
                                            <p class="error">{{ $errors->first('fullname') }}</p>
                                        @endif
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Country<span>*</span></p>
                                    <select class="form-select custome-form-select" name="country" style="display: none;">
                                        <option selected="" value="">Choose...</option>
                                        <option value="in" {{old('country') == 'in' || (isset($user_address) && $user_address->country == 'in') ? 'selected' : ''}}>India</option>
                                    </select>
                                    @if ($errors->has('country'))
                                        <p class="error">{{ $errors->first('country') }}</p>
                                    @endif
                                    <p class="error"></p>
                                </div>

                                <div class="checkout__input">
                                    <p>State<span>*</span></p>
                                    <div class="stateSelectDiv">
                                        <select class="form-select custome-form-select" id="State" name="state"
                                            style="display: none;">
                                            <option selected="" value="">Choose...</option>
                                            <option value="rj" {{ old('state') == 'rj' || (isset($user_address) && $user_address->state == 'rj') ? 'selected' : '' }}>Rajasthan</option>
                                        </select>
                                        @if ($errors->has('state'))
                                            <p class="error">{{ $errors->first('state') }}</p>
                                        @endif
                                    </div>
                                    <p class="error"></p>
                                </div>
                                <div class="checkout__input">
                                    <p>Town/City<span>*</span></p>

                                    <div class="citySelectDiv">
                                        <select class="form-select custome-form-select citySelect" id="city"
                                            name="city" style="display: none;">
                                            <option selected="" value="">Choose...</option>
                                            <option value="jp" {{ old('state') == 'jp' || (isset($user_address) && $user_address->city == 'jp') ? 'selected' : '' }}>Jaipur</option>

                                        </select>
                                    </div>
                                    @if ($errors->has('city'))
                                        <p class="error">{{ $errors->first('city') }}</p>
                                    @endif
                                    <p class="error"></p>
                                </div>
                                <div class="checkout__input">
                                    <p>Street Address<span>*</span></p>
                                    <input type="text" placeholder="Street Address" class="checkout__input__add"
                                        name="s_address" value="{{ old('s_address',isset($user_address->address1) ? $user_address->address1 : '') }}">
                                </div>
                                <div class="checkout__input">
                                    <p>City/Town<span>*</span></p>

                                    <p class="error"></p>
                                    <input type="text" placeholder="Apartment, suite, unite ect (optinal)"
                                        name="town" value="{{ old('town',isset($user_address->address2) ? $user_address->address2 : '') }}">
                                </div>
                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span>*</span></p>
                                    <input type="text" class="form-control" name="pincode" value="{{ old('pincode',isset($user_address->pincode) ? $user_address->pincode : '') }}">
                                    <p class="error"></p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" class="form-control" name="mobile" value="{{ old('mpbile',isset($user_address->mobile_no) ? $user_address->mobile_no : '') }}">
                                            <p class="error"></p>
                                            @if ($errors->has('mobile'))
                                                <p class="error">{{ $errors->first('mobile') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email',isset($user_address->email) ? $user_address->email : '') }}">
                                        </div>
                                        <p class="error"></p>
                                    </div>
                                </div>
                                {{-- <div class="checkout__input__checkbox">
                                <label for="saveAdress">
                                    Save this information for next time
                                    <input type="checkbox" id="saveAdress" name="by_default" value="1">
                                    <span class="checkmark check-small"></span>
                                </label>
                            </div> --}}
                        

                        </div>
                        <div class="col-lg-4 col-md-6">
                                <div class="checkout__order">
                                    <h4 class="order__title">Your order</h4>
                                    <div class="checkout__order__products">Product <span>Total</span></div>

                                    <ul class="checkout__total__products">
                                        <div class="shopping__cart__table">
                                            <table>
                                                <tbody>
                                                    @php 
                                                        $subtotal = 0;
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($productItem as $item)
                                                    @php 
                                                        $subtotal = $item->price*$item->qty;
                                                        $total = ($item->price*$item->qty)+env('SHIPPINGCHARGE');
                                                    @endphp
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    class="product__cart__item d-flex align-items-center basis-50">
                                                                    <div class="product__cart__item__pic"
                                                                        style="width: 150px;">
                                                                        <img
                                                                            src="{{ asset('uploads/products/' . $item->image) }}">
                                                                    </div>
                                                                    <div class="product__cart__item__text">
                                                                        <h6>{{ $item->qty }} X {{ $item->name }}</h6>
                                                                        <h5>{{ currencysym($item->price) }}</h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </ul>
                                    <input type="hidden" name="shippingcharege" value="{{env('SHIPPINGCHARGE')}}">
                                    <ul class="checkout__total__all">
                                        <li>Subtotal <span id="subtotals">{{currencysym($subtotal)}}</span></li>
                                        <input type="hidden" name="subtotal_amount" value="{{$subtotal}}">

                                        <li>Shipping Charges : <span id="shippingchr">{{currencysym(env('SHIPPINGCHARGE'))}}</span></li>
                                        <li>Total <span id="total">{{currencysym($total)}}</span></li>
                                        <input type="hidden" name="total_amount" value="{{$total}}">
                                    </ul>
                                    <h4 class="order__title">Payment Type</h4>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <input type="radio" name="paymenttype" class="paymenttype" value="1"
                                            checked> Cash on Delivery
 
                                        <input type="radio" name="paymenttype" class="paymenttype" value="2"
                                            > Online
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <a href="javascript:void(0);" class="primary-btn btn-product btn--animated"
                                            onclick="checkisorder();">Place Order</a>
                                        <p class="error checkouterr"></p>
                                    </div>
                                </div>
                            

                        </div>

                    </div>
                    <form>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->
    </div>

    <!-- Footer Section Begin -->


    </div>
@endsection
@section('scripts')
    <script>
        function checkisorder(){
           $('#submitform').submit();
        }
    </script>
    @endsection
