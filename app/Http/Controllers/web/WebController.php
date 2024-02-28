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
use App\Models\Transaction;
use App\Models\UserBmi;
use App\Models\UserConsultation;

class WebController extends Controller
{
    public function products(Request $request)
    {
        $cat_id = $request->input('cat_id') ?? NULL;
        $data['user'] = auth()->user() ?? [];
        $query = Product::with('category:id,name')->latest('id');
        if ($cat_id) {
            $query->where('category_id', $cat_id);
        }
        $data['products'] = $query->get()->toArray();

        $data['categories'] = Category::withCount('products')->latest('id')->get()->toArray();

        return view('web.pages.products', $data);
    }

    public function product(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        $data['product'] = Product::with('category:id,name', 'variants')->findOrFail($request->id)->toArray();
        $data['rel_products'] = Product::where(['category_id' => $data['product']['category_id']])->take(4)->latest('id')->get()->toArray();
        return view('web.pages.product', $data);
    }

    public function bmi_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            $user = auth()->user();
            $bmiRecord = UserBmi::where('user_id', $user->id)
                ->latest('id')
                ->first();
            $data['bmi_detail'] = $bmiRecord ? $bmiRecord->toArray() : [];
            if ($data['bmi_detail']) {
                return view('web.pages.bmi_calculator', $data);
            } else {
                return view('web.pages.bmi_form', $data);
            }
        } else {
            return redirect()->route('web.regisrationFrom');
        }
    }

    public function consultation_form(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        return view('web.pages.consultation_form', $data);
    }

    public function consultation_store(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $product_id = $request->input('product_id') ?? NULL;
            $category_id = $request->input('category_id') ?? NULL;

            $questionAnswers = [];
            foreach ($request->all() as $key => $value) {
                $iteration = 1;
                if ($key === '_token' || $key === 'website' || $key === 'process') {
                    continue; // Skip unwanted keys
                }

                if ($key === 'question_3' && $value instanceof \Illuminate\Http\UploadedFile) {
                    // Handle image upload here
                    $imagePath = $value->store('images'); // You may need to customize the storage path
                    $questionAnswers['question_3'] = $imagePath;
                } elseif (strpos($key, 'question_') === 0) {
                    $question_id = substr($key, 9); // Extract question_id from the key
                    $questionAnswers[$question_id] = $value;
                }
            }

            $save =  UserConsultation::create([
                'user_id' => auth()->user()->id,
                'question_answers' => json_encode($questionAnswers),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                return redirect()->route('admin.index');
            }
        }
    }

    public function regisration_from(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            return redirect()->route('web.bmiForm');
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function product_question(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if (auth()->user()) {
            $data['product'] = Product::with(['category:id,name', 'category.questions'])
                ->findOrFail($request->id)
                ->toArray();
            $data['category'] =  $data['product']['category'];
            $data['questions'] =  $data['product']['category']['questions'];

            return view('web.pages.product_question', $data);
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function transaction_store(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $product_id = $request->input('product_id');
            $category_id = $request->input('category_id');

            $questionAnswers = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'qid_') === 0) {
                    $question_id = substr($key, 4); // Extract question_id from the key
                    $questionAnswers[$question_id] = $value;
                }
            }

            $save =  Transaction::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'category_id' => $category_id,
                'question_answers' => json_encode($questionAnswers),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                return redirect()->route('web.products', ['cat_id' => $category_id]);
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }


    public function bmi_formStore(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $weight = $request->weight;
            $height = $request->height / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);

            $save =  UserBmi::create([
                'user_id' => auth()->user()->id,
                'weight' => $request->weight,
                'height' => $request->height,
                'age' => $request->age,
                'gender' => $request->gender,
                'bmi' => $bmi,
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                return redirect()->route('web.bmiForm');
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function bmi_update(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            // dd($request->all());
            $weight = $request->weight;
            $height = $request->height / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);

            $save =  UserBmi::where('id', $request->id)
                ->update([
                    'user_id' => auth()->user()->id,
                    'weight' => $request->weight,
                    'height' => $request->height,
                    'bmi' => $bmi,
                    'status' => '1',
                    'created_by' => auth()->user()->id,
                ]);

            if ($save) {
                if($bmi >= 30){
                    return redirect()->route('web.consultationForm');
                }else{
                    return redirect()->route('web.bmiForm')->with(['status' => 'invalid', 'message' => "You can't proceed futher because You'r bmi is lower than 30."]);
                }
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }
}
