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
            $data['questions'] = Question::latest('id')->get()->toArray();
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

        $data['user'] = auth()->user();
        if ($request->has('id')) {
            $data['question'] = Question::findOrFail($request->id)->toArray();
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
        $message = "Question " . ($request->id ? "Updated" : "Saved") . " Successfully";
        if ($saved) {
            return redirect()->route('admin.questions')->with(['msg' => $message]);
        }
    }

    public function assign_question(Request $request)
    {
        $user = auth()->user();
        $page_name = 'add_question';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        $data['user'] = auth()->user();
        if (isset($user->role) && $user->role == user_roles('1')) {
            $data['questions'] = Question::latest('id')->get()->toArray();
            $data['categories'] = Category::latest('id')->get()->toArray();
        }

        return view('admin.pages.assign_question',$data);
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

    public function prodcuts()
    {
        return view('admin.pages.prodcuts');
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



    public function add_product()
    {
        return view('admin.pages.add_product');
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
