<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('web.pages.home');

    }
    public function blogs(Request $request)
    {
        return view('web.pages.blogs');

    }
    public function contact_us(Request $request)
    {
        return view('web.pages.contact_us');

    }
    public function about_us(Request $request)
    {
        return view('web.pages.about_us');

    }

}
