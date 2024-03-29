<div class="col-md-6 col-lg-4 col-xl-3">
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