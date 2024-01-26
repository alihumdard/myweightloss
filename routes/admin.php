<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\pagesController;
use App\Http\Controllers\Admin\widgetsController;
use App\Http\Controllers\Admin\settingsController;
use App\Http\Controllers\Admin\apperenceController;

Route::prefix('admin')->group(function () {
    Route::get('/', [pagesController::class, 'index'])->name('admin.index');
    Route::get('/setting', [pagesController::class, 'setting'])->name('admin.setting');
    Route::get('/principles', [widgetsController::class, 'principles'])->name('admin.principle');
    Route::post('/principles', [widgetsController::class, 'store_principle'])->name('store.principle');
    Route::get('/roadmaps', [widgetsController::class, 'roadmaps'])->name('admin.roadmap');
    Route::post('/roadmaps', [widgetsController::class, 'store_roadmaps'])->name('store.roadmap');
    Route::post('/uploadlarge-logo', [settingsController::class,'uploadlargeLogo'])->name('upload.largelogo');
    Route::post('/uploadmedium-logo', [settingsController::class,'uploadMediumLogo'])->name('upload.mediumlogo');
    Route::post('/uploadsmall-logo', [settingsController::class,'uploadSmallLogo'])->name('upload.smalllogo');
    Route::post('/uploadsocialmedia', [settingsController::class,'uploadSocialMediaInfo'])->name('upload.socialmedia');
    Route::get('/allpages', [pagesController::class, 'allpages'])->name('admin.allpages');
    Route::get('/addpage', [pagesController::class, 'addpage'])->name('admin.addpage');
    Route::get('/menus', [apperenceController::class, 'menus'])->name('admin.menus');
});
