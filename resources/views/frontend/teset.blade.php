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