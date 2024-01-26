<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apperenceController extends Controller
{
    public function index()
    {
        // return view('admin.pages.dashboard');
    }

    public function menus()
    {
        return view('admin.pages.menus');
    }
}
