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
            <div class="col-lg-6 col-xl-4">
                <div class="p-4 rounded bg-light">
                    <div class="row align-items-center">
                        <div class="col-6">
                            @if(isset($product->image) && $product->image)
                            @php
                                $images = json_decode($product->image);
                                $singleImage = $images[0];
                            @endphp
                            <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid custom-rounded-circle w-100" alt="">
                        @endif
                        </div>
                        <div class="col-6">
                            <a href="#" class="h5">{{$product->name}}</a>
                            <div class="d-flex my-3">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="product-variant-sec-container">
                                @if (isset($product->variations) && $product->variations)
                                <div class="product-weight-sec">
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
                                </div>
                                <h5 class="fw-bold " id="product-v-price">৳{{$v_price}}</h5>
                                @endif
                            </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</a>
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