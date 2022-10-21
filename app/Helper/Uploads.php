<?php


namespace App\Helper;


class Uploads
{
    private static $name,$directory,$path;

    public static function ImageUpload($image,$path=null,$directory = null)
    {
        if ($image){
            if (file_exists($path)){
                unlink($path);
            }
            if ($directory){
                self::$directory = "uploads/".$directory."/";
            }else{
                self::$directory = "uploads/";
            }
            self::$name = rand(100,10000).time().'.'.$image->extension();
            $image->move(self::$directory,self::$name);
            self::$path = self::$directory.self::$name;
        }else{
            self::$path = $path;
        }

        return self::$path;
    }
}
