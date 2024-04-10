
@extends('frontend.layouts.app')
@section('main-content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                <li class="breadcrumb-item">Settings</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-10">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul id="account-panel" class="nav nav-pills flex-column" >
                    <li class="nav-item">
                        <a href="{{route('front.profile')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('front.customer.order')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag"></i> My Orders</a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{route('front.logout')}}" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card">
                    @php
                        $auth = auth('customer')->user();
                    @endphp
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{route('front.profile.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$auth->id}}">
                            <div class="row">
                                <div class="mb-3">               
                                    <label for="name">First Name</label>
                                    <input type="text" value="{{$auth->first_name}}" name="first_name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">               
                                    <label for="name">Last Name</label>
                                    <input type="text" value="{{$auth->last_name}}" name="last_name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">            
                                    <label for="email">Email</label>
                                    <input type="text" value="{{$auth->email}}" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-3">                                    
                                    <label for="phone">Phone</label>
                                    <input type="text" value="{{$auth->phone_number}}" name="phone" id="phone" placeholder="Enter Your Phone" class="form-control">
                                </div>
                                <div class="mb-3">                                    
                                    <label for="phone">Password</label>
                                    <input type="password" value="" name="phone" id="phone" class="form-control">
                                </div>
    
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



