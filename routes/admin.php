<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DefualtController;
use App\Http\Controllers\Admin\SystemController;


Route::get('/admin', [DefualtController::class, 'index'])->name('admin.index');

Route::prefix('admin')->middleware(['check.userAuthCheck'])->group(function () {
    Route::match(['get','post'], '/setting', [DefualtController::class, 'profile_setting'])->name('admin.profileSetting');
    Route::match(['get','post'], '/passwordChange', [DefualtController::class, 'password_change'])->name('admin.passwordChange');
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
    Route::post('/questionMapping', [SystemController::class, 'question_mapping'])->name('admin.qustionMapping');
    Route::get('/questionDetail', [SystemController::class, 'question_detail'])->name('admin.qustionDetail');

    Route::get('/comments/id', [SystemController::class, 'comments'])->name('admin.comments');
    Route::match(['get','post'],'/commentStore', [SystemController::class, 'comment_store'])->name('admin.commentStore');
    Route::get('/ordersRecieved', [SystemController::class, 'orders_recieved'])->name('admin.ordersRecieved');
    Route::get('/doctorsApproval', [SystemController::class, 'doctors_approval'])->name('admin.doctorsApproval');
    Route::get('/ordersShiped', [SystemController::class, 'orders_shiped'])->name('admin.ordersShiped');
    Route::get('/orderDetail/{id}', [SystemController::class, 'order_detail'])->name('admin.orderDetail');
    Route::get('/consultationView/{uid}/{pid}/{oid}', [SystemController::class, 'consultation_view'])->name('admin.consultationView');
    Route::match(['get','post'], '/changeStatus', [SystemController::class, 'change_status'])->name('admin.changeStatus');
    Route::match(['get', 'post'],'/createShippingOrder', [SystemController::class, 'create_shiping_order'])->name('admin.createShippingOrder');
    Route::match(['get','post'], '/getShippingOrder/{id}', [SystemController::class, 'get_shiping_order'])->name('admin.getShippingOrder');

});
