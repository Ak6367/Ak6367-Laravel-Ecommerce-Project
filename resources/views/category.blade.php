@php 
$category = categories(); 
@endphp
@extends('layouts.fronted')

@section('fronted')
<div class="content">
    <section class="shop spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div id="sideBarFilter" class="shop__sidebar left-bar">
                <span class="icon icon-cancel block d-lg-none" onclick="closeSidebar()"></span>
              <div class="shop__sidebar__search">
                <form action="#">
                  <input type="text" placeholder="Search..." />
                  <button type="submit">
                    <span class="icon_search"></span>
                  </button>
                </form>
              </div>
              <div class="shop__sidebar__accordion">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-heading">
                      <a data-toggle="collapse" data-target="#collapseOne"
                        >Categories</a
                      >
                    </div>
                    <div
                      id="collapseOne"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="shop__sidebar__categories">
                          <ul class="filter-wrap">
                            @if($type == 'category')
                                @foreach ($subcat as $singlecat)
                                <li><a href="{{route('category',['id'=>base64_encode($singlecat->id),'type'=>'subcategory'])}}">{{$singlecat->name}}</a></li>
                                @endforeach
                            
                            @else

                                @foreach ($category as $cat)
                                <li><a href="{{route('category',['id'=>base64_encode($cat->id),'type'=>'category'])}}">{{$cat->name}}</a></li>
                                @endforeach
                            @endif
                           
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-heading">
                      <a data-toggle="collapse" data-target="#collapseThree"
                        >Filter Price</a
                      >
                    </div>
                    <div
                      id="collapseThree"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="shop__sidebar__price">
                          <ul class="filter-wrap">
                            <li>
                              <a href="{{$curruntUrl}}?s_price=0&e_price=500">₹0.00 - ₹500.00</a>
                            </li>
                            <li>
                              <a href="{{$curruntUrl}}?s_price=500&e_price=1000">₹500.00 - ₹1000.00</a>
                              
                            </li>
                            <li>
                              <a href="{{$curruntUrl}}?s_price=1000&e_price=1500">₹1000.00 - ₹1500.00</a>
                              
                            </li>
                            <li>
                              <a href="{{$curruntUrl}}?s_price=1500&e_price=2000">₹1500.00 - ₹2000.00</a>
                              
                            </li>
                            <li>
                              <a href="{{$curruntUrl}}?s_price=2000&e_price=2500">₹2000.00 - 2500.00</a>
                              
                            </li>
                            <li>
                              <a href="{{$curruntUrl}}?s_price=2500&e_price=0">₹2500.00+</a>
                              
                            </li>
                          </ul>
                        </div>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            function openSidebar(){
                var sideabr = document.getElementById("sideBarFilter");
                sideabr.classList.toggle("open");
            } 
            function closeSidebar(){
                var sideabr = document.getElementById("sideBarFilter");
                sideabr.classList.toggle("open");
            } 
          </script>
          <div class="col-lg-9">
            <div class="shop__sidebar__right">
              <div class="shop__product__option">
                <div class="row align-items-center justify-content-lg-between">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  d-block d-lg-none">
                    <button class="product-filter-mobile filter-toggle p-0" onclick="openSidebar()">FILTER
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#808080c9">
                            <path d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z">
                            </path>
                        </svg>
                    </button>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <div class="shop__product__option__left">
                      <p>Showing {{count($products)}} results</p>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="shop__product__option__right">
                      <p>Sort by Price:</p>
                      <select>
                        <option value="asc">Low To High</option>
                        <option value="desc">High To Low/</option>
                        <option></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row product_add_row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 wow fadeInUp"
                  data-wow-delay="0.1s">
                  <div class="product__item">
                    <div class="product__item__pic set-bg">
                      <a
                        href="{{route('product',['id'=>base64_encode($product->id)])}}"
                      >
                        <img
                          onerror=""
                          src="{{asset('uploads/products/'.$product->image)}}"
                          style="height: 300px!important"
                        />
                      </a>

                      <ul class="product__hover">
                        <li class="toggle-whishlist" data-product-id="178">
                          <img
                            onerror=""
                            src="{{asset('fronted/html/img/icon/heart.png') }}"
                            alt=""
                          /><span>Wishlist</span>
                        </li>
                        <li
                          class="add-cart add_to_cart_btn"
                          id="productid" product_id="{{$product->id}}"
                        >
                          <img
                            onerror=""
                            src="{{asset('fronted/html/img/icon/cart.png') }}"
                            alt=""
                          />
                          <span>Cart</span>
                        </li>
                      </ul>
                      <div class="product__hover__details">
                        <a
                          href="{{route('product',['id'=>base64_encode($product->id)])}}"
                          ><span>View Details</span></a
                        >
                      </div>
                    </div>

                    <div class="product__item__text">
                      <a
                        title="{{$product->name}}"
                        href="{{route('product',['id'=>base64_encode($product->id)])}}"
                      >
                        <span>{{$product->name}}</span>
                      </a>

                      <span style="margin: ">{{currencysym($product->price)}}</span>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  {{-- <form id="categoryFilter">
    <input type="hidden" id="filter_price_start" name="filter_price_start" value="{{$filter_price_start}}"/>
    <input type="hidden" id="filter_price_end" name="filter_price_end" value="{{$filter_price_end}}"/>
  </form>  --}}

  @endsection
  @section('scripts')
<script>
    $(document).ready(function () {
            $(document).on('click', '.add_to_cart_btn', function () {
                var product_id = $(this).attr('product_id');
          $.ajax({
            url: '{{route("addtocart")}}',
            type: 'POST',
            data: {_token:"{{ csrf_token() }}", productid:product_id},
            dataType: 'JSON',
            success: function (response) { 
            if(response.status == 1){
              $("#totalqty").html(response.totalqty); 
              Swal.fire({
              icon: 'success',
              title: 'Successfully',
              text: 'Product Add To Cart Successfully',
              }).then((result) => {
                              window.location.reload()
              });
            }else{
              Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Something went wrong',
              });
            }
            }
          }); 
     });

  });
</script>
  @endsection