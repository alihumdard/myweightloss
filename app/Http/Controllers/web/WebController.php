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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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
use App\Models\Cart;
use App\Models\Order;
use App\Models\QuestionMapping;
use App\Models\ShipingDetail;


use Deyjandi\VivaWallet\Enums\RequestLang;
use Deyjandi\VivaWallet\Enums\PaymentMethod;
use Deyjandi\VivaWallet\Facades\VivaWallet;
use Deyjandi\VivaWallet\Customer;
use Deyjandi\VivaWallet\Payment;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use GuzzleHttp\Client;

class WebController extends Controller
{
    public function products(Request $request)
    {
        session()->forget('product_id');
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
        $data['rel_products'] = Product::where('category_id', $data['product']['category_id'])->where('id', '!=', $request->id)->take(4)->latest('id')->get()->toArray();

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
            return redirect()->route('register');
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
            $questionAnswers = [];
            foreach ($request->all() as $key => $value) {
                $iteration = 1;
                if ($key === '_token' || $key === 'website' || $key === 'process') {
                    continue; // Skip unwanted keys
                }


                if ($key === 'question_3') {
                    if ($request->hasFile('question_3')) {
                        $file = $request->file('question_3');
                        $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('consultation/user', $fileName, 'public');
                        $filePath = 'consultation/user/' . $fileName;
                        $questionAnswers[3] = $filePath;
                    }
                } elseif (strpos($key, 'question_') === 0) {
                    $question_id = substr($key, 9); // Extract question_id from the key
                    $questionAnswers[$question_id] = $value;
                }
            }

            $save =  UserConsultation::create([
                'user_id' => auth()->user()->id,
                'question_answers' => json_encode($questionAnswers, JSON_FORCE_OBJECT),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                DB::table('users')
                    ->where('id', auth()->id())
                    ->update(['consult_status' => 'done']);

                $product_id =  session('product_id') ?? NULL;
                if ($product_id) {
                    return redirect()->route('web.products');
                } else {
                    return redirect()->route('admin.index');
                }
            }
        }
    }


