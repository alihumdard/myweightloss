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
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionMapping;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\UserConsultation;
use App\Models\ConsultationQuestion;
use App\Models\UserBmi;
use App\Models\Comment;
use App\Models\shippedOrder;

class SystemController extends Controller
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

    // system roles .... Super Admin, Dispensary, Doctor,User, 
    public function admins(Request $request)
    {
        $user = auth()->user();
        $page_name = 'dispensaries';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['admins'] = User::where(['role' => user_roles('2')])->latest('id')->get()->toArray();
        }

        return view('admin.pages.admins', $data);
    }

    public function add_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_dispensary';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();
        $data['state_list'] = STATE_LIST();
        if ($request->has('id')) {
            $data['admin'] = User::findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_admin', $data);
    }

    public function store_admin(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_dispensary';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'role'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
        ];
        if (!isset($request->id)) {
            $rules['password'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $updateData = [
            'name'       => ucwords($request->name),
            'email'      => $request->email,
            'role'       =>  $request->role,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'zip_code'   => $request->zip_code,
            'city'       => $request->city,
            'status'     => $this->status['Active'],
            'created_by' => $user->id,
        ];
        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            $updateData
        );
        $message = "Admin " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.admins')->with(['msg' => $message]);
        }
    }

    // doctors managment ...
    public function doctors(Request $request)
    {
        $user = auth()->user();
        $page_name = 'doctors';
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

        $rules = [
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
        ];

        if (!isset($request->id)) {
            $rules['password'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $updateData = [
            'name'       => ucwords($request->name),
            'email'      => $request->email,
            'role'       => $request->role,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'speciality' => $request->speciality,
            'short_bio'  => $request->short_bio,
            'zip_code'   => $request->zip_code,
            'city'       => $request->city,
            'status'     => $this->status['Active'],
            'created_by' => $user->id,
        ];
        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $saved = User::updateOrCreate(
            ['id' => $request->id ?? NULL],
            $updateData
        );
        $message = "Doctor " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.doctors')->with(['msg' => $message]);
        }
    }

    //users management ...
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

    // categories managment ...
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

    // question management ...
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
            'anwser_set' => 'required',
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
                'anwser_set' => $request->anwser_set,
                'openbox'    => $request->openbox ?? NULL,
                'yes_lable'  => ucwords($request->yes_lable) ?? NULL,
                'no_lable'   => ucwords($request->no_lable) ?? NULL,
                'optA'       => ucwords($request->optA) ?? NULL,
                'optB'       => ucwords($request->optB) ?? NULL,
                'optC'       => ucwords($request->optC) ?? NULL,
                'optD'       => ucwords($request->optD) ?? NULL,
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

    // question assignment manament...
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
        foreach ($request->question_id ?? [] as $questionId) {
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
        return redirect()->back()->with(['msg' => $message, 'category_id' => $request->category_id]);
    }

    // Question Mapping
    public function question_mapping(Request $request)
    {
        // Question mapping which question is next base on answer
        $user = auth()->user();
        $page_name = 'question_mapping';

        // if (!view_permission($page_name)) {
        //     return redirect()->back();
        // }

        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'question_id.*' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user'] = auth()->user();

        $options = ['optA', 'optB', 'optC', 'optD', 'optY', 'optN', 'openBox', 'file'];

        foreach ($options as $option) {
            $value = $request->$option;

            // Check if the value is not null
            if ($value !== null && $value !== '') {
                $response = QuestionMapping::updateOrCreate(
                    [
                        'category_id' => $request->category_id,
                        'question_id' => $request->question_id,
                        'answer' => $option, // Store the option name in the 'answer' column
                    ],
                    [
                        'category_id' => $request->category_id,
                        'question_id' => $request->question_id,
                        'answer'      => $option,
                        'next_question' => $value, // Store the value in the 'nextquestion' column
                        'status'      => 1,
                        'created_by'  => $user->id
                    ]
                );
                // Update AssignQuestion model
                AssignQuestion::where('category_id', $request->category_id)
                    ->where('question_id', $value)
                    ->update(['is_dependent' => 1]);
            }
        }

        $message = "Data Saved Successfully";
        return redirect()->back()->with(['msg' => $message]);
    }

    public function question_detail(Request $request)
    {
        $question_id = $request->id;
        $category_id = $request->categoryId;
        $result['detail'] = Question::findOrFail($question_id)->toArray();

        $result['other_qstn'] = AssignQuestion::join('assign_questions as tbl2', function ($join) use ($question_id) {
            $join->on('assign_questions.category_id', '=', 'tbl2.category_id')
                ->where('tbl2.question_id', '!=', $question_id);
        })
            ->select('tbl2.question_id', 'tbl2.question_title')
            ->where('assign_questions.question_id', $question_id)
            ->where('assign_questions.category_id', $category_id)
            ->pluck('tbl2.question_title', 'tbl2.question_id')
            ->toArray();
        $result['other_qstn']['not_continue'] = 'Stop the user from continuing';
        // dd(DB::getQueryLog());
        return response()->json(['status' => 'success', 'result' => $result]);
    }

    public function get_next_question(Request $request)
    {
        $question_id = $request->id;
        $category_id = $request->categoryId;
        $answer = $request->answer;
        $result['detail'] = Question::findOrFail($question_id)->toArray();

        $result['other_qstn'] = AssignQuestion::join('assign_questions as tbl2', function ($join) use ($question_id) {
            $join->on('assign_questions.category_id', '=', 'tbl2.category_id')
                ->where('tbl2.question_id', '!=', $question_id);
        })
            ->select('tbl2.question_id', 'tbl2.question_title')
            ->where('assign_questions.question_id', $question_id)
            ->where('assign_questions.category_id', $category_id)
            ->pluck('tbl2.question_title', 'tbl2.question_id')
            ->toArray();

        return response()->json(['status' => 'success', 'result' => $result]);
    }

    // products managment...
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
        return view('admin.pages.prodcuts', $data);
    }

    public function add_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['categories'] = Category::latest('id')->get()->toArray();
        $data['product'] = [];
        if ($request->has('id')) {
            $data['product'] = Product::with('variants')->findOrFail($request->id)->toArray();
        }

        return view('admin.pages.add_product', $data);
    }

    public function store_product(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_product';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $rules = [
            'price'      => 'required',
            'category_id' => 'required',
            'stock'      => 'required',
            'desc'       => 'required',
            'short_desc' => 'required',
            'title'      => [
                'required',
                Rule::unique('products')->ignore($request->id),
            ],
        ];

        if ($request->id == null || !$request->id) {
            $rules['main_image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                'dimensions:max_width=1000,max_height=1000',
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $data['user'] = auth()->user();
        if ($request->hasFile('main_image')) {

            $rules['main_image'] = [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                'dimensions:max_width=1000,max_height=1000',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()]);
            }

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
                'short_desc' => $request->short_desc,
                'main_image' => $mainImagePath ?? Product::findOrFail($request->id)->main_image,
                'category_id' => $request->category_id,
                'ext_tax'    => $request->ext_tax ?? '',
                'barcode'    => $request->barcode,
                'SKU'        => $request->SKU,
                'stock'      => $request->stock,
                'price'      => $request->price,
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ]
        );

        if ($product) {

            // Handle image uploads
            $uploadedImages = [];
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('product_images', $imageName, 'public'); // Change 'product_images' to your storage folder
                    $extImagePath = 'product_images/' . $imageName;

                    $uploadedImages[] = $extImagePath;
                }

                // Associate product attributes
                foreach ($uploadedImages as $uploadedImage) {
                    $productAttributesData[] = [
                        'product_id' => $product->id,
                        'image'      => $uploadedImage,
                        'status'     => $this->status['Active'],
                        'created_by' => $user->id,
                    ];
                }

                DB::table('product_attributes')->insert($productAttributesData);
            }


            // new variant
            if ($request['vari_value'] ?? NULL) {
                // handle the product variations .....
                $valueArr = $request['vari_value'];
                $priceArr = $request['vari_price'];
                $skuArr   = $request['vari_sku'];
                $nameArr  = $request['vari_name'];
                $barcodeArr   = $request['vari_barcode'];
                $inventoryArr = $request['vari_inventory'];
                foreach ($skuArr as $key => $val) {

                    $productAttrArr['product_id'] = $product->id;
                    $productAttrArr['title'] = $nameArr[$key];
                    $productAttrArr['price'] = $priceArr[$key];
                    $productAttrArr['value'] = $valueArr[$key];
                    $productAttrArr['barcode'] = $barcodeArr[$key];
                    $productAttrArr['inventory'] = $inventoryArr[$key];
                    $productAttrArr['sku'] = $skuArr[$key];

                    // Correcting the array key for variant images
                    if ($request->hasFile("vari_attr_images.$key")) {
                        $vari_Image = $request->file("vari_attr_images.$key");
                        $vari_ImageName = time() . '_' . uniqid('', true) . '.' . $vari_Image->getClientOriginalExtension();
                        $vari_Image->storeAs('product_images/main_images', $vari_ImageName, 'public');
                        $vari_ImagePath = 'product_images/main_images/' . $vari_ImageName;
                        $productAttrArr['image'] = $vari_ImagePath;
                    }

                    DB::table('product_variants')->insert($productAttrArr);
                }
            }

            // update variant
            if ($request['exist_vari_value'] ?? NULL) {
                // handle the product variations .....
                $idArrExist = $request['exist_vari_id'];
                $valueArrExist = $request['exist_vari_value'];
                $priceArrExist = $request['exist_vari_price'];
                $skuArrExist   = $request['exist_vari_sku'];
                $nameArrExist  = $request['exist_vari_name'];
                $barcodeArrExist   = $request['exist_vari_barcode'];
                $inventoryArrExist = $request['exist_vari_inventory'];
                if ($request->hasFile('exist_vari_attr_images')) {
                    foreach ($request->file('exist_vari_attr_images') as $variantId => $image) {
                        if ($image) {
                            $variImageNameExist = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
                            $variImagePathExist = $image->storeAs('product_images/main_images', $variImageNameExist, 'public');

                            $productAttrImage = ['image' => $variImagePathExist];

                            DB::table('product_variants')
                                ->where('id', $variantId)
                                ->update($productAttrImage);
                        }
                    }
                }
                foreach ($skuArrExist as $key1 => $val1) {

                    $id = $idArrExist[$key1];
                    $productAttrArrE['title'] = $nameArrExist[$key1];
                    $productAttrArrE['price'] = $priceArrExist[$key1];
                    $productAttrArrE['value'] = $valueArrExist[$key1];
                    $productAttrArrE['barcode'] = $barcodeArrExist[$key1];
                    $productAttrArrE['inventory'] = $inventoryArrExist[$key1];
                    $productAttrArrE['sku'] = $skuArrExist[$key1];

                    DB::table('product_variants')
                        ->where('id', $id)
                        ->update($productAttrArrE);
                }
            }
        }

        $message = "Product " . ($request->id ? "Updated" : "Saved") . " Successfully";
        return response()->json(['status' => 'success', 'message' => $message, 'data' => []]);
    }

    // orders managment ...
    public function order_detail(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->id) {
            $id = base64_decode($request->id);
            $order = Order::with('user', 'shipingdetails', 'product', 'variant', 'product.category')->where(['id' => $id, 'payment_status' => 'Paid'])->first();
            if ($order) {
                $data['userOrders'] = Order::select('id')
                    ->where('user_id', $order->user->id)
                    ->where('id', '!=', $order->id)
                    ->get()
                    ->toArray();
                $data['order']  = $order->toArray() ?? [];
                // dd($data);
                return view('admin.pages.order_detail', $data);
            } else {
                return redirect()->back()->with('error', 'Order not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }

    public function consultation_view(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'consultation_view';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->uid && $request->pid) {
            $uid = base64_decode($request->uid);
            $pid = base64_decode($request->pid);
            $data['order']['id'] = base64_decode($request->oid);

            $userbodyPorfile = UserBmi::with('user')->where(['user_id' => $uid, 'status' => '1'])->latest('created_at')->latest('id')->first();
            if ($userbodyPorfile) {
                $data['body_profile'] = $userbodyPorfile;
                $userConsultation = UserConsultation::where(['user_id' => $uid, 'status' => '1'])->latest('created_at')->latest('id')->first();
                if ($userConsultation) {
                    $consutl_quest_ans = json_decode($userConsultation->question_answers, true);
                    $consult_quest_keys = array_keys(array_filter($consutl_quest_ans, function ($value) {
                        return $value !== null;
                    }));
                    $consult_questions = ConsultationQuestion::whereIn('id', $consult_quest_keys)->select('id', 'title', 'desc')->get()->toArray();
                    $consult_questions = collect($consult_questions)->mapWithKeys(function ($item) {
                        return [$item['id'] => $item];
                    });
                    $user_result = [];
                    foreach ($consutl_quest_ans as $quest_id => $ans) {
                        if (isset($consult_questions[$quest_id])) {
                            $user_result[] = [
                                'id' => $quest_id,
                                'title' => $consult_questions[$quest_id]['title'],
                                'desc' => $consult_questions[$quest_id]['desc'],
                                'answer' => $ans,
                            ];
                        }
                    }
                    $data['user_consult'] = $user_result;

                    $transaction = Transaction::where(['user_id' => $uid, 'product_id' => $pid, 'status' => '1'])->latest('created_at')->latest('id')->first();
                    if ($transaction) {
                        $question_ans = json_decode($transaction->question_answers, true);
                        $question_ids = array_keys($question_ans);
                        $questions = Question::whereIn('id', $question_ids)->select('id', 'title', 'openbox')->get()->toArray();

                        $questions = collect($questions)->mapWithKeys(function ($item) {
                            return [$item['id'] => $item];
                        });
                        $result = [];
                        foreach ($question_ans as $question_id => $answer) {
                            if (isset($questions[$question_id])) {
                                $result[] = [
                                    'id' => $question_id,
                                    'title' => $questions[$question_id]['title'],
                                    'desc' => $questions[$question_id]['openbox'],
                                    'answer' => $answer,
                                ];
                            }
                        }
                        $data['prodcut_consult'] = $result;
                        return view('admin.pages.consultation_view', $data);
                    } else {
                        return redirect()->back()->with('error', 'Transaction not found.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Transaction not found.');
                }
            } else {
                return redirect('/register');
            }
        } else {
            return redirect()->back();
        }
    }

    public function orders_recieved()
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where(['payment_status' => 'Paid', 'status' => 'Received'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $userIds = array_unique(Arr::pluck($orders, 'user.id'));
            $userOrdersData = Order::select('user_id', DB::raw('count(*) as total_orders'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }

        return view('admin.pages.orders_recieved', $data);
    }

    public function doctors_approval()
    {
        $data['user'] = auth()->user();
        $page_name = 'doctors_approval';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $orders = Order::with('user')->where('payment_status', 'Paid')->whereIn('status', ['Approved', 'Not_Approved'])->latest('created_at')->get()->toArray();
        if ($orders) {
            $userIds = array_unique(Arr::pluck($orders, 'user.id'));
            $userOrdersData = Order::select('user_id', DB::raw('count(*) as total_orders'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->get()
                ->toArray();
            $data['order_history'] = $userOrdersData;
            $data['orders'] = $orders;
        }
        return view('admin.pages.doctors_approval', $data);
    }

    public function orders_shiped()
    {
        return view('admin.pages.orders_shiped');
    }

    public function change_status(Request $request)
    {
        $data['user'] = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'id' => 'required|exists:orders,id',
            'status' => 'required',
            'hcp_remarks' => 'required',
        ]);

        // Retrieve the order
        $order = Order::findOrFail($validatedData['id']);
        $order->status = $validatedData['status'];
        $order->hcp_remarks = $validatedData['hcp_remarks'];
        $update = $order->save();
        if ($update) {
            return redirect()->route('admin.orderDetail', ['id' => base64_encode($validatedData['id'])]);
        }
        return redirect()->back();
    }



    // shiping the orders
    public function create_shiping_order(Request $request)
    {
        $user = auth()->user();
        $page_name = 'orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'id' => 'required|exists:orders,id'
        ]);

        $order = Order::with('user', 'shipingdetails', 'product', 'variant', 'product.category')->where(['id' => $request->id, 'payment_status' => 'Paid', 'status' => 'Approved'])->first();

        if ($order) {

            try {
                $order = $order->toArray() ?? [];
                $payload = $this->make_shiping_payload($order);
                $apiKey = env('ROYAL_MAIL_API_KEY');
                $client = new Client();
                $response = $client->post('https://api.parcel.royalmail.com/api/v1/orders', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $payload,
                ]);

                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                if ($statusCode == 200) {
                    $response = json_decode($body, true);
                    $shipped = [];
                    if ($response['createdOrders']) {
                        foreach ($response['createdOrders'] as $key => $val) {
                            $shipped[] = shippedOrder::create([
                                'user_id' => $order['user']['id'],
                                'order_id' => $order['id'],
                                'product_id' => $order['product']['id'],
                                'variant_id' => $order['variant']['id'] ?? NULL,
                                'order_identifier' => $val['orderIdentifier'],
                                'order_date' => $val['orderDate'],
                                'quantity' => $order['quantity'],
                                'cost' => $order['shiping_cost'],
                                'errors' => json_encode($val['errors'] ?? []) ?? NULL,
                                'status' => 'Shipped',
                                'created_by' => $user->id,
                            ]);
                        }
                    } 
                    if ($response['failedOrders']) {
                        foreach ($response['failedOrders'] as $key => $val) {
                            $shipped[] = shippedOrder::create([
                                'user_id' => $order['user']['id'],
                                'order_id' => $order['id'],
                                'product_id' => $order['product']['id'],
                                'variant_id' => $order['variant']['id'],
                                'order_identifier' => $val['orderIdentifier']  ?? NULL,
                                'order_date' => $val['orderDate'] ?? NULL,
                                'quantity' => $order['quantity'],
                                'cost' => $order['shiping_cost'],
                                'errors' => json_encode($val['errors'] ?? []),
                                'status' => 'ShippingFail',
                                'created_by' => $user->id,
                            ]);
                        }
                    }
                    $order = Order::findOrFail($order['id']);
                    $order->shipped_order_id = $shipped[0]->id;
                    $order->status = $shipped[0]->status;
                    $update = $order->save();
                    $msg = ($shipped[0]->status == 'Shipped') ? 'Order is shipped' : 'Order shiping failed';
                    return redirect()->route('admin.orderDetail', ['id' => base64_encode($validatedData['id'])])->with('status',$shipped[0]->status)->with('msg' , $msg );

                    // return redirect()->route('admin.getShippingOrder', ['id' => $shipped[0]->order_identifier])->with(['msg' =>$msg ,'status'=>$shipped[0]->status]);
                } else {
                    echo "contact to developer";
                }
            } catch (\Exception $e) {
                dd($e);
            }
        }
        return redirect()->back();
    }

    public function get_shiping_order(Request $request)
    {
        $order_id = $request->id;

        $apiKey = env('ROYAL_MAIL_API_KEY');

        $client = new Client();
        $response = $client->get('https://api.parcel.royalmail.com/api/v1/orders/' . $order_id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return response()->json([
            'status_code' => $statusCode,
            'response' => json_decode($body, true),
        ]);
    }

    private function make_shiping_payload($order)
    { 
        $payload = [
            "items" => [
                [
                    "orderReference" => null,
                    "recipient" => [
                        "address" => [
                            "fullName" => ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'] . ' ' . $order['shipingdetails']['lastName'] : $order['user']['name'],
                            "companyName" => "My WeightLoss",
                            "addressLine1" => $order['shipingdetails']['address'] ?? $order['user']['address'],
                            "addressLine2" => $order['shipingdetails']['address2'] ?? $order['user']['apartment'],
                            "addressLine3" => null,
                            "city" => $order['shipingdetails']['city'] ?? $order['user']['city'],
                            "county" => "United Kingdom",
                            "postcode" => $order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'],
                            "countryCode" => "GB"
                        ],
                        "phoneNumber" => $order['shipingdetails']['phone'] ?? $order['user']['phone'],
                        "emailAddress" => $order['user']['email'],
                        "addressBookReference" => null
                    ],
                    "sender" => [
                        "tradingName" => null,
                        "phoneNumber" => null,
                        "emailAddress" => null
                    ],
                    "billing" => [
                        "address" => [
                            "fullName" => ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'] . ' ' . $order['shipingdetails']['lastName'] : $order['user']['name'],
                            "companyName" => "My WeightLoss",
                            "addressLine1" => $order['shipingdetails']['address'] ?? $order['user']['address'],
                            "addressLine2" => $order['shipingdetails']['address2'] ?? $order['user']['apartment'],
                            "addressLine3" => null,
                            "city" => $order['shipingdetails']['city'] ?? $order['user']['city'],
                            "county" => "United Kingdom",
                            "postcode" => $order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'],
                            "countryCode" => "GB"
                        ],
                        "phoneNumber" => $order['shipingdetails']['phone'] ?? $order['user']['phone'],
                        "emailAddress" => $order['user']['email']
                    ],
                    "packages" => [
                        [
                            "weightInGrams" => 200,
                            "packageFormatIdentifier" => "parcel",
                            "customPackageFormatIdentifier" => "",
                            "dimensions" => [
                                "heightInMms" => 10,
                                "widthInMms" => 20,
                                "depthInMms" => 30
                            ],
                            "contents" => [
                                [
                                    "name" => $order['product']['title'],
                                    "SKU" => $order['variant']['SKU'] ?? $order['product']['SKU'],
                                    "quantity" => $order['quantity'],
                                    "unitValue" => 999,
                                    "unitWeightInGrams" => 200,
                                    "customsDescription" => 'it is medical product.',
                                    "extendedCustomsDescription" => "",
                                    "customsCode" => 'ali' . $order['id'],
                                    "originCountryCode" => "GB",
                                    "customsDeclarationCategory" => null,
                                    "requiresExportLicence" => null,
                                    "stockLocation" => null
                                ]
                            ]
                        ]
                    ],
                    "orderDate" => $order['created_at'],
                    "plannedDespatchDate" => null,
                    "specialInstructions" => $order['note'],
                    "subtotal" => $order['total_ammount'] - $order['shiping_cost'],
                    "shippingCostCharged" => $order['shiping_cost'],
                    "otherCosts" => 0,
                    "customsDutyCosts" => null,
                    "total" => $order['total_ammount'],
                    "currencyCode" => "GBP",
                    "postageDetails" => [
                        "sendNotificationsTo" => "sender",
                        "serviceCode" => null,
                        "serviceRegisterCode" => null,
                        "consequentialLoss" => 0,
                        "receiveEmailNotification" => null,
                        "receiveSmsNotification" => null,
                        "guaranteedSaturdayDelivery" => null,
                        "requestSignatureUponDelivery" => null,
                        "isLocalCollect" => null,
                        "safePlace" => null,
                        "department" => null,
                        "AIRNumber" => null,
                        "IOSSNumber" => null,
                        "requiresExportLicense" => null,
                        "commercialInvoiceNumber" => null,
                        "commercialInvoiceDate" => null
                    ],
                    "tags" => [
                        [
                            "key" => "medicins",
                            "value" => "medicins"
                        ]
                    ],
                    "label" => [
                        "includeLabelInResponse" => true,
                        "includeCN" => null,
                        "includeReturnsLabel" => null
                    ],
                    "orderTax" => $order['ext_tax'][''] ?? $order['product']['ext_tax']
                ]
            ]
        ];
        return       $payload;
    }

    // comments
    public function comments(Request $request)
    {
        try {
            $data = Comment::where(['comment_for' => 'Orders', 'comment_for_id' => $request->id])->get()->toArray();
            $message = 'Comments retirved  successfully';

            return response()->json(['status' => 'success', 'message' => $message, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error geting comments', 'error' => $e->getMessage()], 500);
        }
    }

    public function comment_store(Request $request): JsonResponse
    {
        $data['user'] = auth()->user();
        $page_name = 'orders_recieved';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        try {

            $comment = new Comment();
            $comment->comment_for    = 'Orders';
            $comment->comment_for_id = $request->comment_for_id;
            $comment->user_id        = Auth::user()->id;
            $comment->user_name  = Auth::user()->name;
            $comment->user_pic   = (Auth::user()->user_pic) ? asset('storage/' . Auth::user()->user_pic) : asset('assets/admin/img/profile-img1.png');
            $comment->comment    = $request->comment;
            $comment->created_by = Auth::id();;
            $save = $comment->save();

            $message = 'Comment added successfully';
            return response()->json(['status' => 'success', 'message' => $message, 'data' => $save]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error storing Invoice', 'error' => $e->getMessage()], 500);
        }
    }
}
