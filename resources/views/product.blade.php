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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="http://localhost/ecommerce/">Home</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
               
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product__single__item_details">
                            <ul class="nav nav-tabs img-thumb-wrapper" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link img-thumb active" data-toggle="tab" href="#tabs-14"
                                        role="tab">
                                        <div class="product__thumb__pic set-bg"
                                            data-setbg="{{asset('uploads/products/'.$products->image)}}" >
                                        </div>
                                    </a>
                                </li>
                                @foreach ($product_images as $proimg)
                                <li class="nav-item">
                                    <a class="nav-link img-thumb" data-toggle="tab" href="#tabs-{{$loop->index + 15}}" role="tab">
                                        <div class="product__thumb__pic set-bg"
                                            data-setbg="{{asset('uploads/products/gallary/'.$proimg->image)}}">
                                        </div>
                                    </a>
                                </li>  
                                @endforeach
                                
                            
                            </ul>

                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-14" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <a class="grouped_elements"
                                            href="{{asset('uploads/products/'.$products->image)}}">
                                            <img onerror="" src="{{asset('uploads/products/'.$products->image)}}" alt="" style="height: 520px;" />
                                        </a>
                                    </div>
                                </div>
                                @foreach ( $product_images as $proimg )
                                <div class="tab-pane " id="tabs-{{$loop->index + 15}}" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <a class="grouped_elements"
                                            href="{{asset('uploads/products/gallary/'.$proimg->image)}}" style="height: 520px;">
                                            <img onerror="" src="{{asset('uploads/products/gallary/'.$proimg->image)}}" style="height: 520px;" alt="" />
                                        </a>
                                    </div>
                                </div> 
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product__details__text">
                            <h4 class="text-left">{{$products->name}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 0 Reviews</span>
                                <span class="toggle-whishlist" data-product-id="{{$products->id}}">
                                    <img class="whishlist whis-list" style="width: 25px;height:25px" src="{{asset('fronted/html/img/icon/heart.png')}}"
                                        alt="" /><span>Wishlist</span>

                                </span> 
                                                                               
                            </div>
                            <h3 class="text-left">{{currencysym( $products->price)}}<span>{{currencysym( $products->mrp)}}</span></h3>
                            <p>
                            <p>Dummy Details</p>
                            </p>
                            
                             @auth
                             <a href="javascript:void(0);" onclick="addtocart({{$products->id}})" class="primary-btn btn-product btn--animated shake add_to_cart_btn" product_id="{{$products->id}}">add to cart</a>
                             @else
                            
                             <a href="{{route('login',['redirectTo' =>$url])}}" class="primary-btn btn-product btn--animated shake add_to_cart_btn">login to add to cart</a>
                             @endauth
                                

                                                                
                        </div>
                        <div class="product__details__btns__option">

                        </div>
                        <div class="product__details__last__option">
                            <div class="safe-checkout">
                                <img src="{{asset('fronted/safe-checkout.png')}}" />
                            </div>
                            <ul style="padding-top:0px">
                                <li><span>SKU:</span> M500</li>
                                <li><span>Categories:</span> {{$category->name}}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
<div class="product__details__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product_description_area">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home"
                                role="tab" aria-controls="home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p>
                            <p>{{$products->description}}</p>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p>Dummy Details</p>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row total_rate">
                                        <div class="col-6">
                                            <div class="box_total">
                                                <h5>Overall</h5>
                                                <h4>0</h4>
                                                <h6>(0 Reviews)</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="rating_list">
                                                <h3>Based on 0 Reviews</h3>


                                                <ul class="list">
                                                    <li>
                                                        <a href="#">5 Star
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            0</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">4 Star <i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i>
                                                            0</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">3 Star <i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i>
                                                            0</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">2 Star <i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i>
                                                            0</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">1 Star <i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i
                                                                class="fa fa-star"></i>
                                                            0</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review_list">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_box">
                                        <h4>Add a Review</h4>
                                        <p>Your Rating:</p>
                                        <ul class="list">
                                            <li>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </li>
                                        </ul>
                                        <p>Outstanding</p>
                                        <form class="row contact_form"
                                            action="https://vinaikajaipur.com/product/contact_process.php"
                                            method="post" id="contactForm" novalidate="novalidate">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Your Full name"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Your Full name'" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Email Address"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Email Address'" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="number"
                                                        name="number" placeholder="Phone Number"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Phone Number'" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" id="message"
                                                        rows="1" placeholder="Review"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Review'"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="submit" value="submit"
                                                    class="primary-btn btn-product btn--animated">Submit
                                                    Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="product__filter wow fadeInUp" data-wow-delay="0.1s">


            <div class="swiper productSwiper">
                <div class="swiper-wrapper">

                    @foreach ($related_pro as $relatedproducts)
                    <div class="swiper-slide">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <a class="pro-img" href="{{route('product',['id'=>base64_encode($relatedproducts->id)])}}">
                                    <img style="height: 300px!important" onerror="" src="{{asset('uploads/products/'.$relatedproducts->image)}}"
                                        alt="">
                                </a>
                                <span class="label">New</span>
                                <ul class="product__hover">
                                    <li class="toggle-whishlist" data-product-id="346">
                                        <img onerror="" src="{{asset('fronted/html/img/icon/heart.png') }}"
                                            alt="" /><span>Wishlist</span>
                                    </li>
                                    <li>
                                        <a class="add-cart" href="#"><img src="{{asset('fronted/html/img/icon/cart.png') }}"
                                                alt="" />
                                            <span>Cart</span></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product__item__text d-flex flex-column">
                                <a href="javascript:void(0)">
                                    <span>{{$relatedproducts->name}}</span>
                                </a>
                                <span>{{ currencysym($relatedproducts->price) }}</span>                                        
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>   
            </div>

        </div>
    </div>
</section>
<!-- Related Section End -->
</div>
@endsection
@section('scripts')
<script>
    var swiper = new Swiper(".productSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
      breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
    },
    });
    function addtocart(product_id){
        // alert(product_id)
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
              $("#totalqty").html(response.totalqty); 
          }
      }); 
    }
</script> 
@endsection