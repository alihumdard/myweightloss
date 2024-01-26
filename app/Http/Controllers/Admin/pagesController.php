<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class pagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function allpages()
    {
        return view('admin.pages.allpages');
    }

    public function addpage()
    {
        return view('admin.pages.addpage');
    }

    public function setting()
    {
        $largeLogoSetting = Setting::where('type', 'Large Logo')->first();
        $mediumLogoSetting = Setting::where('type', 'Medium Logo')->first();
        $smallLogoSetting = Setting::where('type', 'Small Logo')->first();
        $sociallinks = Setting::where('section', 'social_links')->get()->toArray();
   
        
 

        if ($largeLogoSetting || $mediumLogoSetting || $smallLogoSetting) {
            $largeLogoImageUrl = asset("storage/{$largeLogoSetting->img_url}");

            $mediumLogoImageUrl = $mediumLogoSetting ? asset("storage/{$mediumLogoSetting->img_url}") : null;

           
            $smallLogoImageUrl = $smallLogoSetting ? asset("storage/{$smallLogoSetting->img_url}") : null;

            return view('admin.pages.setting', compact('largeLogoImageUrl', 'mediumLogoImageUrl', 'smallLogoImageUrl','sociallinks'));
        } else {
            return view('admin.pages.setting')->with('errorMessage', 'Large Logo type not found.');
        }

    }


}

