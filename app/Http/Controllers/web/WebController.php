<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\otpVerifcation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Config;

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;

class WebController extends Controller
{
    public function products(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['products'] = Product::with('category:id,name')->latest('id')->get()->toArray();
        $data['categories'] = Category::withCount('products')->latest('id')->get()->toArray();

        return view('web.pages.products',$data);
    }

    public function product(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
         $data['product'] = Product::with('category:id,name')->findOrFail($request->id)->toArray();
         $data['rel_products'] = Product::where(['category_id' => $data['product']['category_id']])->take(4)->latest('id')->get()->toArray();
        return view('web.pages.product',$data);
    }

    public function bmi_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.bmi_form',$data);
    }

    public function consultation_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.consultation_form',$data);
    }

    public function regisration_from(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if(auth()->user()){
            return view('web.pages.consultation_form',$data);
        }else{
            return view('web.pages.regisration_from',$data);
        }
    }

    public function regisration_from2(Request $request)
    {
        return view('web.pages.regisration_from2');
    }

}
