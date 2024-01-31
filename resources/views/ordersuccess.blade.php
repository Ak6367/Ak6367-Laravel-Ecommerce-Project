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
                            <h4>Your Order</h4>
                            <div class="breadcrumb__links">
                                <a href="./index.html">Home</a>
                                <span>Orders</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
        <section class="my-account spad-70">
            <div class="container">
                <!--  -->

                <div class="tab-content account-tabs" id="v-pills-tabContent">
                    <div class="tab-pane fade show active order-details-section" id="v-pills-profile">
                        <div class="heading-box text-left">
                            <h5>Your Orders</h5>
                        </div>
                        <section id="allOrder">
                            <div class="current-order-wrapper">
                                <div class="current-order-header">
                                    <div class="current-order-header-wrap">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <h4 class="text-left">Ship TO:</h4>
                                                <p>{{ $order_detail->name }}</p>
                                                <p>{{ $order_detail->address1 }}, {{ $order_detail->address2 }}, Jaipur</p>
                                                <p>Jaipur / Rajasthan / India , 303604</p>
                                                <p>{{ $order_detail->mobile_no }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-left">Order Detials:</h4>
                                                <p><strong>Order Number : </strong>{{ $order_detail->order_no }}</p>
                                                <p><strong>Order Status :
                                                    </strong>{{ orderstatus($order_detail->order_status) }}</p>
                                                <p><strong>Shipping Status :
                                                    </strong>{{ shipstatus($order_detail->shipping_status) }}</p>
                                                <p><strong>Delivery Date : </strong>N/A</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="order-details-wrapper">
                                    <h4 class="order-status text-left">Delivered 07-Oct-2022</h4>

                                  @foreach ($products as $pro_item)
                                  <div class="d-flex flex-wrap justify-content-between mb-5">
                                      <div class="order-item-details p-0">
                                          <div class="order-item-details-wrap d-flex">
                                              <div class="order-item-img"><img
                                                      src="{{asset('uploads/products/'.$pro_item->image)}}">
                                              </div>
                                              <div class="order-item-desc d-flex flex-column">
                                                  <a href="{{route('product',['id'=>base64_encode($pro_item->id)])}}">{{$pro_item->name}}</a>
                                                  <div class="buy-again">
                                                      <a href="{{route('product',['id'=>base64_encode($pro_item->id)])}}"><span>Buy
                                                              it again</span></a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="order-items-btn p-0">
                                          <div class="order-items-btn-wrap">
                                              <div class="d-flex justify-content-center">Quantity : {{$pro_item->qty}}</div>
                                              <div class="d-flex justify-content-center">Price : {{currencysym($pro_item->price)}}</div>

                                              <div class="d-flex justify-content-center">Total : {{currencysym($pro_item->price*$pro_item->qty)}}</div>

                                          </div>
                                      </div>
                                  </div>
                                  @endforeach


                                  <div class="row text-center">
                                    <a class="text-center" href="{{Route('home')}}">Home</a>
                                  </div>
                                </div>
                              </div> 
                        </section>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
