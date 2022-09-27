<?php

use App\Models\Setting;
use Illuminate\Support\Str;

function uploadImage($request){
    if ($request->hasFile('image')){
        $image = $request->file('image');
        $image_name = Str::random(10).'.'.$image->getClientOriginalExtension();
        $image-> move(public_path('uploads/'), $image_name);

        return  $image_name;

    }else{
        return 'default.jpg';
    }
}

function backendSetting($key , $defaultValue = null){
    return Setting::getByKey($key,$defaultValue);
}
