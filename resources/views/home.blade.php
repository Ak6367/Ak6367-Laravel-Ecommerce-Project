@php 
  $category = categories(); 
@endphp
@extends('layouts.fronted')

@section('fronted')
<div class="content">
    <section class="hero">
      <div class="hero__slider owl-carousel">
        @foreach ($banner as $banners)
        <div class="hero__items set-bg" data-setbg="{{asset('uploads/banners/'.$banners->image)}}">
          <div class="container">
            <div class="row">
              <div class="col-xl-5 col-lg-7 col-md-8"></div>
            </div>
          </div>
        </div>
        @endforeach
       
      </div>
    </section>
    &nbsp;
    <section class="section section-cat pt-0 animTop shop-by-category">
      <div class="container">
        <div class="heading-box wow fadeInUp" data-wow-delay="0.1s">
          <h3>Categories</h3>
          <p>A beautiful rendition of modern pieces to elevate your look</p>
        </div>
        <div class="row justify-content-center">
          @foreach ($category as $categories)
          <div class="col-xs-12 col-md-4 mb-4 mb-md-0 col-lg-4 catList">
            <a href="{{ route('category',['id'=>base64_encode($categories->id),'type'=>'category']) }}" class="catBox">
              <div class="imgBox">
                <img style="height: 400px!important;" src="{{ asset('uploads/category/'.$categories->image) }}" alt="" />
              </div>
              <h3>{{$categories->name}}</h3>
            </a>
          </div>
          @endforeach
          
        </div>
      </div>
    </section>

    <section class="product spad">
      <div class="container">
        <div class="heading-box wow fadeInUp" data-wow-delay="0.1s">
          <h3>See What’s Trending</h3>
          <p>A beautiful rendition of modern pieces to elevate your look</p>
        </div>
        <div class="product__filter">
          <div class="mix new-arrivals">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                @foreach ($featuredPro as $fspro)
                <div class="swiper-slide">
                  <div class="product__item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product__item__pic set-bg">
                      <a class="pro-img" href="{{route('product',['id'=>base64_encode($fspro->id)])}}">
                        <img onerror="" style="height: 400px!important" src="{{asset('uploads/products/'.$fspro->image)}}" alt="" />
                      </a>
                      <span class="label">Featured</span>
                      <ul class="product__hover">
                        <li>
                          <a href="#"><img onerror="" src="{{ asset('fronted/html/img/icon/heart.png') }}" alt="" /><span>Wishlist</span></a>
                        </li>
                        <li>
                          <a class="add-cart" href=""><img onerror="" src="{{ asset('fronted/html/img/icon/cart.png') }}" alt="" />
                            <span>Cart</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="product__item__text">
                      <a href="Vinaika-women-grey-printed-sf-shurg-with-kurta.html">
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="product spad">
      <div class="container">
        <div class="heading-box wow fadeInUp" data-wow-delay="0.1s">
          <h3>See What’s Latest</h3>
          <p>A beautiful rendition of modern pieces to elevate your look</p>
        </div>
        <div class="product__filter">
          <div class="mix new-arrivals">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
        
                @foreach ($letestPro as $latestsection)
                <div class="swiper-slide">
                  <div class="product__item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product__item__pic set-bg">
                      <a class="pro-img" href="{{route('product',['id'=>base64_encode($latestsection->id)])}}">
                        <img onerror="" style="height: 400px!important" src="{{asset('uploads/products/'.$latestsection->image)}}" alt="" />
                      </a>
                      <span class="label">New</span>
                      <ul class="product__hover">
                        <li>
                          <a href="#"><img onerror="" src="{{ asset('fronted/html/img/icon/heart.png') }}" alt="" /><span>Wishlist</span></a>
                        </li>
                        <li>
                          <a class="add-cart" href="#"><img onerror="" src="{{ asset('fronted/html/img/icon/cart.png') }}" alt="" />
                            <span>Cart</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="product__item__text">
                      <a href="Vinaika-women-grey-printed-sf-shurg-with-kurta.html">
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="spad about-us about-us-vinaika spacing-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about__text">
              <h4>Welcome to vinaika Store</h4>
              <p>
                "Sed ut perspiciatis unde omnis iste natus error sit
                voluptatem accusantium doloremque laudantium, totam rem
                aperiam, eaque ipsa quae ab illo inventore veritatis et
                quasi architecto beatae vitae dicta sunt explicabo. Nemo
                enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                aut fugit, sed quia consequuntur magni dolores eos qui
                ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                qui dolorem ipsum quia dolor sit amet.
              </p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="about__img">
              <img onerror="" src="{{ asset('fronted/html/img/product/about-img.jpg') }}" alt="image" />
              <img onerror="" class="right__img" src="{{ asset('fronted/html/img/product/about-img2.jpg') }}" alt="image" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="spad about-us about-us-vinaika">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 wow fadeInUp order-2 order-md-1" data-wow-delay="0.1s">
            <div class="about__img">
              <img onerror="" src="{{ asset('fronted/html/img/product/about-img3.jpg') }}" alt="image" />
              <img onerror="" class="right__img" src="{{ asset('fronted/html/img/product/about-img4.jpg') }}" alt="image" />
            </div>
          </div>
          <div class="col-md-6 wow fadeInUp order-1 order-md-2" data-wow-delay="0.3s">
            <div class="about__text">
              <h4>Welcome to vinaika jewellery Store</h4>
              <p>
                "Sed ut perspiciatis unde omnis iste natus error sit
                voluptatem accusantium doloremque laudantium, totam rem
                aperiam, eaque ipsa quae ab illo inventore veritatis et
                quasi architecto beatae vitae dicta sunt explicabo. Nemo
                enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                aut fugit, sed quia consequuntur magni dolores eos qui
                ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                qui dolorem ipsum quia dolor sit amet.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- <section class="spad client_reviews">
      <div class="container">
        <div class="heading-box">
          <h3>REVIEWS</h3>
          <p>A beautiful rendition of modern pieces to elevate your look</p>
        </div>
        <div class="customers-testimonials owl-carousel owl-loaded owl-drag">
          <div class="item">
            <div class="product-collection-wrap">
              <div class="product-collection-summery">
                <p class="testimonialText">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe voluptas voluptatem ipsa commodi quibusdam numquam pariatur.
                </p>
                <hr />
                <p class="testimonialHeading">Shubham Bhowmik</p>
                <div class="rating_star">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="product-collection-wrap">
              <div class="product-collection-summery">
                <p class="testimonialText">
                  NICE FABRIC AND COMFORT FEEL AFTER WEAR THE KURTI. I
                  RECOMMAND TO ALL MUST BUY MYAZA KURTIS and FABRIC.
                </p>
                <hr />
                <p class="testimonialHeading">SWETA DAS</p>
                <div class="rating_star">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="product-collection-wrap">
              <div class="product-collection-summery">
                <p class="testimonialText">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident ipsa laboriosam recusandae fugiat nesciunt nobis, tempore!
                </p>
                <hr />
                <p class="testimonialHeading">Swani Rai</p>
                <div class="rating_star">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Latest Blog Section Begin -->
    {{-- <section class="latest spad blog-section">
      <div class="container">
        <div class="heading-box">
          <h3>news & blog</h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry.
          </p>
        </div>
        <div class="swiper blogSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <a href="javascript:void(0)">
                    <img onerror="" class="blog__item__pic_blog" src="html/img/about/testimonial-pic.jpg" />
                  </a>
                  <div class="blog-description">
                    <span><img onerror="" src="html/img/icon/calendar.png" alt="" />
                      13-09-2022 11:53:22</span>
                    <h5 class="text-left">
                      Lorem ipsum dolor, sit amet consectetur adipisicing
                      elit. Ullam nisi nostrum debitis,
                    </h5>
                    <a class="btn product__btn wow bounce" data-wow-delay="0.5s" href="new-blog/blog.html">Read
                      More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section> --}}
    <style>
      img,
      svg {
        vertical-align: middle;
      }
    </style>

    <!-- Latest Blog Section End -->
  </div>
@endsection
