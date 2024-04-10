<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Settings;


class TemplateController extends Controller
{
    public function index(){
        return  view('admin.template.index');
    }

    public function store(Request $request){
        
        $data_template = auth()->user()->settings()->where('name','template')->first();
        if ($data_template && isset($data_template->value)){
            $template = json_decode($data_template->value);
        }

        //slider one

         if(isset($template) && isset($template->slider_one_image_file_name)){
            $request['slider_one_image_file_name'] = $template->slider_one_image_file_name;
         }
        if ($request->hasFile('slider_one_image')) {
            $file = $request->file('slider_one_image');
            $imageName = time() . '_1' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->slider_one_image_file_name)){
                $file_path = public_path('/uploads') . '/' . $template->slider_one_image_file_name;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
     
            $file->move(public_path('/uploads'), $imageName);
           $request['slider_one_image_file_name'] = $imageName;
        }
        //slider two
        if(isset($template) && isset($template->slider_two_image_file_name)){
            $request['slider_two_image_file_name'] = $template->slider_two_image_file_name;
         }
        if ($request->hasFile('slider_two_image')) {
            $file = $request->file('slider_two_image');
            $imageName = time() . '_12' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->slider_two_image_file_name)){
                $file_path = public_path('/uploads') . '/' . $template->slider_two_image_file_name;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $imageName);
           $request['slider_two_image_file_name'] = $imageName;
        }

        //slider three

        if(isset($template) && isset($template->slider_three_image_file_name)){
            $request['slider_three_image_file_name'] = $template->slider_three_image_file_name;
         }
        if ($request->hasFile('slider_three_image')) {
            $file = $request->file('slider_three_image');
            $imageName = time() . '_13' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->slider_three_image_file_name)){
                $file_path = public_path('/uploads') . '/' . $template->slider_three_image_file_name;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $imageName);
           $request['slider_three_image_file_name'] = $imageName;
        }
        //slider our

        if(isset($template) && isset($template->slider_four_image_file_name)){
            $request['slider_four_image_file_name'] = $template->slider_four_image_file_name;
         }
        if ($request->hasFile('slider_four_image')) {
            $file = $request->file('slider_four_image');
            $imageName = time() . '_14' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->slider_four_image_file_name)){
                $file_path = public_path('/uploads') . '/' . $template->slider_four_image_file_name;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $imageName);
           $request['slider_four_image_file_name'] = $imageName;
        }

        // subscribe sec image

        if(isset($template) && isset($template->subscribe_image_sec_file)){
            $request['subscribe_image_sec_file'] = $template->subscribe_image_sec_file;
         }
        if ($request->hasFile('subscribe_image')) {
            $file = $request->file('subscribe_image');
            $imageName = time() . '_1subs' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->subscribe_image_sec_file)){
                $file_path = public_path('/uploads') . '/' . $template->subscribe_image_sec_file;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $imageName);
           $request['subscribe_image_sec_file'] = $imageName;
        }

        // Featured Logo One
        if(isset($template) && isset($template->featured_sec_img_one_file)){
            $request['featured_sec_img_one_file'] = $template->featured_sec_img_one_file;
         }
        if ($request->hasFile('featured_sec_img_one')) {
            $file = $request->file('featured_sec_img_one');
            $f_one_imageName = time() . '_1f1' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->featured_sec_img_one_file)){
                $file_path = public_path('/uploads') . '/' . $template->featured_sec_img_one_file;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $f_one_imageName);
           $request['featured_sec_img_one_file'] = $f_one_imageName;
        }
        // Featured Logo two
        if(isset($template) && isset($template->featured_sec_img_two_file)){
            $request['featured_sec_img_two_file'] = $template->featured_sec_img_two_file;
         }
        if ($request->hasFile('featured_sec_img_two')) {
            $file = $request->file('featured_sec_img_two');
            $f_two_imageName = time() . '_1f_sec_2' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->featured_sec_img_two_file)){
                $file_path = public_path('/uploads') . '/' . $template->featured_sec_img_two_file;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $f_two_imageName);
           $request['featured_sec_img_two_file'] = $f_two_imageName;
        }
        // Featured Logo three
        if(isset($template) && isset($template->featured_sec_img_three_file)){
            $request['featured_sec_img_three_file'] = $template->featured_sec_img_three_file;
         }
        if ($request->hasFile('featured_sec_img_three')) {
            $file = $request->file('featured_sec_img_three');
            $f_three_imageName = time() . '_1fsec3' . '.' . $file->getClientOriginalExtension();
            if(isset($template) && isset($template->featured_sec_img_three_file)){
                $file_path = public_path('/uploads') . '/' . $template->featured_sec_img_three_file;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
        
            $file->move(public_path('/uploads'), $f_three_imageName);
           $request['featured_sec_img_three_file'] = $f_three_imageName;
        }

        if (isset($data_template) && $data_template->name == 'template'){
            $template = Settings::where('name', 'template')->first();
            $template->value = json_encode($request->only('slider_one_image_file_name','slider_two_image_file_name',
            'slider_three_image_file_name','slider_four_image_file_name',
            'section_one_title','section_two_title','section_two_des','subscribe_title',
            'subscribe_image_sec_file','subscribe_des','featured_sec_title_one',
            'featured_sec_title_two','featured_sec_title_three','featured_sec_short_des_one','featured_sec_short_des_two','featured_sec_short_des_three',
            'featured_sec_img_one_file','featured_sec_img_two_file','featured_sec_img_three_file','footer_why_choose_us_sec','order_success_message'));
            $template->save();
        }else{
            $template = new Settings();
            $template->name = 'template';
            $template->value = json_encode($request->only('slider_one_image_file_name',
            'slider_two_image_file_name','slider_three_image_file_name','slider_four_image_file_name',
            'section_one_title','section_two_title','section_two_des','subscribe_title',
            'subscribe_image_sec_file','subscribe_des','featured_sec_title_one',
            'featured_sec_title_two','featured_sec_title_three','featured_sec_short_des_one','featured_sec_short_des_two','featured_sec_short_des_three',
            'featured_sec_img_one_file','featured_sec_img_two_file','featured_sec_img_three_file','footer_why_choose_us_sec','order_success_message'));
            $template->admin_id = auth()->user()->id;
            $template->save();
        }
        cache()->flush();
        return redirect()->back()->with('success','Template successfully update');
    }
   
}
