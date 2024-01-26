<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DefualtController;


Route::prefix('admin')->group(function () {
    Route::get('/', [DefualtController::class, 'index'])->name('admin.index');
});
