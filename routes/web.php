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

Route::match(['get','post'],'/login', [DefualtController::class, 'login'])->name('web.login');
Route::match(['get','post'],'/logout', [DefualtController::class, 'logout'])->name('web.logout');
Route::get('/aboutUs', [HomeController::class, 'about_us'])->name('web.aboutUs');
Route::get('/contactUs', [HomeController::class, 'contact_us'])->name('web.contactUs');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('web.blogs');
Route::get('/products', [WebController::class, 'products'])->name('web.products');
Route::match(['get','post'],'/product/{id}', [WebController::class, 'product'])->name('web.product')->where('id', '[0-9]+');
Route::match(['get','post'],'/bmiForm', [WebController::class, 'bmi_form'])->name('web.bmiForm');
Route::match(['get','post'],'/consultationForm', [WebController::class, 'consultation_form'])->name('web.consultationForm');
Route::match(['get','post'],'/regisrationFrom', [WebController::class, 'regisration_from'])->name('web.regisrationFrom');

Route::match(['get','post'],'/product_question', function(){
    return view('web.pages.product_question');
});




include __DIR__.'/admin.php';
