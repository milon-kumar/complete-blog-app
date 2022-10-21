<?php

use App\Models\Setting;
use Illuminate\Support\Str;

function ImageUpload($image,$path=null,$directory = null)
{
    if ($image){
        if (file_exists($path)){
            unlink($path);
        }
        if ($directory){
            $directory = "uploads/".$directory."/";
        }else{
            $directory = "uploads/";
        }
        $name = rand(100,10000).time().'.'.$image->extension();
        $image->move($directory,$name);
        $imageUrl = $directory.$path;
    }else{
        $imageUrl = $path;
    }

    return $imageUrl;
}


function backendSetting($key , $defaultValue = null){
    return Setting::getByKey($key,$defaultValue);
}
