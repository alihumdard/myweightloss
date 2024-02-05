<?php

namespace App\Http\Controllers\Admin;

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

class SystemUsersController extends Controller
{
    protected $status;
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->status = config('constants.USER_STATUS');
    }

    public function index()
    {
        // return view('admin.pages.dashboard');
    }

    public function admins(Request $request)
    {
        $user = auth()->user();
        $page_name = 'admins';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['admins'] = User::where(['role' => user_roles('2')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.admins', $data);
    }

    public function categories()
    {
        $user = auth()->user();
        $page_name = 'categories';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['categories'] = Category::latest('id')->get()->toArray();
        }

        return view('admin.pages.categories', $data);
    }

    public function add_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['category'] = Category::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_category', $data);
    }

    public function store_category(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_category';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'publish'   => 'required',
            'name'     => [
                'required',
                Rule::unique('categories')->ignore($request->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $saved = Category::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'name'       => ucwords($request->name),
                'desc'       => $request->desc,
                'publish'    => $request->publish,
                'created_by' => $user->id,
            ]
        );
        $message = "category " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.categories')->with(['msg' => $message]);
        }
    }


    public function questions(Request $request)
    {
        $user = auth()->user();
        $page_name = 'questions';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['questions'] = Question::with(['assignments' => function ($query) {
                $query->select('category_id', 'category_title', 'question_id');
            }])->latest('id')->get()->toArray();
        }

        return view('admin.pages.questions', $data);
    }

    public function add_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['question']['assignments'] = [];
        $data['user'] = auth()->user();
        $data['categories'] = Category::latest('id')->get()->toArray();
        if ($request->has('id')) {
            $data['question'] = Question::with(['assignments' => function ($query) {
                $query->select('category_id', 'category_title', 'question_id');
            }])->findOrFail($request->id)->toArray();
            $categoryIds = [];
            foreach ($data['question']['assignments'] as $assignment) {
                $categoryIds[] = $assignment['category_id'];
            }
            $data['question']['assignments'] = $categoryIds;
        }

        return view('admin.pages.add_question', $data);
    }

    public function store_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'optA'    => 'required',
            'optB'    => 'required',
            'optC'    => 'required',
            'optD'    => 'required',
            'title'   => [
                'required',
                Rule::unique('questions')->ignore($request->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $saved = Question::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'title'      => ucwords($request->title),
                'optA'       => ucwords($request->optB),
                'optB'       => ucwords($request->optB),
                'optC'       => ucwords($request->optB),
                'optD'       => ucwords($request->optB),
                'created_by' => $user->id,
            ]
        );
        if ($saved->id) {

            if ($request->id) {
                AssignQuestion::where('question_id', $saved->id)->delete();
            }
            if ($request->category_id) {
                foreach ($request->category_id as $categoryId) {
                    AssignQuestion::create([
                        'category_id' => $categoryId,
                        'category_title' => Category::findOrFail($categoryId)->name,
                        'question_title' => $saved->title,
                        'question_id' => $saved->id,
                        'status'      => $this->status['Active'],
                        'created_by'  => $user->id,
                    ]);
                }
            }
            $message = "Question " . ($request->id ? "Updated" : "Saved") . " Successfully";
            return redirect()->route('admin.questions')->with(['msg' => $message]);
        }
    }

    public function assign_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'assign_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['questions'] = Question::latest('id')->get()->toArray();
            $data['categories'] = Category::latest('id')->get()->toArray();
        }

        return view('admin.pages.assign_question', $data);
    }

    public function get_assign_quest(Request $request)
    {
        $user = auth()->user();
        $page_name = 'assign_question';

        if (!view_permission($page_name)) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized']);
        }

        $questions = [];

        if (isset($user->role) && $user->role == user_roles('1') && $request->has('id')) {
            $questions = AssignQuestion::select('question_id', 'question_title')
                ->where('category_id', $request->id)
                ->pluck('question_title', 'question_id')
                ->toArray();
        }

        return response()->json(['status' => 'success', 'questions' => $questions]);
    }


    public function store_assign_quest(Request $request)
    {
        $user = auth()->user();
        $page_name = 'assign_question';

        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'question_id.*' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        // Delete previous records for the given category_id
        AssignQuestion::where('category_id', $request->category_id)->delete();

        // Loop through each question_id and insert new records
        foreach ($request->question_id as $questionId) {
            AssignQuestion::create([
                'category_id' => $request->category_id,
                'category_title' => Category::findOrFail($request->category_id)->name,
                'question_id'    => $questionId,
                'question_title' => Question::findOrFail($questionId)->title,
                'status'      => $this->status['Active'],
                'created_by'  => $user->id,
            ]);
        }

        $message = "Data Updated Successfully";
        return redirect()->route('admin.categories')->with(['msg' => $message]);
    }



    public function doctors(Request $request)
    {
        $user = auth()->user();
        $page_name = 'admins';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['doctors'] = User::where(['role' => user_roles('3')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.doctors', $data);
    }
    public function add_doctor(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_doctor';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['doctor'] = User::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_doctor', $data);
    }

    public function store_doctor(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_doctor';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'phone'      => 'required',
            'address'    => 'required',
            'speciality' => 'required',
            'role'       => 'required',
            'email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'name'       => ucwords($request->name),
                'email'      => $request->email,
                'role'       =>  $request->role,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'speciality' => $request->speciality,
                'short_bio'  => $request->short_bio,
                'zip_code'   => $request->zip_code,
                'city'       => $request->city,
                'password'   => Hash::make($request->password),
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ]
        );
        $message = "Doctor " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.doctors')->with(['msg' => $message]);
        }
    }

    public function users(Request $request)
    {
        $user = auth()->user();
        $page_name = 'users';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['users'] = User::where(['role' => user_roles('4')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.users', $data);
    }

    public function prodcuts(Request $request)
    {
        $user = auth()->user();
        $page_name = 'prodcuts';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['products'] = Product::with('category:id,name')->latest('id')->get()->toArray();
        }
        // dd($data['products']);
        return view('admin.pages.prodcuts',$data);
    }

    public function add_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['categories'] = Category::latest('id')->get()->toArray();
        if ($request->has('id')) {
            $data['product'] = Product::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_product',$data);
    }

    public function store_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'price'      => 'required',
            'category_id'=> 'required',
            'main_image' => [
                'required',
                'image', 
                'mimes:jpeg,png,jpg,gif', 
                'max:1024', 
                'dimensions:max_width=1000,max_height=1000', 
            ],
            'qty'        => 'required',
            'stock'      => 'required',
            'cnn'        => 'required',
            'ext_tax'    => 'required',
            'desc'       => 'required',
            'title'      => [
                'required',
                Rule::unique('products')->ignore($request->id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $data['user'] = auth()->user();
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . uniqid('', true) . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->storeAs('product_images/main_images', $mainImageName, 'public'); 
            $mainImagePath = 'product_images/main_images/' . $mainImageName;
        }
        
        // Create or update product
        $product = Product::updateOrCreate(
            ['id' => $request->id ?? null],
            [
                'title'      => ucwords($request->title),
                'desc'       => $request->desc,
                'main_image' => $mainImagePath ?? Product::findOrFail($request->id)->main_image,
                'category_id'=> $request->category_id,
                'ext_tax'    => $request->ext_tax,
                'cnn'        => $request->cnn,
                'stock'      => $request->stock,
                'qty'        => $request->qty,
                'price'      => $request->price,
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ]
        );
        

        // Handle image uploads
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('product_images', $imageName, 'public'); // Change 'product_images' to your storage folder
                $extImagePath = 'product_images/' . $imageName;

                $uploadedImages[] = $extImagePath;
            }
        }

        // Associate product attributes
        $productAttributesData = [];
        foreach ($uploadedImages as $uploadedImage) {
            $productAttributesData[] = [
                'product_id' => $product->id,
                'image'     => $uploadedImage,
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ];
        }

        ProductAttribute::insert($productAttributesData);

        $message = "Product " . ($request->id ? "Updated" : "Saved") . " Successfully";
        return response()->json(['status' => 'success', 'message' => $message, 'data' => []]);
    }

    public function add_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_admin';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['admin'] = User::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_admin', $data);
    }

    public function store_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_admin';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'role'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            [
                'name'       => ucwords($request->name),
                'email'      => $request->email,
                'role'       =>  $request->role,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'zip_code'   => $request->zip_code,
                'city'       => $request->city,
                'state'      => $request->state,
                'password'   => Hash::make($request->password),
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ]
        );
        $message = "Admin " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.admins')->with(['msg' => $message]);
        }
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
