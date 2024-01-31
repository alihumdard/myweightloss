<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
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

include __DIR__.'/admin.php';
