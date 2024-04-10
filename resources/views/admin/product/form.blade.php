<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" value="{{isset($product)?$product->name:(old('name'))}}" name="name" id="name" class="form-control" placeholder="Product Name">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ isset($product) && $product->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
   
    <div class="col-md-12">
        <div class="form-group">
            <label for="status">@lang('Status')</label>
            <select class="form-control" name="status" id="status">
                <option
                    {{ isset($product) && $product->status == 'in_stock' ? 'selected' : (old('status') == 'in_stock' ? 'selected' : '') }}
                    value="in_stock">In stock</option>
                <option
                    {{ isset($product) && $product->status == 'stock_out' ? 'selected' : (old('status') == 'stock_out' ? 'selected' : '') }}
                    value="stock_out">Stock out</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Description</label>
            <textarea name="description" id="" cols="4" rows="4"class="form-control summernote" placeholder="Description">{{isset($product)?$product->description:(old('description'))}}</textarea>
        </div>
    </div>									
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Short Description</label>
            <textarea name="short_description" id="" cols="4" rows="4"class="form-control summernote" placeholder="Short Description">{{isset($product)?$product->short_description:(old('short_description'))}}</textarea>
        </div>
    </div>									

    <div class="col-md-12">
        <div>SEO Optimized Section</div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="mb-3">
            <label for="name">Meta Title</label>
            <input type="text" value="{{isset($product)?$product->meta_title:(old('meta_title'))}}" name="meta_title" id="name" class="form-control" placeholder="Enter Meta Title">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Description</label>
            <textarea name="meta_description" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Description">{{isset($product)?$product->meta_description:(old('meta_description'))}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Keywords</label>
            <textarea name="meta_keywords" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Keywords">{{isset($product)?$product->meta_keywords:(old('meta_keywords'))}}</textarea>
        </div>
    </div>	
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Is Enable for Special Offer <span>%</span></label>
            <input type="text" value="{{isset($product)?$product->offer:(old('offer'))}}" name="offer" id="name" class="form-control" placeholder="Enter product offer ex:20">	
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Regular price</label>
            <input type="text" value="{{isset($product)?$product->regular_price:(old('regular_price'))}}" name="regular_price" id="regular_price" class="form-control" placeholder="regular price">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Discount price</label>
            <input type="number" value="{{isset($product)?$product->discount_price:(old('discount_price'))}}" name="discount_price" id="discount_price" class="form-control" placeholder="Discount price">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Weight</label>
            <input type="text" value="{{isset($product)?$product->weight:(old('weight'))}}" name="weight" id="weight" class="form-control" placeholder="weight">	
        </div>
    </div> --}}

    @if(isset($productVariations) && $productVariations)
    @php $v_counter=767898;
    @endphp
     <div class="row">
        <div class="col-md-12">
             <button type="button" class="btn btn-info btn-sm float-right add-variation-btn" id="add-variation">Add More Variation</button>
        </div>
    </div>
    @foreach($productVariations as $v_key => $variation)
    @php $v_counter++; $v_key++; @endphp
    <div class="col-lg-12">

        <div class="row" id="form_column_{{$v_counter}}">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Regular Price</label>
                    <input type="text"  class="form-control" value="{{isset($variation->regular_price)?$variation->regular_price:''}}" id="v-regular_price" name="regular_price[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Discount Price</label>
                    <input type="text"  class="form-control" value="{{isset($variation->discount_price)?$variation->discount_price:''}}" id="v-discount_price" name="discount_price[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Weight</label>
                    <input type="text" value="{{isset($variation->weight)?$variation->weight:''}}"  class="form-control" id="v-weight" name="weight[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Type:</label>
                    <input type="text" value="{{isset($variation->type)?$variation->type:''}}"  class="form-control" id="variation_type" name="type[]" required>
                </div>
            </div>
            @php
                  $variation = json_decode($variation->variant_image, true);
            @endphp
        
            <div class="col-md-12">
                <button type="button" data-id="{{$v_counter}}" class="btn btn-info btn-sm float-right remove-variation-button" id="remove-variation-btn">X</button>
           </div>
        </div>
        <div id="edit-variations-container">
            
        </div>
    </div>
    @endforeach
    @else
    <div class="col-lg-12">

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Regular Price</label>
                    <input type="text"  class="form-control" id="v-regular_price" name="regular_price[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Discount Price</label>
                    <input type="text"  class="form-control" id="v-discount_price" name="discount_price[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Weight</label>
                    <input type="text"  class="form-control" id="v-weight" name="weight[]" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="variation_type">Type:</label>
                    <input type="text"  class="form-control" id="variation_type" name="type[]" required>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-12">
                 <button type="button" class="btn btn-info btn-sm float-right" id="add-variation">Add More Variation</button>
            </div>
        </div>

        <div id="variations-container">
            
        </div>
    </div>

   @endif
  
    <div class="col-md-6">
        @if(isset($product) && isset($product->image))
        @php $counter=7678;
        $product_images = json_decode($product->image, true);
        // dd($product_images);
        @endphp
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-right btn-sm add-more-product-img-btn">Add More Image</button>
            </div>
        </div>
        @foreach ($product_images as $key => $img)
       
        @php $counter++; $key++; @endphp
        <div class="row align-items-center" id="form_column_{{$counter}}">
            <div class="col-md-8">
    
                <div class="form-group">
                    <label for="image">@lang('Image') {{$key}} </label>
                    <input type="file" name="product_image[]" class="form-control" id="image">
                </div>
                {{-- <input type="hidden" value="{{isset($img)?$img:''}}"
                name="pre_product_img[]" class="form-control"> --}}
            </div>
            <div class="col-md-4">
            <button type="button" class="btn btn-danger btn-sm mt-4 remove_product_btn"
            data-id="{{$counter}}">X</button>
        </div>
        </div>
        @endforeach
    @else
        <div class="row align-items-center">
            <div class="col-md-8">
    
                <div class="form-group">
                    <label for="image">@lang('Image')</label>
                    <input type="file" name="product_image[]" class="form-control" id="image">
                </div>
                {{-- <input type="hidden" value="{{isset($product->image)?$product->image:''}}"
                name="pre_product_img[]" class="form-control"> --}}
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-sm add-more-product-img-btn">Add More Image</button>
            </div>
        </div>
        
        @endif
        <div id="more-product-image">
    
        </div>
     </div>							
</div>