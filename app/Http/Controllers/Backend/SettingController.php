<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('backend.setting.index');
    }

    public function appearance()
    {
        return view('backend.setting.appearance');
    }

    public function appearanceStore(Request $request)
    {
        self::validate($request,[
            'b_text_logo' =>'required|max:15',
        ]);

        Setting::updateOrCreate(['key'=>'b_text_logo'],['value'=>$request->input('b_text_logo')]);

        toast('Text Logo Update Success','success');
        return redirect()->back();
    }

    public function appearanceStoreFrontend(Request $request)
    {
        self::validate($request,[
            'f_text_logo' =>'required|max:15',
        ]);

        Setting::updateOrCreate(['key'=>'f_text_logo'],['value'=>$request->input('f_text_logo')]);

        toast('Text Logo Update Success','success');
        return redirect()->back();
    }

    public function table()
    {
        return backendSetting('appname','This is a default value');
    }

    public function generalStore(Request $request)
    {

        self::validate($request,[
            'site_title'=>'required|max:50',
            'site_description'=>'required|max:5550',
            'site_address'=>'required',
            'site_email'=>'required|email',
            'site_phone_number'=>'required',
            'site_other_description'=>'nullable',
        ]);

        Setting::updateOrCreate(
            ['key'=>'site_title'],
            ['value'=>$request->input('site_title')]
        );

        Setting::updateOrCreate(
            ['key'=>'site_description'],
            ['value'=>trim($request->input('site_description'))]
        );

        Setting::updateOrCreate(
            ['key'=>'site_address'],
            ['value'=>trim($request->input('site_address'))]
        );

        Setting::updateOrCreate(
            ['key'=>'site_email'],
            ['value'=>$request->input('site_email')]
        );

        Setting::updateOrCreate(
            ['key'=>'site_phone_number'],
            ['value'=>$request->input('site_phone_number')]
        );

        Setting::updateOrCreate(
            ['key'=>'site_other_description'],
            ['value'=>$request->input('site_other_description')]
        );

        toast('Setting Updated','success');
        return redirect()->back();
    }

    public function publishedLogo(Request $request)
    {
        if ($request->f_logo_image == true){
            Setting::updateOrCreate(['key'=>'f_logo_image'],['value'=>true]);
        }else{
            Setting::updateOrCreate(['key'=>'f_logo_image'],['value'=>false]);
        }
        if ($request->b_logo_image==true){
            Setting::updateOrCreate(['key'=>'b_logo_image'],['value'=>true]);
        }else{
            Setting::updateOrCreate(['key'=>'b_logo_image'],['value'=>false]);
        }

        toast('Changes Updated','success');
        return redirect()->back();

    }
}
