<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemUsersController extends Controller
{
 
    public function index()
    {
        // return view('admin.pages.dashboard');
    }

    public function admins()
    {
        return view('admin.pages.admins');
    }

    public function categories()
    {
        return view('admin.pages.categories');
    }

    public function questions()
    {
        return view('admin.pages.questions');
    }

    public function doctors()
    {
        return view('admin.pages.doctors');
    }

    
    public function users()
    {
        return view('admin.pages.users');
    }


    public function prodcuts()
    {
        return view('admin.pages.prodcuts');
    }


    public function add_admin()
    {
        return view('admin.pages.add_admin');
    }

    public function add_doctor()
    {
        return view('admin.pages.add_doctor');
    }

    public function add_product()
    {
        return view('admin.pages.add_product');
    }

    public function assign_question()
    {
        return view('admin.pages.assign_question');
    }

    public function add_question()
    {
        return view('admin.pages.add_question');
    }

    public function add_category()
    {
        return view('admin.pages.add_category');
    }

    public function orders_recieved()
    {
        return view('admin.pages.orders_recieved');
    }

    public function doctors_approval()
    {
        return view('admin.pages.doctors_approval');
    }

    public function orders_confrimed()
    {
        return view('admin.pages.orders_confrimed');
    }

    public function orders_shiped()
    {
        return view('admin.pages.orders_shiped');
    }

}