    public function product_question(Request $request)
    {
        $data['user'] = auth()->user() ?? [];
        if ($request->product_id) {
            $data['product']   = Product::with(['category:id,name', 'category.questions', 'assignedQuestions'])->findOrFail($request->product_id)->toArray();
            $data['category']  = $data['product']['category'];
            session()->put('product_id', $data['product']['id']);
            // session()->put('category_id', $data['category']['id']);
        } else if (session('product_id')) {
            $data['product']   = Product::with(['category:id,name', 'category.questions', 'assignedQuestions'])->findOrFail(session('product_id'))->toArray();
            $data['category']  = $data['product']['category'];
            session()->put('product_id', $data['product']['id']);
        } else {
            return redirect()->route('web.products');
        }

        if (auth()->user()) {

            if ($data['user']->profile_status != 'done' || $data['user']->consult_status != 'done') {
                return redirect()->route('web.bmiForm');
            }
            session()->put('variant_id', $request->variant_id);
            session()->put('quantity',   $request->quantity);

            $data['questions'] = $data['product']['category']['questions'];
            $question_map_cat  = QuestionMapping::where('category_id', $data['category']['id'])->get()->toArray();
            $check_dependency  = $data['product']['assigned_questions'];
            $data['check_dependency'] = collect($check_dependency)->keyBy('question_id');

            foreach ($data['questions'] as $key => $quest) {
                $q_id = $quest['id'];

                foreach ($question_map_cat as $key => $val) {
                    if ($quest['anwser_set'] == "mt_choice") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'optA') {
                            $data['next_quest_opt'][$q_id]['optA'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optB') {
                            $data['next_quest_opt'][$q_id]['optB'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optC') {
                            $data['next_quest_opt'][$q_id]['optC'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optD') {
                            $data['next_quest_opt'][$q_id]['optD'] = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "yes_no") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'optY') {
                            $data['next_quest_opt'][$q_id]['yes_lable'] = $val['next_question'];
                        } elseif ($val['question_id'] == $q_id && $val['answer'] == 'optN') {
                            $data['next_quest_opt'][$q_id]['no_lable']  = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "file") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'file') {
                            $data['next_quest_opt'][$q_id]['file'] = $val['next_question'];
                        }
                    } else if ($quest['anwser_set'] == "openbox") {
                        if ($val['question_id'] == $q_id && $val['answer'] == 'openBox') {
                            $data['next_quest_opt'][$q_id]['openbox'] = $val['next_question'];
                        }
                    }
                }
            }

            return view('web.pages.product_question', $data);
        } else {
            return redirect()->route('register');
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
                } else if (strpos($key, 'qfid_') === 0) {
                    $question_id = substr($key, 5);
                    if ($request->hasFile($key)) {
                        $file = $request->file($key);
                        $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('consultation/product', $fileName, 'public');
                        $filePath = 'consultation/product/' . $fileName;
                        $questionAnswers[$question_id] = $filePath;
                    }
                }
            }
            $save =  Transaction::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'category_id' => $category_id,
                'question_answers' =>  json_encode($questionAnswers, JSON_FORCE_OBJECT),
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                return redirect()->route('web.cart');
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function bmi_formStore(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $weight = $request->weight_kg;
            $height = $request->cm / 100;
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);

            if ($request->hasFile('weight_pic')) {
                $file = $request->file('weight_pic');
                $fileName = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('consultation/user', $fileName, 'public');
                $filePath = 'consultation/user/' . $fileName;
            }

            $save =  UserBmi::create([
                'user_id' => auth()->user()->id,
                'cm' => $request->cm,
                'feet' => $request->feet,
                'inches' => $request->inches,
                'weight_lb' => $request->weight_lb,
                'weight_kg' => $request->weight_kg,
                'weight_st' => $request->weight_st,
                'weight_pic' => $filePath,
                'age' => $request->age,
                'gender' => $request->gender,
                'bmi' => $bmi,
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

            if ($save) {
                DB::table('users')
                    ->where('id', auth()->id())
                    ->update(['profile_status' => 'done']);
                return redirect()->route('web.bmiForm');
            }
        } else {
            return view('web.pages.regisration_from', $data);
        }
    }

    public function bmi_update(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        // Define validation rules
        $rules = [
            'cm' => 'required|numeric|min:20|max:254',
            'weight_kg' => 'required|numeric|min:20|max:400',
            'id' => 'required|exists:user_bmis,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $weight = $request->weight_kg;
        $height = $request->cm / 100;
        $bmi = $weight / ($height * $height);
        $bmi = round($bmi, 1);

        $save = UserBmi::where('id', $request->id)
            ->update([
                'cm' => $request->cm,
                'feet' => $request->feet,
                'inches' => $request->inches,
                'weight_lb' => $request->weight_lb,
                'weight_kg' => $request->weight_kg,
                'bmi' => $bmi,
                'status' => '1',
                'created_by' => auth()->user()->id,
            ]);

        if ($save) {
            if ($bmi >= 30) {
                return redirect()->route('web.consultationForm');
            } else {
                return redirect()->route('web.bmiForm')->with(['status' => 'invalid', 'message' => "You can't proceed further because Your BMI is lower than 30."]);
            }
        }
    }


    public function cart(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            $product_id = session('product_id') ?? null;
            $variant_id = session('variant_id') ?? null;
            $quantity   = session('quantity') ?? null;
            session(['product_id' => '']);
            session(['variant_id' => '']);
            session(['quantity' => '']);
            Session::save();
            if ($product_id != '') {
                $cart = Cart::create([
                    'user_id'    => auth()->user()->id,
                    'product_id' => $product_id,
                    'variant_id' => $variant_id,
                    'quantity'   => $quantity,
                    'status'     => '1',
                    'created_by' => auth()->user()->id,
                ]);

                if ($cart->id) {
                    session(['cart_id' => $cart->id]);
                    session()->forget(['product_id', 'variant_id', 'quantity']);
                    Session::save();
                    $cart_details = Cart::with('product', 'variant')->where(['user_id' => auth()->user()->id, 'id' => $cart->id, 'status' => 1])->first();
                    $data['cart'] = [
                        'product_id' => $cart_details->variant->product_id ?? $cart_details->product->id,
                        'variant_id' => $cart_details->variant->id ?? '',
                        'title' => $cart_details->variant->title ?? $cart_details->product->title,
                        'img' => $cart_details->variant->image ?? $cart_details->product->main_image,
                        'price' => $cart_details->variant->price ?? $cart_details->product->price,
                        'quantity' => $cart_details->quantity ?? 1
                    ];
                    $total = $data['cart']['quantity'] * $data['cart']['price'];
                    $data['cart']['total'] = round($total, 2);
                }
            } else if (session('cart_id')) {
                $cart_details = Cart::with('product', 'variant')->where(['user_id' => auth()->user()->id, 'id' => session('cart_id'), 'status' => 1])->first();
                $data['cart'] = [
                    'product_id' => $cart_details->variant->product_id ?? $cart_details->product->id,
                    'variant_id' => $cart_details->variant->id ?? '',
                    'title' => $cart_details->variant->title ?? $cart_details->product->title,
                    'img' => $cart_details->variant->image ?? $cart_details->product->main_image,
                    'price' => $cart_details->variant->price ?? $cart_details->product->price,
                    'quantity' => $cart_details->quantity ?? 1
                ];
                $total = $data['cart']['quantity'] * $data['cart']['price'];
                $data['cart']['total'] = round($total, 2);
            } else {
                return redirect()->route('web.products');
            }

            return view('web.pages.cart', $data);
        } else {
            return redirect()->route('register');
        }
    }


    public function payment(Request $request)
    {

        $user = auth()->user() ?? [];
        if (auth()->user()) {
            // creating the order..
            $order =  Order::create([
                'user_id'        => auth()->user()->id,
                'product_id'     => $request->product_id,
                'variant_id'     => $request->variant_id ?? NULL,
                'quantity'       => $request->quantity,
                'note'           => $request->note,
                'shiping_cost'   => $request->cost,
                'coupon_code'    => $request->coupon_code ?? Null,
                'coupon_value'   => $request->coupon_value ?? Null,
                'total_ammount'  => $request->total ?? Null,
                'created_by'     => auth()->user()->id,
            ]);
            if ($order) {
                session(['product_id' => '']);
                session(['variant_id' => '']);
                session(['quantity' => '']);
                session(['cart_id' => '']);
                session()->forget(['product_id', 'variant_id', 'quantity', 'cart_id']);
                Session::save();

                $shipping_details = [
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'quantity' => $request->quantity,
                    'cost' => $request->cost,
                    'method' => $request->shipping_method,
                    'old_address' => $request->old_address ?? 'yes',
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'zip_code' => $request->zip_code,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'created_by' => $user->id,
                ];
                $shiping =  ShipingDetail::create($shipping_details);

                if ($shiping) {
                    return redirect()->away('/Completed-order');
                    $productPrice = $request->total * 100;
                    $productName = $request->title;
                    $productDescription = $request->title;

                    // Viva Wallet API credentials
                    $username = 'dkwrul3i0r4pwsgkko3nr8c4vs0h5yn5tunio398ik403.apps.vivapayments.com';
                    $password = 'BuLY8U1pEsXNPBgaqz98y54irE7OpL';
                    $credentials = base64_encode($username . ':' . $password);

                    // Obtain Access Token
                    $accessToken = $this->getAccessToken($credentials);
                    // dd($accessToken);
                    // Prepare POST fields for creating an order
                    $postFields = [
                        'amount'              => $productPrice,
                        'customerTrns'        => $productDescription,
                        'customer'            => [
                            'email'       => $user->email,
                            'fullName'    => $user->name,
                            'phone'       => $user->phone,
                            'countryCode' => 'GB', // United Kingdom country code
                            'requestLang' => 'en-GB', // Request language set to English (United Kingdom)
                        ],
                        'paymentTimeout'      => 1800,
                        'preauth'             => false,
                        'allowRecurring'      => false,
                        'maxInstallments'     => 0,
                        'paymentNotification' => true,
                        'disableExactAmount'  => false,
                        'disableCash'         => false,
                        'disableWallet'       => false,
                        'sourceCode'          => '2399',
                        "merchantTrns" => "Short description of items/services purchased by customer",
                        "tags" =>
                        [
                            "tags for grouping and filtering the transactions",
                            "this tag can be searched on VivaWallet sales dashboard",
                            "Sample tag 1",
                            "Sample tag 2",
                            "Another string"
                        ],
                    ];

                    // Make an HTTP request to create an order
                    $response = $this->sendHttpRequest('https://api.vivapayments.com/checkout/v2/orders', $postFields, $accessToken);
                    // dd($response);

                    // Decode the JSON response
                    $responseData = json_decode($response, true);

                    if (isset($responseData['orderCode'])) {
                        $orderCode = $responseData['orderCode'];
                        // Redirect to the Viva Payments checkout page with the orderCode parameter
                        $redirectUrl = "https://www.vivapayments.com/web/checkout?ref={$orderCode}&color=c50c26";
                        // Redirect to the external URL
                        return redirect()->away($redirectUrl);
                    }
                }
            }
        } else {
            return redirect()->route('register');
        }
    }

    private function getAccessToken($credentials)
    {
        try {
            // Make an HTTP request to obtain an access token
            $response = Http::asForm()->withHeaders([
                'Authorization' => 'Basic ' . $credentials,
            ])->post('https://accounts.vivapayments.com/connect/token', [
                'grant_type' => 'client_credentials',
            ]);

            // Check if the request was successful (status code 2xx)
            if ($response->successful()) {
                return $response->json('access_token');
            } else {
                // Log the error response for further investigation
                Log::error('Error response: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            // Log any exceptions that occurred during the request
            Log::error('Exception: ' . $e->getMessage());
            return null;
        }
    }

    private function sendHttpRequest($url, $postFields, $accessToken)
    {
        // Make an HTTP request with Laravel HTTP client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type'  => 'application/json',
        ])->post($url, $postFields);

        // Return the response body
        return $response->body();
    }

    public function completed_order(Request $request)
    {
        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            Order::where(['user_id' => auth()->user()->id, 'payment_status' => 'Unpaid', 'status' => 'Received'])->latest('created_at')->first()
                ->update(['payment_status' => 'Paid']);

            Cart::where(['user_id' => auth()->user()->id, 'status' => 1])
                ->update(['status' => 2]);

            return view('web.pages.completed_order', $data);
        } else {
            return redirect()->route('login');
        }
    }

    public function unsuccessful_order(Request $request)
    {

        $data['user'] = auth()->user() ?? [];

        if (auth()->user()) {
            return view('web.pages.unsuccessful_order', $data);
        } else {
            return redirect()->route('login');
        }
    }
}
