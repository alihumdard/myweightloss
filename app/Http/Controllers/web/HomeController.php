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

}
