@extends('frontend.layouts.app')
@section('extra-css')
<style>
    .alart-product-weight{
        color: red;
        font-size: 14px;
        font-weight: 600;
    }
</style>
@endsection
@section('main-content')
    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5 custom-margin-top">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            @php
                                $images = json_decode($product->image);
                            @endphp
                        
                            <div class="owl-carousel product-carousel justify-content-center">
                                @foreach ($images as $product_image)
                                    <div class="border border-primary rounded position-relative vesitable-item">
                                        <img src="{{ asset('uploads/' . $product_image->image) }}" class="img-fluid rounded" alt="Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <input type="hidden" id="single-p-id" value="{{$product->id}}">
                            <h4 class="fw-bold mb-3 mt-3">{{ isset($product->name) ? $product->name : '' }}</h4>
                            <p class="mb-3">Category: {{ isset($product->category->name) ? $product->category->name : '' }}
                            </p>
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
                                   <button type="button" data-v-discount-price={{$variation->discount_price}} id="product-v-weight_{{$key}}" class="product-weight-btn pdct-w-b">{{$variation->weight}}</button>
                                   @endforeach
                                </div>
                                <div class="alart-product-weight" id="alart-product-weight"></div>
                                <h5 class="fw-bold mb-3 mt-3" id="product-v-price">৳{{$v_price}}</h5>
                                @endif
                                
                            </div>
                            
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="mb-4">{!! isset($product->short_description) ? $product->short_description : '' !!}</p>
                            <div class="input-group quantity mb-5 d-none" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="javascript:void(0);" id="add-to-cart-btn"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i>Buy Product</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Description</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>{!! isset($product->description) ? $product->description : '' !!}</p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div
                                                    class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Weight</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{ isset($product->weight) ? $product->weight : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Country of Origin</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Bangladesh</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Quality</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Organic</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Сheck</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Healthy</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <div class="d-flex d-none">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Jason Smith</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                                humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                    <div class="d-flex d-none">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Sam Peters</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                                repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                        sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                        labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4"
                                            placeholder="Yur Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                            placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post
                                            Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <div class="input-group w-100 mx-auto d-flex mb-4">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="mb-4">
                                <h4>Categories</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    @if (isset($categories) && $categories)
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i
                                                            class="fas fa-apple-alt me-2"></i>{{ $category->name }}</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-4">Featured products</h4>
                            @if (isset($products) && $products)
                                @foreach ($products as $product)
                                    <div class="d-flex align-items-center justify-content-start mt-3">
                                        @if (isset($product->image) && $product->image)
                                            @php
                                                $images = json_decode($product->image);
                                                $singleImage = $images[0];
                                            @endphp
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="{{ asset('uploads/' . $singleImage->image) }}"
                                                    class="img-fluid rounded" alt="">
                                            </div>
                                        @endif

                                        <div>
                                            <h6 class="mb-2">{{ $product->name }}</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">৳{{ $product->discount_price }}</h5>
                                                <h5 class="text-danger text-decoration-line-through">
                                                    ৳{{ $product->regular_price }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                            <div class="d-flex justify-content-center my-4">
                                <a href="#"
                                    class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                    More</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0">Related products</h1>
            <div class="vesitable">
    
                <div class="owl-carousel related-product-carousel justify-content-center">
                    @if(isset($releted_products) && $releted_products)
                @foreach ($releted_products as $releted_product)
                    {{-- <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                @if(isset($releted_product->image) && $releted_product->image)
                                @php
                                    $images = json_decode($releted_product->image);
                                    $singleImage = $images[0];
                                @endphp
                                <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid custom-rounded-circle w-100" alt="">
                            @endif
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">{{$releted_product->name}}</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product-variant-sec-container">
                                    @if (isset($releted_product->variations) && $releted_product->variations)
                                    <div class="product-weight-sec">
                                        @php
                                            $v_price = 0;
                                        @endphp
                                       @foreach ($releted_product->variations as $key => $variation)
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
                    </div> --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="custom-product-cart">
                                <div class="product-card-body">
                                    <div class="product-card-img-sec-if-slider">
                                      @if(isset($releted_product->image) && $releted_product->image)
                                      @php
                                          $images = json_decode($releted_product->image);
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
                                                      {{$releted_product->name}}
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
                                        
                                                  @if (isset($releted_product->variations) && $releted_product->variations)
                                                      @php
                                                          $v_price = 0;
                                                      @endphp
                                                     @foreach ($releted_product->variations as $key => $variation)
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
                                                <a href="{{route('front.product',[$releted_product->slug])}}" class="product-add-to-cart-btn"> <i class="fa fa-shopping-bag me-2 text-primary"></i>Add To Cart</a>
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
    <!-- Single Product End -->
@endsection
@section('extra-js')
<script>
    $(document).ready(function() {

        // $(".product-weight-btn").trigger("click");

        $(".product-weight-btn").click(function() {
            $('.alart-product-weight').addClass('d-none');
            // Remove 'active' class from all weight buttons
            $(".product-weight-btn").removeClass("active");
            
            // Add 'active' class to the clicked button
            $(this).addClass("active");
            
            // Get the discount price and weight from the button's data attributes
            var discountPrice = $(this).data("v-discount-price");
            var weight = $(this).text().trim();
            
            // Update the product price display
            $("#product-v-price").text('৳' + discountPrice);
            
            // Set data attributes on the "Add to Cart" button
            $("#add-to-cart-btn").data("weight", weight).data("price", discountPrice);
        });

        // Add click event listener to "Add to Cart" button
        $("#add-to-cart-btn").click(function() {
            // Retrieve weight and price from data attributes
            var weight = $(this).data("weight");
            var price = $(this).data("price");
            const id = $("#single-p-id").val();
            if(weight && price){
                $('.alart-product-weight').addClass('d-none');
                addToCart(id, weight, price); 
            }else{
                $('.alart-product-weight').html('Please select product weight')
            }

            
        });
    });
</script>

@endsection
