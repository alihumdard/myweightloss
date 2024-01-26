<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DefualtController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');
    }



}

