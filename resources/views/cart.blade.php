@extends('layouts.fronted')

@section('fronted')
<div class="content">
    <!-- Breadcrumb Section Begin -->
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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="index-2.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form method="POST" id="submitform" action="{{route('updatecart')}}">
                        @method('PATCH')
                        @csrf
                    <div class="shopping__cart__table">
                        <div class="">
                            <div class="product-table-header">
                                <div class="product-table-header-inner">
                                    <div class="pro-header basis-50"><h3>Product</h3></div>
                                    <div class="qty-header basis-20"><h3>Quantity</h3></div>
                                    <div class="total-header basis-20"><h3>Total</h3></div>
                                    <div class="empty-head basis-10"><h3></h3></div>
                                </div>
                            </div>
                            @php 
                                $cart_total = 0; 
                            @endphp
                            @foreach ($cartitems as $cart)
                            @php 
                                $cart_total += $cart->price*$cart->qty;
                            @endphp
                            <div class="product-table-body" id="cart_{{$cart->id}}">
                                <div class="product-table-body-inner">
                                    <div class="product__cart__item d-flex align-items-center basis-50">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('uploads/products/'.$cart->image)}}">
                                        </div>
                                        <div class="product__cart__item__text" style="margin-left: 15px">
                                            <h6>
                                                @php 
                                                    $maxCharacters = 20; 
                                                    $itemname = $cart->name;
                                                    $shortenedText = substr($itemname, 0, $maxCharacters);
                                                @endphp
                                                {{$shortenedText}}
                                            </h6>
                                            <h5>{{currencysym($cart->price)}}</h5>
                                        </div>
                                    </div>
                                    <div class="quantity__item basis-20">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                {{-- <span class="fa fa-angle-left dec qtybtn"></span> --}}
                                                <input type="text" name="qty[{{$cart->id}}]" value="{{$cart->qty}}" readonly="readonly">
                                            {{-- <span class="fa fa-angle-right inc qtybtn"></span> --}}
                                        </div>
                                        </div>
                                    </div>
                                    <div class="cart__price basis-20">
                                        <span>{{currencysym($cart->price*$cart->qty)}}</span>                                               
                                    </div>
                                    <div class="cart__close remove_fron_cart_btn basis-10" id="cart_item_del" onclick="cart_item_del({{$cart->id}})">
                                        <i class="fa fa-close"></i>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                            
                        </div>
                    </div>
                </form>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a class="btn-product btn--animated submitbtn" href="javascript:void(0)"><i class="fa fa-spinner"></i>
                                    Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div> --}}
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{currencysym($cart_total)}}</span></li>
                            <li>Shipping Charge <span>{{env('SHIPPINGCHARGE')}}</span></li>
                            <li>Total <span>{{currencysym($cart_total+env('SHIPPINGCHARGE'))}}</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn btn-product btn--animated">Proceed to
                            checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

</div>
@endsection
@section('scripts')
    <script>
        $('.submitbtn').click(function(){
        $('#submitform').submit();
    });
    </script>
    <script>
       function cart_item_del(cartid){
        $.ajax({
            url: "{{route('deletefromcart')}}",
            method:"POST",
            data:{_token:"{{csrf_token() }}",cart:cartid},
            success: function (resultData) {
                if(resultData == 1){
                Swal.fire({
                            icon: 'success',
                            title: 'Cart item deleted successfully' ,
                            confirmButtonText: 'OK',
                        });
                        $('#cart_'+cartid).remove();
                
            }else{
                Swal.fire({
                          icon: 'error',
                          title: 'Failed',
                          text: 'Something went wrong',
                      });
                }
            }    
        });

       }
    </script>
@endsection