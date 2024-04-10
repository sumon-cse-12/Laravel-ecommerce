@extends('admin.layouts.app')

@section('title',trans('admin.template'))

@section('extra-css')

@endsection

@section('content')
    @php $template = json_decode(get_settings('template')); @endphp
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" role="form" id="planForm" action="{{route('admin.template.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="custom_body ">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('Slider Image')
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">Slider One <span class="text-danger">(@lang('Expecting image size'): 2880px by 840px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="slider_one_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">Slider Two <span class="text-danger">(@lang('Expecting image size'): 2880px by 840px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="slider_two_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">Slider Three <span class="text-danger">(@lang('Expecting image size'): 2880px by 840px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="slider_three_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">Slider Four <span class="text-danger">(@lang('Expecting image size'): 2880px by 840px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="slider_four_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="section_one_title">{{trans('Section One Title')}}</label>
                                            <input value="{{isset($template->section_one_title)?$template->section_one_title:''}}" type="text" name="section_one_title" class="form-control" id="section_one_title"
                                                   placeholder="{{trans('Enter Section One Title')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="section_two_title">{{trans('Section Two Title')}}</label>
                                            <input value="{{isset($template->section_two_title)?$template->section_two_title:''}}" type="text" name="section_two_title" class="form-control" id="section_one_title"
                                                   placeholder="{{trans('Enter Section Two Title')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="section_two_title">{{trans('Section Two Description')}}</label>
                                            <textarea class="form-control" name="section_two_des" id="" cols="4" rows="4" placeholder="Enter short description">{{isset($template->section_two_des)?$template->section_two_des:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="section_three_title">{{trans('Subscribe Title')}}</label>
                                            <input value="{{isset($template->subscribe_title)?$template->subscribe_title:''}}" type="text" name="subscribe_title" class="form-control" id="section_one_title"
                                                   placeholder="{{trans('Enter subscribe title')}}">
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">Subscribe Sec Image<span class="text-danger">(@lang('Expecting image size'): 2880px by 840px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="subscribe_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="section_two_title">{{trans('Subscribe Section Description')}}</label>
                                            <textarea class="form-control" name="subscribe_des" id="" cols="4" rows="4" placeholder="Enter short description">{{isset($template->subscribe_des)?$template->subscribe_des:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">Featured Section
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="featured_sec_title_one">{{trans('Featured Title One')}}</label>
                                            <input value="{{isset($template->featured_sec_title_one)?$template->featured_sec_title_one:''}}" type="text" name="featured_sec_title_one" class="form-control" id="featured_sec_title_one"
                                                   placeholder="{{trans('Title One')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('Featured Logo One') </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="featured_sec_img_one" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="about_us_description">@lang('Short Description One')</label>
                                            <textarea name="featured_sec_short_des_one" id="about_us_description" class="form-control"
                                                      placeholder="{{trans('Short Description One')}}">{{isset($template) && isset($template->featured_sec_short_des_one)?$template->featured_sec_short_des_one:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="about_us_title">{{trans('Featured Title Two')}}</label>
                                            <input value="{{isset($template->featured_sec_title_two)?$template->featured_sec_title_two:''}}" type="text" name="featured_sec_title_two" class="form-control" id="about_us_title"
                                                   placeholder="{{trans('Title Two')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('Featured Logo Two') </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="featured_sec_img_two" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="about_us_description">@lang('Short Description Two')</label>
                                            <textarea name="featured_sec_short_des_two" id="about_us_description" class="form-control"
                                                      placeholder="{{trans('Short Description Two')}}">{{isset($template) && isset($template->featured_sec_short_des_two)?$template->featured_sec_short_des_two:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="featured_sec_title_three">{{trans('Featured Title Three')}}</label>
                                            <input value="{{isset($template->featured_sec_title_three)?$template->featured_sec_title_three:''}}" type="text" name="featured_sec_title_three" class="form-control" id="featured_sec_title_three"
                                                   placeholder="{{trans('Title Three')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('Featured Logo Three') </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="featured_sec_img_three" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="about_us_description">@lang('Short Description Three')</label>
                                            <textarea name="featured_sec_short_des_three" id="about_us_description" class="form-control"
                                                      placeholder="{{trans('Short Description Three')}}">{{isset($template) && isset($template->featured_sec_short_des_three)?$template->featured_sec_short_des_three:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('Order Message')
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="section_one_title">{{trans('Order Success Message')}} </label>
                                            <textarea class="form-control" name="order_success_message" id="" cols="3" rows="3">{{isset($template->order_success_message)?$template->order_success_message:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('Footer Sec')
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="section_one_title">{{trans('Why Choose Us Sec')}} <span class="text-danger">Limited characters for displaying footer sec</span></label>
                                            <textarea class="form-control" name="footer_why_choose_us_sec" id="" cols="3" rows="3">{{isset($template->footer_why_choose_us_sec)?$template->footer_why_choose_us_sec:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                         {{-- <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">About Us
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="about_us_title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->about_us_title)?$template->about_us_title:''}}" type="text" name="about_us_title" class="form-control" id="about_us_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.background_image') <span class="text-danger">(@lang('Expecting image size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="about_us_bg_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="about_us_description">@lang('admin.page.description')</label>
                                            <textarea name="about_us_description" id="about_us_description" class="form-control"
                                                      placeholder="{{trans('admin.page.description')}}">{{isset($template) && isset($template->about_us_description)?$template->about_us_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                     
         {{--
                        <div class="custom_body d-none">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_features')</div>
                            </div>
                            <div class="card-body" id="add_row">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="offer_sec_title">{{trans('admin.main_title')}}</label>
                                            <input value="{{isset($template->main_title)?$template->main_title:''}}" type="text" name="main_title" class="form-control" id="main_title"
                                                   placeholder="{{trans('admin.main_title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="form-group">
                                            <label for="offer_sec_title">{{trans('admin.form.title')}}</label>
                                            <input value="" type="text" name="sec_four_title[]" class="form-control" id="sec_four_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <button id="plus" type="button" class="btn btn-primary float-right add-btn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.page.description')</label>
                                            <textarea name="sec_four_description[]" id="sec_four_description" class="form-control"
                                                      placeholder="{{trans('admin.page.description')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($template->sec_four_description) && isset($template->sec_four_title ))
                                    @foreach($template->sec_four_description as $key=>$secFourDescription)
                                        @foreach($template->sec_four_title as $keyOne=>$secFourtitle)
                                            @if($key == $keyOne && $secFourDescription && $secFourtitle)
                                                <div class="row" id="delete_row_{{$key}}">
                                                    <div class="col-lg-11">
                                                        <div class="form-group">
                                                            <label for="offer_sec_title">{{trans('admin.form.title')}}</label>
                                                            <input value="{{$secFourtitle}}" type="text" name="sec_four_title[]"
                                                                   class="form-control" id="sec_four_title"
                                                                   placeholder="{{trans('admin.form.title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 add-btn">
                                                        <div class="form-group">
                                                            <button type="button" data-number="{{$key}}"
                                                                    class="faq_row btn-sm btn-danger mt-1 d-block float-right">
                                                                <i class="fa fa-trash  c-pointer"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="description">@lang('admin.page.description')</label>
                                                            <textarea name="sec_four_description[]" id="sec_four_description"
                                                                      class="form-control"
                                                                      placeholder="{{trans('admin.page.description')}}">{{$secFourDescription}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_subscribe')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->subscribe_title)?$template->subscribe_title:''}}" type="text" name="subscribe_title" class="form-control" id="subscribe_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.page.description')}}</label>
                                            <textarea name="subscribe_description" id="description" class="form-control"
                                            placeholder="{{trans('admin.page.description')}}">{{isset($template->subscribe_description)?$template->subscribe_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">Privacy & Policy</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->privacy_and_policy_title)?$template->privacy_and_policy_title:''}}" type="text" name="privacy_and_policy_title" class="form-control" id="privacy_and_policy_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.page.description')}}</label>
                                            <textarea name="privacy_and_policy_des" id="description" class="form-control"
                                            placeholder="{{trans('admin.page.description')}}">{{isset($template->privacy_and_policy_des)?$template->privacy_and_policy_des:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">Return Policy</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->return_policy_title)?$template->return_policy_title:''}}" type="text" name="return_policy_title" class="form-control" id="return_policy_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.page.description')}}</label>
                                            <textarea name="return_policy_des" id="description" class="form-control"
                                            placeholder="{{trans('admin.page.description')}}">{{isset($template->return_policy_des)?$template->return_policy_des:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_body d-none">
                            <div class="card-header">
                                <div class="card-title font-title">Our Mission Section
                                    <i  data-toggle="tooltip" data-placement="right" class="fa fa-question-circle alert-tooltip"
                                        title="Admin can customize frontend template according to his needs."></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="our_mission_title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->our_mission_title)?$template->our_mission_title:''}}" type="text" name="our_mission_title" class="form-control" id="our_mission_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.background_image') <span class="text-danger">(@lang('Expecting image size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="our_mission_bg_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">Choose Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="our_mission_description">@lang('admin.page.description')</label>
                                            <textarea name="our_mission_description" id="our_mission_description" class="form-control"
                                                      placeholder="{{trans('admin.page.description')}}">{{isset($template) && isset($template->our_mission_description)?$template->our_mission_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">SEO Settings</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('Meta Title')}}</label>
                                            <input value="{{isset($template->meta_title)?$template->meta_title:''}}" type="text" name="meta_title" class="form-control" id="return_policy_title"
                                                   placeholder="{{trans('Enter Your Meta Title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('Meta Keywords')}}</label>
                                            <textarea name="meta_keywords" id="description" class="form-control"
                                            placeholder="{{trans('Enter Your Meta Keywords')}}">{{isset($template->meta_keywords)?$template->meta_keywords:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('Meta Description')}}</label>
                                            <textarea name="meta_description" id="description" class="form-control"
                                            placeholder="{{trans('Enter Your Meta Description')}}">{{isset($template->meta_description)?$template->meta_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('extra-scripts')
    <script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script !src="">
        "use strict";
        $('#planForm').validate({
            rules: {
                question: {
                    required: true
                },
                answer: {
                    required: true
                },
                status: {
                    required: true
                },
            },
            messages: {
                question: { required:"Please provide plan title"},
                answer:  { required:"Please provide sms limit"},
                status:  { required:"Please select a status"}
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        let rowNumber = 1;

        $(document).on('click', '#plus', function (e){
            rowNumber++
            $('#add_row').prepend(`<div class="row" id="delete_row_${rowNumber}">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label for="offer_sec_title">{{trans('admin.form.title')}}</label>
                                        <input value="" type="text" name="sec_four_title[]" class="form-control" id="sec_four_title"
                                               placeholder="{{trans('admin.form.title')}}">
                                    </div>
                                </div>
                                <div class="col-lg-1 add-btn">
                                    <div class="form-group">
                                        <button type="button" data-number="${rowNumber}" class="faq_row btn-sm btn-danger mb-2 d-block float-right"><i class="fa fa-trash  c-pointer" ></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description">@lang('admin.page.description')</label>
                                        <textarea name="sec_four_description[]" id="sec_four_description" class="form-control"
                                                  placeholder="{{trans('admin.page.description')}}">{{isset($page) && $page->description?$page->description:old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>`);
        });

        $(document).on('click', '.faq_row', function (e){
            const number =$(this).attr('data-number');

            $('#delete_row_'+ number).remove();
        });
    </script>
@endsection

