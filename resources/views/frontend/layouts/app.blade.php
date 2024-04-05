<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Aribas care - Natural Organic Products</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        @if(get_settings('fab_icon'))
        <link rel="icon" href="{{asset('uploads/'.get_settings('fab_icon'))}}" type="image/x-icon">
         @endif
        <!-- Google Web Fonts -->
        
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->

        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
          {{-- <script src="{{ asset('frontend/js/lazyload.17.6.0.min.js') }}"></script> --}}
          @yield('extra-css')
    </head>

    <body>
        @php
        $app_section = get_settings('app_section') ? json_decode(get_settings('app_section')) : '';
       @endphp
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">{{isset($app_section->contact_address)?$app_section->contact_address:''}}</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">{{isset($app_section->email_address)?$app_section->email_address:''}}</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><strong class="text-white ms-2 fa fa-phone-alt fa-1x text-primary me-4"> 01737492682 </strong></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{route('front.index')}}" class="text-decoration-none navbar-brand">
                        @if(get_settings('app_logo'))
                     <img src="{{asset('uploads/'.get_settings('app_logo'))}}" class="logo-img" alt="logo">
                      @endif
                   </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('front.index')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{route('front.products')}}" class="nav-item nav-link">Products</a>
                            <a href="{{route('front.blogs')}}" class="nav-item nav-link">Skin Care Tips</a>
                            {{-- <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div> --}}
                            <a href="{{route('front.contact')}}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="{{ route('front.cart') }}" class="position-relative me-4 my-auto">
                                @php
        
                                $total_item = 0;
                            
                                if (session()->has('cart')) {
                            
                                    // Key exists, proceed to get the value
                            
                                    $carts = session()->get('cart');
                            
                                    if (isset($carts) && $carts) {
                            
                                        foreach ($carts as $key => $cart) {
                            
                                            $total_item = $total_item + $cart['quantity'];
                            
                                        }
                            
                                    }
                            
                                }
                            
                            @endphp
                             <i class="fa fa-shopping-bag fa-2x"></i>
                             <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ isset($total_item) ? $total_item : 0 }}</span>
                            </a>
                           
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->
        @yield('main-content')
      
     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="{{route('front.index')}}">
                          
                            <h1 class="text-primary mb-0">Aribas Care</h1>
                            <p class="text-secondary mb-0">Organic products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                            <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                        </div> --}}
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Important Link</h4>
                            @foreach(get_pages('footer') as $page)
                            <a class="btn-link" href="{{url($page->url)}}">{{$page->name}}</a>
                            @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: {{isset($app_section->contact_address)?$app_section->contact_address:''}}</p>
                        <p>Email: {{isset($app_section->email_address)?$app_section->email_address:''}}</p>
                        <p>Phone: {{isset($app_section->phone_number)?$app_section->phone_number:''}}</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="{{route('front.index')}}"><i class="fas fa-copyright text-light me-2"></i>Aribas Care</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="{{route('front.index')}}">Aribas Care</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

    
<!-- JavaScript Libraries -->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!-- Template Javascript -->
<script src="{{asset('frontend/js/main.js')}}"></script>

<script type="text/javascript">

 
$(document).on('click', '.add', function() {
    var rowId = $(this).attr('data-id');
    var quantityInput = $('#product_quantity_' + rowId);
    var quantity = parseInt(quantityInput.val());
    
    // Increment the quantity
    quantity++;
    // Update the quantity input field
    quantityInput.val(quantity);
    
    // Call a function to update the cart on the server
    updateCart(rowId, quantity);
});


$(document).on('click', '.sub', function() {
    var rowId = $(this).attr('data-id');
    var quantityInput = $('#product_quantity_' + rowId);
    var quantity = parseInt(quantityInput.val());

    // Decrement the quantity if greater than or equal to 2
    if (quantity > 0) {
        quantity--;
        // Update the quantity input field
        quantityInput.val(quantity);

        // Call a function to update the cart on the server
        updateCart(rowId, quantity);
    }
});


        // Function to update the cart on the server
        function updateCart(rowId, quantity) {
            $.ajax({
                type: "POST",
                url: '{{ route('front.update.cart') }}',
                data: {
                    rowId: rowId,
                    quantity: quantity,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                       if(response.status == true){
                        location.reload();
                       }
                }
            });
        }

        function showConfirmationModal(rowId) {
            $('#confirmationModal').modal('show'); // Show the confirmation modal

            // Event listener for when the delete button in the modal is clicked
            $('#confirmDelete').click(function() {
                deleteCart(rowId); // Call the deleteCart function with the rowId
            });
        }

        // JavaScript function to delete cart item
        function deleteCart(rowId) {
            $.ajax({
                type: "POST",
                url: '{{ route('front.delete.cart') }}',
                data: {
                    rowId: rowId,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        location.reload(); // Reload the page after successful deletion
                    }
                }
            });

            $('#confirmationModal').modal('hide'); // Hide the modal after clicking delete
        }
    function addToCart(id,weight,price) {
        console.log(id,weight,price);
        $.ajax({
            type: "POST",
            url: '{{ route('front.add.to.cart') }}',
            data: {
                product_id: id,
                product_weight: weight,
                product_price: price,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(res) {
                if (res.status == 'true') {
                    window.location.href = "{{ route('front.cart') }}";
                } else {
                    console.log('error');
                }
            }
        });
    }
</script>
@yield('extra-js')
</body>

</html>


