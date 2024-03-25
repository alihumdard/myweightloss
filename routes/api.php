<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\api\SystemUserManagmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::match(['post','get'],'/userStore', [SystemUserManagmentController::class, 'user_store']);
        
    Route::match(['post','get'],'/deleteUsers', [SystemUserManagmentController::class, 'deleteUsers']);

    // Route::match(['post','get'],'/comments', [SystemUserManagmentController::class, 'comments']); 

    // Route::match(['post','get'],'/commentStore', [SystemUserManagmentController::class, 'comment_store']);  

});
// Route::middleware('auth:sanctum')->get('/makeCurlRequest', [SystemUserManagmentController::class, 'makeCurlRequest']);
