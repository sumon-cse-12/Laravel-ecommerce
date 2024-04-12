@extends('frontend.layouts.app')
@section('main-content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.products') }}">Products</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5 mt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th scope="col">Products</th> --}}
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_price = 0;
                            $shipping_charge = 100;
                            // dd($cart_products);
                        @endphp
                        @foreach ($cart_products as $key => $cart_product)
                            @php
                                $total_price =
                                    $total_price + $cart_product['discount_price'] * $cart_product['quantity'];
                                $itemId = now();
                            @endphp
                            <tr>

                                {{-- <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th> --}}
                                <td>
                                    <p class="mb-0 mt-4">{{ isset($cart_product['name']) ? $cart_product['name'] : '' }} ({{$cart_product['weight']}})</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">
                                        ৳{{ isset($cart_product['discount_price']) ? $cart_product['discount_price'] : '' }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm  rounded-circle bg-light border sub"
                                                data-id={{ $cart_product['cart_item'] }}  data-product-id={{ $cart_product['id'] }}>
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            {{-- <button class="btn btn-sm btn-minus rounded-circle bg-light border sub" data-id={{$cart_product['id']}} >
                                        <i class="fa fa-minus"></i>
                                        </button> --}}
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm text-center border-0 qty-value"
                                            data-id="{{ $cart_product['cart_item'] }}" id="product_quantity_{{ $cart_product['cart_item'] }}"
                                            value="{{ $cart_product['quantity'] }}">

                                        <div class="input-group-btn">
                                            <button class="btn btn-sm  rounded-circle bg-light border add"
                                                data-id={{ $cart_product['cart_item'] }} data-product-id={{ $cart_product['id'] }}>
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            {{-- <button class="btn btn-sm btn-plus rounded-circle bg-light border add"  data-id={{$cart_product['id']}}>
                                        <i class="fa fa-plus"></i>
                                    </button> --}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">
                                        ৳{{ isset($cart_product['discount_price']) && $cart_product['quantity'] ? $cart_product['discount_price'] * $cart_product['quantity'] : '' }}
                                    </p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4"
                                        onclick="showConfirmationModal('{{ $cart_product['cart_item'] }}')">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
                    Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                              
                                <p class="mb-0">৳{{isset($total_price)?$total_price:'0'}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                               
                                <div class="">
                                    @if ($total_price < 1500)
                                    <p class="mb-0">৳{{$shipping_charge}}</p>
                                    @else
                                    <p class="mb-0">৳0.00</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 me-4">Shipping charge is free if your order above ৳1500</div>
                            {{-- <p class="mb-0 text-end">Shipping to Ukraine.</p> --}}
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            @if ($total_price < 1500)
                            <p class="mb-0 pe-4">৳{{isset($total_price)?$total_price + $shipping_charge:'0'}}</p>
                            @else
                            <p class="mb-0 pe-4">৳{{isset($total_price)?$total_price:'0'}}</p>
                            @endif
                        </div>
                        {{-- <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</button> --}}
                            <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" href="{{route('front.checkout.cart')}}">
                                Proceed Checkout
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
    <!-- Add this modal to your HTML -->

    <div class="modal" tabindex="-1" id="confirmationModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('extra-js')
    <script>

    </script>
@endsection
