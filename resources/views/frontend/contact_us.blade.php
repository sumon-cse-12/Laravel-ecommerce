@extends('frontend.layouts.app')

@section('extra-css')

@endsection
@section('main-content')
@php
    $app_section = get_settings('app_section') ? json_decode(get_settings('app_section')) : '';
@endphp
 <!-- Contact Start -->
 <div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Get in touch</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        {{-- <iframe class="rounded w-100"
                        style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <iframe class="rounded w-100"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8643.388858287593!2d88.60054812230695!3d24.377916520257745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbef75c8800c2b%3A0x8bdde9cbbdb742af!2sBoalia%20Thana!5e0!3m2!1sen!2sbd!4v1710679806948!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="{{route('front.contact.us.store')}}" method="POST">
                        @csrf
                        <input type="text" name="name"  class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                        <input type="text" name="subject" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Subject">
                        <input type="email" name="email"  class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                        <textarea class="w-100 form-control border-0 mb-4" name="message" rows="5" cols="5" placeholder="Your Message"></textarea>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Address</h4>
                            <p class="mb-2"> {{isset($app_section->contact_address)?$app_section->contact_address:''}}</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Mail Us</h4>
                            <p class="mb-2"> {{isset($app_section->email_address)?$app_section->email_address:''}}</p>


                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Telephone</h4>
                            <p class="mb-2"> <a href="tel:01737492682">{{isset($app_section->phone_number)?$app_section->phone_number:''}}</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
@section('extra-js')

@endsection
