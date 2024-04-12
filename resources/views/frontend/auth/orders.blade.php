
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
            <div class="col-lg-3">
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
            <div class="col-lg-9">
                <div class="card">
                    @php
                        $auth = auth('customer')->user();
                    @endphp
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                    </div>
                    <div class="card-body p-4 table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Products</th>
                                <th scope="col">total</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if (isset($customer_orders) && $customer_orders)

                                @foreach ($customer_orders as $customer_order)
                                <tr>
                                    <th scope="row">{{$customer_order->order_number}}</th>
                                    <td>
                                        <ul>
                                            @foreach($customer_order->order_items as $item)
                                            <li>{{ $item->product->name }} ({{$item->weight}}) Qty: ({{$item->quantity}})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>৳{{$customer_order->total}}</td>
                                    <td>
                                        @if($customer_order->status=='on_the_way')
                                        On the way
                                        @else
                                        {{ucfirst($customer_order->status)}}
                                        @endif
                                       
                                    </td>
                                    <td>
                                        @if ($customer_order->status=='pending')
                                        <a href="{{route('customer.order.status', ['id' => $customer_order->id]) }}" class="btn btn-danger btn-sm">Cancel</a>
                                        @endif
                                        
                                    </td>
                                  </tr>
                                @endforeach
                                    
                                @endif
                            
                           
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



