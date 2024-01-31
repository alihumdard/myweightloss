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

// models ...
use App\Models\User;


class DefualtController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user) {
            session(['user_details' => $user]);
            $data['user']       = $user;
            // User roles: 1 for Super Admin, 2 for Admin, 3 for Doctor, 4 User
            if (isset($user->role) && $user->role == user_roles('1')) {
                return view('admin.pages.dashboard');
            } else if (isset($user->role) && $user->role == user_roles('2')) {
                return view('admin.pages.dashboard');
            } else if (isset($user->role) && $user->role == user_roles('3')) {
                return view('admin.pages.dashboard');
            } else if (isset($user->role) && $user->role == user_roles('4')) {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    public function profile_setting()
    {
        return view('admin.pages.profile_setting');
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
                                return redirect('/');
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
                return redirect('/');
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
}
