<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\Admin\DefualtController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('web.index');

Route::match(['get', 'post'], '/login', [DefualtController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/forgotPassword', [DefualtController::class, 'forgot_password'])->name('forgotPassword');
Route::match(['get', 'post'], '/sendOtp', [DefualtController::class, 'send_otp'])->name('sendOtp');
Route::match(['get', 'post'], '/verifyOtp', [DefualtController::class, 'verify_otp'])->name('verifyOtp');
Route::match(['get', 'post'], '/changePassword', [DefualtController::class, 'change_password'])->name('changePassword');
Route::match(['get', 'post'], '/register', [DefualtController::class, 'regisration_from'])->name('register');
Route::match(['get', 'post'], '/regisrationFrom', [DefualtController::class, 'user_register'])->name('web.user_register');
Route::match(['get', 'post'], '/logout', [DefualtController::class, 'logout'])->name('web.logout');
Route::get('/aboutUs', [HomeController::class, 'about_us'])->name('web.aboutUs');
Route::get('/contact', [HomeController::class, 'contact_us'])->name('web.contact');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('web.blogs');
Route::get('/term&conditions', [HomeController::class, 'term'])->name('web.term&conditions');
Route::get('/privacypolicy', [HomeController::class, 'privacy'])->name('web.privacypolicy');
Route::get('/deliveryReturns', [HomeController::class, 'deliveryReturns'])->name('web.deliveryReturns');
Route::get('/howitworks', [HomeController::class, 'howitworks'])->name('web.howitworks');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('web.blogs');
Route::get('/products/{cat_id?}', [WebController::class, 'products'])->name('web.products');
Route::match(['get','post'],'/product/{id}', [WebController::class, 'product'])->name('web.product')->where('id', '[0-9]+');
Route::match(['get','post'],'/bmiForm', [WebController::class, 'bmi_form'])->name('web.bmiForm');
Route::match(['get','post'],'/bmiFormStore', [WebController::class, 'bmi_formStore'])->name('web.bmiFormStore');
Route::match(['get','post'],'/bmiUpdate', [WebController::class, 'bmi_update'])->name('web.bmiUpdate');
Route::match(['get','post'],'/consultationForm', [WebController::class, 'consultation_form'])->name('web.consultationForm');
Route::match(['get','post'],'/consultationStore', [WebController::class, 'consultation_store'])->name('web.consultationStore');
Route::match(['get','post'],'/productQuestion', [WebController::class, 'product_question'])->name('web.productQuestion');
Route::match(['get','post'],'/cart', [WebController::class, 'cart'])->name('web.cart');
Route::match(['get','post'],'/payment', [WebController::class, 'payment'])->name('payment');
Route::match(['get','post'],'/Completed-order', [WebController::class, 'completed_order']);
Route::match(['get','post'],'/Unsuccessful-order', [WebController::class, 'unsuccessful_order']);
Route::match(['get', 'post'], '/transactionStore/', [WebController::class, 'transaction_store'])->name('web.transactionStore');


Route::match(['get','post'],'/terms', function(){
    return view('web.pages.term');
})->name('web.term_conditions');

Route::match(['get','post'],'/privacypolicy', function(){
    return view('web.pages.privacy');
})->name('web.privacypolicy');

Route::match(['get','post'],'/howitworks', function(){
    return view('web.pages.howitworks');
})->name('web.howitworks');

Route::match(['get','post'],'/deliveryReturns', function(){
    return view('web.pages.deliveryReturns');
})->name('web.deliveryReturns');



include __DIR__ . '/admin.php';
