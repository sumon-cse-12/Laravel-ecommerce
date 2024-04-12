@extends('frontend.layouts.app')
@section('main-content')
{{-- <section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                <li class="breadcrumb-item">{{isset($product->name)?$product->name:''}}</li>
            </ol>
        </div>
    </div>
</section> --}}
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Skin Care Products</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Products</li>
    </ol>
</div>
<section class="section-7">
  <div class="all-product-card-sec mt-5">
    <div class="container">
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
                       <a href="{{route('front.product',[$product->slug])}}">
                        <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid zoom-effect" alt="">
                     </a>
                    @endif
                      
                      </div>
                      <div class="product-card-contnent-sec">
 
                                <div class="product-item-name">
                                    <a href="{{route('front.product',[$product->slug])}}">
                                        {{$product->name}}
                                    </a>
                                </div>
    
                          <div class="product-review-n-price-sec mt-2 mb-1 d-flex justify-content-between d-flex justify-content-between">
                              <div class="d-flex align-items-baseline">
                                  <i class="fas fa-star product-star"></i>
                                  <i class="fas fa-star product-star"></i>
                                  <i class="fas fa-star product-star"></i>
                                  <i class="fas fa-star product-star"></i>
                                  <i class="fas fa-star product-half-star"></i>
                                  <i class="product-review-count"><span>(10 reviews)</span></i>
                              </div>
                              
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

                          <div class="product-add-n-wish-btn-sec">
                              <div class="product-add-to-cart-button">
                                  <a href="{{route('front.product',[$product->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
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
</section>

@endsection
@section('extra-js')

@endsection