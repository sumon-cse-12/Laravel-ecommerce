@extends('admin.layouts.app')
@section('extra-css')
@endsection
@section('content')
<section class="content-header">					
    <div class="container my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container">
        <form method="post" role="form" id="customerForm"  enctype="multipart/form-data" action="{{route('admin.product.update',[$product])}}">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body">								
                   @include('admin.product.form')
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- Main content -->
@endsection

@section('custom-js')
<script>
     let x = 1;
        $(document).on("click", ".add-more-product-img-btn", function (e) {
            console.log('pgppgppgpsts serestest');
            x++;
            let html = `<div class="row align-items-center" id="form_column_${x}">
                                       
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="product_image">Image ${x}</label>
                                                        <input type="file" name="product_image[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="button" class="btn btn-danger btn-sm mt-4 remove_product_img_btn" data-id="${x}">X</button>
                                                </div>

                                            </div>`;
            $("#more-product-image").append(html);
        });
    $(document).on('click', '.remove_product_img_btn', function (e) {
    const id = $(this).attr('data-id');
    $('#form_column_' + id).remove();
});
</script>
<script>
     let k = 10;
        $(document).on("click", ".add-variation-btn", function (e) {
            console.log('pgggggg');
            k++
            let html_element = `<div class="row align-items-center" id="form_column_${k}">
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
            <div class="col-md-12">
                 <button type="button" class="btn btn-danger btn-sm float-right" data-id="${k}" id="remove-variation">X</button>
            </div>
        </div>`;
            $("#edit-variations-container").append(html_element);
        });
        $(document).on('click', '.remove-variation-button', function (e) {
            const v_id = $(this).attr('data-id');
            $('#form_column_' + v_id).remove();

        });
</script>
@endsection