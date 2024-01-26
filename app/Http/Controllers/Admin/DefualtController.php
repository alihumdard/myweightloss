<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DefualtController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function profile_setting()
    {
        return view('admin.pages.profile_setting');
    }

    public function faq()
    {
        return view('admin.pages.faq');
    }

    public function contact()
    {
        return view('admin.pages.contact');
    }


}

