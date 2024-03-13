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
use Illuminate\Support\Facades\Redirect;

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
        if ($request->has('id')) {
            $data['product'] = Product::findOrFail($request->id)->toArray();
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

        $validator = Validator::make($request->all(), [
            'price'      => 'required',
            'category_id' => 'required',
            'main_image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webm,svg,webp',
                'max:1024',
                'dimensions:max_width=1000,max_height=1000',
            ],
            'stock'        => 'required',
            'ext_tax'    => 'required',
            'desc'       => 'required',
            'short_desc' => 'required',
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
                'short_desc' => $request->short_desc,
                'main_image' => $mainImagePath ?? Product::findOrFail($request->id)->main_image,
                'category_id' => $request->category_id,
                'ext_tax'    => $request->ext_tax,
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
            $data['order'] = Order::with('user', 'product', 'product.category')->where(['id' => $request->id, 'payment_status' => 'Paid', 'status' => 'Received'])->first()->toArray() ?? [];
            if ($data['order']) {
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

            $transaction = Transaction::where(['user_id' => $uid, 'product_id' => $pid, 'status' => '1'])->latest('created_at')->latest('id')->first();
            if ($transaction) {
                $question_ans = json_decode($transaction->question_answers, true);
                $question_ids = array_keys($question_ans);
                $questions = Question::whereIn('id', $question_ids)->pluck('title', 'id')->toArray();

                $result = [];
                foreach ($question_ans as $question_id => $answer) {
                    if (isset($questions[$question_id])) {
                        $result[] = [
                            'id' => $question_id,
                            'title' => $questions[$question_id],
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
        $userIds = array_unique(Arr::pluck($orders, 'user.id'));

        $userOrdersData = Order::select('id')->whereIn('user_id', $userIds)
            ->where('id', '!=', $orders[0]['id'])
            ->select('user_id', 'id')
            ->get()->toArray();

        $data['order_history'] = $userOrdersData;
        $data['orders'] = $orders;
        // dd($userOrdersData);

        return view('admin.pages.orders_recieved', $data);
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
