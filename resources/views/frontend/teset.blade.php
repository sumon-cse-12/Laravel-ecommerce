
    <div class="p-4 rounded bg-light">
        <div class="row align-items-center">
            <div class="col-6">
                @if(isset($best_selling_product->image) && $best_selling_product->image)
                @php
                    $images = json_decode($best_selling_product->image);
                    $singleImage = $images[0];
                @endphp
                <img src="{{asset('uploads/'.$singleImage->image)}}" class="img-fluid rounded-circle w-100" alt="">
            @endif
            </div>
            <div class="col-6">
                <a href="#" class="h5">Organic Tomato</a>
                <div class="d-flex my-3">
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4 class="mb-3">3.12 $</h4>
                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>Add to cart</a>
            </div>
        </div>
    </div>
