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
use App\Mail\OTPMail;

// models ...
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\AssignQuestion;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\UserBmi;


class DefualtController extends Controller
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
        $user = auth()->user();

        if ($user) {
            $page_name = 'dashboard';
            if (!view_permission($page_name)) {
                return redirect()->back();
            }
            session(['user_details' => $user]);
            $data['user']       = $user;
            $data['role'] = user_role_no($user->role);
            // User roles: 1 for Super Admin, 2 for Admin, 3 for Doctor, 4 User
            if (isset($user->role) && $user->role == user_roles('1')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('2')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('3')) {
                return view('admin.pages.dashboard', $data);
            } else if (isset($user->role) && $user->role == user_roles('4')) {
                if($user->profile_status == 'done'){
                    if($user->consult_status == 'done'){
                        $data['bodyPorfile'] = UserBmi::with('user')->where(['user_id' => $user->id, 'status' => '1'])->latest('created_at')->latest('id')->first();
                        return view('admin.pages.dashboard', $data);
                    }else{
                        return redirect()->route('web.bmiForm');
                    }
                }else{
                    return redirect()->route('web.bmiForm');
                }
            }
        } else {
            return redirect('/login');
        }
    }

    public function profile_setting(Request $request)
    {

        $user = auth()->user();
        $page_name = 'setting';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->all()) {
            $rules = [
                'name'       => 'required',
                'phone'    => 'required|digits:11',
                'address'    => 'required',
                'email'      => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                ],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['user'] = auth()->user();

            if ($request->file('user_pic')) {
                $image = $request->file('user_pic');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('user_images', $imageName, 'public');
                $ImagePath = 'user_images/' . $imageName;
            }
            $updateData = [
                'name'       => ucwords($request->name),
                'email'      => $request->email,
                'phone'      => $request->phone,
                'user_pic'   => $ImagePath ?? $user->user_pic,
                'address'    => $request->address,
                'short_bio'  => $request->short_bio,
                'status'     => $this->status['Active'],
                'created_by' => $user->id,
            ];
            $saved = User::updateOrCreate(
                ['id' => $user->id ?? NULL],
                $updateData
            );
            $message = "profile" . ($user->id ? "Updated" : "Saved") . " Successfully";
            if ($saved) {
                return redirect()->route('admin.profileSetting')->with(['msg' => $message]);
            }
        }

        $data['user'] = $user;
        return view('admin.pages.profile_setting', $data);
    }

    public function password_change(Request $request)
    {
        $user = auth()->user();
        $page_name = 'setting';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }
        if ($request->all()) {
            $rules = [
                'current_password' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Check if the current password matches the one in the database
            if (Hash::check($request->current_password, $user->password)) {
                $hashedPassword = Hash::make($request->password);
                $updateData = [
                    'password' => $hashedPassword,
                    'created_by' => $user->id,
                ];
                $saved = User::updateOrCreate(
                    ['id' => $user->id ?? NULL],
                    $updateData
                );
                $message = "Password " . ($user->id ? "Updated" : "Saved") . " Successfully";
                if ($saved) {
                    return redirect()->route('admin.profileSetting')->with(['msg' => $message]);
                }
            } else {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
            }
        }

        $data['user'] = $user;
        return view('admin.pages.profile_setting', $data);
    }
    public function faq()
    {
        return view('admin.pages.faq');
    }

    public function contact()
    {
        return view('admin.pages.contact');
    }

    public function login(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            if ($request->all()) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required',
                    'email' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with(['status' => 'error', 'message' => $validator->errors()]);
                }

                $credentials = $request->only('email', 'password');
                $user = User::where('email', $credentials['email'])->first();

                if ($user) {
                    if (in_array($user->status, auth_users())) {
                        if (Auth::attempt($credentials)) {
                            $token = $user->createToken('MyApp')->plainTextToken;
                            if (isset($user->role) && $user->role == user_roles('1')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('2')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('3')) {
                                return  redirect('/admin');
                            } else if (isset($user->role) && $user->role == user_roles('4')) {
                                $product_id =  session('pro_id') ?? NULL;
                                if ($product_id) {
                                    if ($user->consult_status != 'done') {
                                        return redirect()->route('web.bmiForm');
                                    } else {
                                        return redirect()->route('web.products');
                                    }
                                } else {
                                    if ($user->consult_status != 'done') {
                                        return redirect()->route('web.bmiForm');
                                    } else {
                                        return redirect()->route('admin.index');
                                    }
                                }
                            }
                            // return redirect()->back()->with(['status' => 'success', 'message' => 'User successfully logged in', 'token' => $token]);
                        } else {
                            return redirect()->back()->with(['status' => 'invalid', 'message' => 'Invalid Credentails', 'email' => $credentials['email']]);
                        }
                    } else if ($user->status == 4) {
                        return redirect()->back()->with(['status' => 'Unverfied', 'message' => 'User is unverified, Please Check Your Email', 'email' => $credentials['email']]);
                    } else {
                        return redirect()->back()->with(['status' => 'Deactive', 'message' => 'You are Unauthorized to Login', 'email' => $credentials['email']]);
                    }
                } else {
                    return redirect()->back()->with(['status' => 'noexitance', 'message' => 'User does not exist', 'email' => $credentials['email']], 401);
                }
            } else {
                return view('admin.pages.login');
            }
        } else {
            if (isset($user->role) && $user->role == user_roles('1')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('2')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('3')) {
                return  redirect('/admin');
            } else if (isset($user->role) && $user->role == user_roles('4')) {
                return redirect()->route('web.bmiForm');
            }
        }
        return view('admin.pages.login');
    }

    public function logout(REQUEST $request)
    {
        $user = auth()->user();

        session()->flush();
        Auth::logout();

        if (isset($user->role) && $user->role == user_roles('1')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('2')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('3')) {
            return redirect('/login');
        } else if (isset($user->role) && $user->role == user_roles('4')) {
            return redirect('/');
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

    public function user_register(Request $request)
    {
        $user = auth()->user();
        if (!$user) {

            $validator = Validator::make(
                $request->all(),
                [
                    'name'     => 'required',
                    'phone'    => 'required|digits:11',
                    'address'  => 'required',
                    'role'     => 'required',
                    'day'     => 'required',
                    'month'     => 'required',
                    'year'     => 'required',
                    'city'     => 'required',
                    'zip_code'     => 'required',
                    'email'    => [
                        'required',
                        'email',
                        Rule::unique('users')->ignore($request->id),
                    ],
                    'password' => [
                        'required',
                        'min:8'
                    ]
                ],
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['user'] = auth()->user();
            $dob = $request->day.'-'.$request->month.'-'.$request->year;
            $saved = User::updateOrCreate(
                ['id' => $request->id ?? NULL],
                [
                    'name'       => ucwords($request->name),
                    'email'      => $request->email,
                    'dob'        => $dob,
                    'apartment'  => $request->apartment,
                    'role'       => $request->role,
                    'phone'      => $request->phone,
                    'address'    => $request->address,
                    'apartment'  => $request->apartment,
                    'zip_code'   => $request->zip_code,
                    'city'       => $request->city ?? '',
                    'state'      => $request->state ?? '',
                    'password'   => Hash::make($request->password),
                    'status'     => $this->status['Active'],
                    'created_by' => 1,
                ]
            );
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = auth()->user();
                $token = $user->createToken('MyApp')->plainTextToken;
            }
            $message = "User" . ($request->id ? "Registraion" : "Registraion") . " Successfully";
            if ($saved) {
                return redirect()->route('web.bmiForm')->with(['msg' => $message]);
            }
        } else {
            return redirect()->back();
        }
    }

    public function forgot_password(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return view('admin.pages.forgot_password');
        } else {
            return redirect()->back();
        }
    }

    public function change_password(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return view('admin.pages.change_password');
        } else {
            return redirect()->back();
        }
    }

    public function send_otp(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $otp = mt_rand(100000, 999999);
                $user->otp = $otp;
                $user->save();
                Mail::to($request->email)->send(new OTPMail($otp));
                return redirect()->route('changePassword')->with(['status' => 'success', 'message' => "Please check you'r mail for OTP", 'email' => $request->email]);
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'The provided email is incorrect.']);
            }
        } else {
            return redirect()->back();
        }
    }

    public function verify_otp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:8',
        ]);

        $user = auth()->user();
        if (!$user) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->otp == trim($request->otp)) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    return redirect()->route('login')->with(['status' => 'success', 'message' => "Password updated successfully."]);
                } else {
                    return redirect()->back()->withInput()->withErrors(['otp' => 'The provided OTP is incorrect.']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'The provided email is incorrect.']);
            }
        } else {
            return redirect()->back();
        }
    }
}
