<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DefualtController;
use App\Http\Controllers\Admin\SystemController;


Route::prefix('admin')->group(function () {
    Route::get('/', [DefualtController::class, 'index'])->name('admin.index');
    Route::get('/setting', [DefualtController::class, 'profile_setting'])->name('admin.profileSetting');
    Route::get('/faq', [DefualtController::class, 'faq'])->name('admin.faq');
    Route::get('/contact', [DefualtController::class, 'contact'])->name('admin.contact');

    Route::get('/doctors', [SystemController::class, 'doctors'])->name('admin.doctors');
    Route::match(['get','post'],'/addDoctor',   [SystemController::class, 'add_doctor'])->name('admin.addDoctor');
    Route::match(['get','post'],'/storeDoctor', [SystemController::class, 'store_doctor'])->name('admin.storeDoctor');
    
    Route::get('/categories', [SystemController::class, 'categories'])->name('admin.categories');
    Route::match(['get','post'],'/addCategory', [SystemController::class, 'add_category'])->name('admin.addCategory');
    Route::match(['get','post'],'/storeCategory', [SystemController::class, 'store_category'])->name('admin.storeCategory');

    Route::match(['get','post'],'/prodcuts', [SystemController::class, 'prodcuts'])->name('admin.prodcuts');
    Route::match(['get','post'],'/addProduct', [SystemController::class, 'add_product'])->name('admin.addProduct');
    Route::match(['get','post'],'/storeProduct', [SystemController::class, 'store_product'])->name('admin.storeProduct');
    
    Route::get('/admins', [SystemController::class, 'admins'])->name('admin.admins');
    Route::match(['get','post'],'/addAdmin',   [SystemController::class, 'add_admin'])->name('admin.addAdmin');
    Route::match(['get','post'],'/storeAdmin', [SystemController::class, 'store_admin'])->name('admin.storeAdmin');
    Route::get('/users', [SystemController::class, 'users'])->name('admin.users');
    
    Route::get('/questions', [SystemController::class, 'questions'])->name('admin.questions');
    Route::match(['get','post'],'/addQuestion', [SystemController::class, 'add_question'])->name('admin.addQuestion');
    Route::match(['get','post'],'/storeQuestion', [SystemController::class, 'store_question'])->name('admin.storeQuestion');
    Route::get('/assignQuestion', [SystemController::class, 'assign_question'])->name('admin.assignQuestion');
    Route::match(['get','post'], '/getAssignQuestion', [SystemController::class, 'get_assign_quest'])->name('admin.getAssignQuestion');
    Route::match(['get','post'], '/storeAssignQuestion', [SystemController::class, 'store_assign_quest'])->name('admin.storeAssignQuestion');


    Route::get('/ordersRecieved', [SystemController::class, 'orders_recieved'])->name('admin.ordersRecieved');
    Route::get('/doctorsApproval', [SystemController::class, 'doctors_approval'])->name('admin.doctorsApproval');
    Route::get('/ordersConfrimed', [SystemController::class, 'orders_confrimed'])->name('admin.ordersConfrimed');
    Route::get('/ordersShiped', [SystemController::class, 'orders_shiped'])->name('admin.ordersShiped');

});
