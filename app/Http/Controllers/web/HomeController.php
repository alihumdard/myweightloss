<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Principle;
use App\Models\RoadMap;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['principles'] = $this->principles(3); 
        $data['roadmaps']   = $this->roadmaps(7); 
        $data['largelogo']   = $this->largelogo(); 
        $data['smalllogo']   = $this->smalllogo(); 
        $data['mediumlogo']   = $this->mediumlogo(); 
        $data['socialmedia']   = $this->socialmedia(); 
        return view('web.pages.home', $data);

    }

    protected function principles($limit = NULL){
        $principles = Principle::where(['status' => 'Active'])->take($limit)->latest()->get()->toArray();
        if($principles){
            return $principles;
        }
        return [];
    }

    protected function roadmaps($limit = NULL){
        $principles = RoadMap::where(['status' => 'Active'])->take($limit)->latest()->get()->toArray();
        if($principles){
            return $principles;
        }
        return [];
    }
    protected function largelogo(){
        $largelogo = Setting::where('type', 'Large Logo')->value('img_url');
        if ($largelogo) {
            return asset("storage/$largelogo");
        } else {
            return 'assets/web/images/logo.png';
        }
    }
    protected function mediumlogo(){
        $mediumlogo = Setting::where('type', 'Medium Logo')->value('img_url');
        if ($mediumlogo) {
            return asset("storage/$mediumlogo");
        } else {
            return 'assets/web/images/logo.png';
        }
    }
    protected function smalllogo(){
        $smalllogo = Setting::where('type', 'small Logo')->value('img_url');
        if ($smalllogo) {
            return asset("storage/$smalllogo");
        } else {
            return 'assets/web/images/logo.png';
        }
    }
    protected function socialmedia(){
         $socialmedia = Setting::where('section', 'social_links')->get()->toArray();

        return $socialmedia;
        
    }
    
    protected function isValidImageUrl($url)
    {
        return $url && file_exists(public_path($url));
    }

}
