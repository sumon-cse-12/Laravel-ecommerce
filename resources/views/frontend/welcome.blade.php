@extends('frontend.layouts.app')

@section('extra-css')
<style>
.thankyou-wrapper-sec {
    width: 100%;
    height: auto;
    margin: auto;
    padding: 0px 30px 0px 30px;
    text-align: center;
}
.thankyou-wrapper-sec-content {
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
}
a.back-btn {
    background: rgb(129 196 8);
    color: #fff;
    border-radius: 5px;
    padding: 8px 14px;
}

    </style>
@endsection
@section('main-content')
@php $template = json_decode(get_settings('template'));  @endphp
<section class="section-10-login">
    <div class="main-container">
        <div class="login-process">
            <div class="login-main-container">
                <div class="thankyou-wrapper-sec">
                  <div class="thankyou-wrapper-sec-content">
                    {{isset($template->order_success_message)?$template->order_success_message:''}}
                  </div>
                      <a href="{{route('front.index')}}" class="back-btn">Back to home</a>
                      <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
              </div>
          </div>
          <div class="clr"></div>
      </div>
  </section>
@endsection
@section('extra-js')

@endsection