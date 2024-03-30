@extends('frontend.layouts.app')
@section('extra-css')
<style>
    .hero-header {
    background: linear-gradient(rgba(248, 223, 173, 0.1), rgba(248, 223, 173, 0.1)), url('{{asset('img/video-banner-img-two.png')}}') !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
}
.news-latter-image-container{
    background: linear-gradient(rgba(248, 223, 173, 0.1), rgba(248, 223, 173, 0.1)), url('{{asset('img/newsletter-bg.jpeg')}}') !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    padding: 98px 0;
    color: #fff;
    text-align: center;
}
/* .hero-header {
    background: linear-gradient(rgba(248, 223, 173, 0.1), rgba(248, 223, 173, 0.1)), url(../img/hero-img.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
} */
</style>
@endsection
@section('main-content')
@php
$app_section = get_settings('app_section') ? json_decode(get_settings('app_section')) : '';
@endphp
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">                       

                        <h4 class="mb-3 text-dark"> {{isset($app_section->banner_short_description)?$app_section->banner_short_description:''}}</h4>
                        <h1 class="mb-5 display-3 text-primary"> {{isset($app_section->banner_heading)?$app_section->banner_heading:''}}</h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{asset('images/banner-img-two.png')}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Hair Care</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('images/banner-img-one.png')}}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Face-Powder</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->




        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>
                        <div class="col-lg-12 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all-products">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">Hair Care</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Babi's Care</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Men's Care</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Face Care</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 130px;">Body Care</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-all-products" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @if(isset($products) && $products)
                                @foreach ($products as $product)
                                <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec">
                                            @if(isset($product->image) && $product->image)
                                            @php
                                                $images = json_decode($product->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                     
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$product->name}}
                                                        </a>
                                                    </div>
                        
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($product->variations) && $product->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($product->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>

                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$product->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="tab-1" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @if(isset($hair_oils) && $hair_oils)
                                        @foreach ($hair_oils as $hair_oil)
                                        <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                            <div class="custom-product-cart">
                                              <div class="product-card-body">
                                                  <div class="product-card-img-sec">
                                                    @if(isset($hair_oil->image) && $hair_oil->image)
                                                    @php
                                                        $images = json_decode($hair_oil->image);
                                                        $singleImage = $images[0];
                                                    @endphp
                                                   <a href="#">
                                                    <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                                 </a>
                                                @endif
                                                  
                                                  </div>
                                                  <div class="product-card-contnent-sec">
                                        
                                                            <div class="product-item-name">
                                                                <a href="#">
                                                                    {{$hair_oil->name}}
                                                                </a>
                                                            </div>
                                        
                                                      <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                          <div class="d-flex align-items-baseline">
                                                              <i class="fas fa-star product-star"></i>
                                                              <i class="fas fa-star product-star"></i>
                                                              <i class="fas fa-star product-star"></i>
                                                              <i class="fas fa-star product-star"></i>
                                                              <i class="fas fa-star product-half-star"></i>
                                                              <i class="product-review-count"><span>(10 reviews)</span></i>
                                                          </div>
                                                          <div class="produc-cart-price-sec">
                                                      
                                                                @if (isset($hair_oil->variations) && $hair_oil->variations)
                                                                    @php
                                                                        $v_price = 0;
                                                                    @endphp
                                                                   @foreach ($hair_oil->variations as $key => $variation)
                                                                   @php
                                                                       if($key==0){
                                                                        $v_price = $variation->discount_price;
                                                                       }
                                                                   @endphp
                                                                   @endforeach
                                                                   <p class="fw-bold">৳{{$v_price}}</p>
                                                                {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                                @endif
                                                   
                                                             
                                                          </div>
                                                      </div>
                                        
                                                      <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                          <div class="product-add-to-cart-button">
                                                              <a href="{{route('front.product',[$hair_oil->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                          </div>
                                                          <div class="product-wish-button">
                                                              <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                              </a>
                                                          </div>
                                                      </div>
                                                     
                                                  </div>
                                              </div>
                                            </div>
                                          </div>
                                        @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @if(isset($baby_oils) && $baby_oils)
                                @foreach ($baby_oils as $baby_oil)
                                <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec">
                                            @if(isset($baby_oil->image) && $baby_oil->image)
                                            @php
                                                $images = json_decode($baby_oil->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                                
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$baby_oil->name}}
                                                        </a>
                                                    </div>
                                
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($baby_oil->variations) && $baby_oil->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($baby_oil->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>
                                
                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$baby_oil->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @if(isset($mens_beard_oils) && $mens_beard_oils)

                                @foreach ($mens_beard_oils as $mens_beard_oil)
                                <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec">
                                            @if(isset($mens_beard_oil->image) && $mens_beard_oil->image)
                                            @php
                                                $images = json_decode($mens_beard_oil->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                                
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$mens_beard_oil->name}}
                                                        </a>
                                                    </div>
                                
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($mens_beard_oil->variations) && $mens_beard_oil->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($mens_beard_oil->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>
                                
                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$mens_beard_oil->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @if(isset($facial_serums) && $facial_serums)
                                @foreach ($facial_serums as $facial_serum)
                                <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec">
                                            @if(isset($facial_serum->image) && $facial_serum->image)
                                            @php
                                                $images = json_decode($facial_serum->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                                
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$facial_serum->name}}
                                                        </a>
                                                    </div>
                                
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($facial_serum->variations) && $facial_serum->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($facial_serum->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>
                                
                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$facial_serum->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @if(isset($body_oils) && $body_oils)
                                @foreach ($body_oils as $body_oil)
                                <div class="col-md-6 col-6 col-lg-4 col-xl-3">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec">
                                            @if(isset($body_oil->image) && $body_oil->image)
                                            @php
                                                $images = json_decode($body_oil->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                                
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$body_oil->name}}
                                                        </a>
                                                    </div>
                                
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($body_oil->variations) && $body_oil->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($body_oil->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>
                                
                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$body_oil->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->
        <div class="container-fluid banner bg-green my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                   
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="{{asset('images/Facial Oil.jpg')}}" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Facial Serum</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">Unleash the power of nature's bounty with our Pure Radiance Hair Oil, a luxurious blend meticulously crafted to nurture and revitalize your hair. Infused with a harmonious fusion of botanical extracts, vitamins, and essential oils, our formula is designed to restore vibrancy, promote growth, and provide nourishment from root to tip.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featurs Start -->
        <div class="container-fluid service py-5 d-none">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Fresh Apples</h5>
                                        <h3 class="mb-0">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Tasty Fruits</h5>
                                        <h3 class="mb-0">Free delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Exotic Vegitable</h5>
                                        <h3 class="mb-0">Discount 30$</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
    
                <div class="owl-carousel related-product-carousel justify-content-center">
                    @if(isset($products) && $products)
                @foreach ($products as $product)
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="custom-product-cart">
                                      <div class="product-card-body">
                                          <div class="product-card-img-sec-if-slider ">
                                            @if(isset($product->image) && $product->image)
                                            @php
                                                $images = json_decode($product->image);
                                                $singleImage = $images[0];
                                            @endphp
                                           <a href="#">
                                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                                         </a>
                                        @endif
                                          
                                          </div>
                                          <div class="product-card-contnent-sec">
                     
                                                    <div class="product-item-name">
                                                        <a href="#">
                                                            {{$product->name}}
                                                        </a>
                                                    </div>
                        
                                              <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between">
                                                  <div class="d-flex align-items-baseline">
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-star"></i>
                                                      <i class="fas fa-star product-half-star"></i>
                                                      <i class="product-review-count"><span>(10 reviews)</span></i>
                                                  </div>
                                                  <div class="produc-cart-price-sec">
                                              
                                                        @if (isset($product->variations) && $product->variations)
                                                            @php
                                                                $v_price = 0;
                                                            @endphp
                                                           @foreach ($product->variations as $key => $variation)
                                                           @php
                                                               if($key==0){
                                                                $v_price = $variation->discount_price;
                                                               }
                                                           @endphp
                                                           @endforeach
                                                           <p class="fw-bold">৳{{$v_price}}</p>
                                                        {{-- <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5> --}}
                                                        @endif
                                           
                                                     
                                                  </div>
                                              </div>
    
                                              <div class="product-add-n-wish-btn-sec d-flex justify-content-between">
                                                  <div class="product-add-to-cart-button">
                                                      <a href="{{route('front.product',[$product->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
                                                  </div>
                                                  <div class="product-wish-button">
                                                      <a href="#" class="product-wish-btn"><i class="fa fa-heart" aria-hidden="true"></i>
                                                      </a>
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                
                    @endforeach
                    @endif
                   
                </div>
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-green my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Natural Hair Oil</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">Unleash the power of nature's bounty with our Pure Radiance Hair Oil, a luxurious blend meticulously crafted to nurture and revitalize your hair. Infused with a harmonious fusion of botanical extracts, vitamins, and essential oils, our formula is designed to restore vibrancy, promote growth, and provide nourishment from root to tip.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="{{asset('img/hair-bg.png')}}" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">30</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">%</span>
                                    <span class="h4 text-muted mb-0">Discount</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
      
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-6 col-lg-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>satisfied customers</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality of service</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality certificates</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Available Products</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->


        <!-- Tastimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Testimonial</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Customer Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Customer Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Customer Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tastimonial End -->



        <!-- News latter Start -->

        <div class="container-fluid featurs news-latter-image-container">
            <div class="container py-5">
                <div class="row g-4">
                        <div class="col-12">
                                <div class="news-latter-content-sec">
                                <div class="newsletter-title-sec">
                                       Newsletter
                                </div>
                                <div class="newsletter-sub-title">
                                    Get insider access for limited edition offers, new launches, insights on Ayurvedic skincare, beauty tips and more!
                                </div>
                                <div class="row">
                                    <div class="col-md-8 m-auto">
                                        <div class="row">
                                            <div class="col-12 col-lg-5">
                                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your name">
                                            </div>
                                            <div class="col-12 col-lg-5">
                                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                            </div>
                                            <div class="col-12 col-lg-2">
                                                <button class="btn btn-primary w-100 py-3 mb-4" type="submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
        
        <!-- News latter End -->



        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-6 col-lg-3">
                        <div class="featured-img-sec text-center">
                            <img src="{{asset('img/Natural Products.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="featurs-content text-center">
                            <h5>100% Natural</h5>
                            <p class="mb-0">Our products are certified 100% natural and approved by BSTI </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="featured-img-sec text-center">
                            <img src="{{asset('img/payment.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Secure Payment</h5>
                            <p class="mb-0">100% Secure payment method</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="featured-img-sec text-center">
                            <img src="{{asset('img/free.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">No Extra Charge for delivery.</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="featured-img-sec text-center">
                            <img src="{{asset('img/7days.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="featurs-content text-center">
                            <h5>7 days return</h5>
                            <p class="mb-0">7 days return policy and money back</p>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->

    
@endsection