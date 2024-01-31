<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DefualtController;
use App\Http\Controllers\Admin\SystemUsersController;


Route::prefix('admin')->group(function () {
    Route::get('/', [DefualtController::class, 'index'])->name('admin.index');
    Route::get('/setting', [DefualtController::class, 'profile_setting'])->name('admin.profileSetting');
    Route::get('/faq', [DefualtController::class, 'faq'])->name('admin.faq');
    Route::get('/contact', [DefualtController::class, 'contact'])->name('admin.contact');

    Route::get('/doctors', [SystemUsersController::class, 'doctors'])->name('admin.doctors');
    Route::match(['get','post'],'/addDoctor',   [SystemUsersController::class, 'add_doctor'])->name('admin.addDoctor');
    Route::match(['get','post'],'/storeDoctor', [SystemUsersController::class, 'store_doctor'])->name('admin.storeDoctor');
    
    Route::get('/categories', [SystemUsersController::class, 'categories'])->name('admin.categories');
    Route::match(['get','post'],'/addCategory', [SystemUsersController::class, 'add_category'])->name('admin.addCategory');
    Route::match(['get','post'],'/storeCategory', [SystemUsersController::class, 'store_category'])->name('admin.storeCategory');

    Route::get('/prodcuts', [SystemUsersController::class, 'prodcuts'])->name('admin.prodcuts');
    
    Route::get('/admins', [SystemUsersController::class, 'admins'])->name('admin.admins');
    Route::match(['get','post'],'/addAdmin',   [SystemUsersController::class, 'add_admin'])->name('admin.addAdmin');
    Route::match(['get','post'],'/storeAdmin', [SystemUsersController::class, 'store_admin'])->name('admin.storeAdmin');
    Route::get('/users', [SystemUsersController::class, 'users'])->name('admin.users');
    
    Route::get('/questions', [SystemUsersController::class, 'questions'])->name('admin.questions');
    Route::match(['get','post'],'/addQuestion', [SystemUsersController::class, 'add_question'])->name('admin.addQuestion');
    Route::match(['get','post'],'/storeQuestion', [SystemUsersController::class, 'store_question'])->name('admin.storeQuestion');
    Route::get('/assignQuestion', [SystemUsersController::class, 'assign_question'])->name('admin.assignQuestion');

    Route::get('/addProduct', [SystemUsersController::class, 'add_product'])->name('admin.addProduct');

    Route::get('/ordersRecieved', [SystemUsersController::class, 'orders_recieved'])->name('admin.ordersRecieved');
    Route::get('/doctorsApproval', [SystemUsersController::class, 'doctors_approval'])->name('admin.doctorsApproval');
    Route::get('/ordersConfrimed', [SystemUsersController::class, 'orders_confrimed'])->name('admin.ordersConfrimed');
    Route::get('/ordersShiped', [SystemUsersController::class, 'orders_shiped'])->name('admin.ordersShiped');

});
