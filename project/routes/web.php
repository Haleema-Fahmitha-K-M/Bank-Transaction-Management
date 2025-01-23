<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AdminController::class, 'admin_login']);
Route::get('/login', [AdminController::class, 'admin_login']);
Route::post('/admin_logincheck', [AdminController::class, 'admin_logincheck']);
Route::get('/user_login', [UserController::class, 'user_login']);
Route::post('/user_logincheck', [UserController::class, 'user_logincheck']);

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/addadmin', [AdminController::class, 'add_admin']);
    Route::post('/admin_check', [AdminController::class, 'admin_check']);
    Route::get('viewAdmin', [AdminController::class, 'view_admin']);
    Route::get('/editadmin/{id}', [AdminController::class, 'editadmin']);
    Route::post('/editadmin/{id}', [AdminController::class, 'editadmin_data']);
    Route::get('/deleteadmin/{id}', [AdminController::class, 'deleteadmin']);

    Route::get('admin_dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('/admin_logout', [AdminController::class, 'admin_logout']);

    Route::get('/adduser', [UserController::class, 'add_user']);
    Route::post('/user_check', [UserController::class, 'user_check']);
    Route::get('viewUser', [UserController::class, 'view_user']);
    Route::get('/edituser/{id}', [UserController::class, 'edituser']);
    Route::post('/edituser/{id}', [UserController::class, 'edituser_data']);
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser']);
    Route::get('/transaction', [UserController::class, 'all_transaction']);
    Route::get('/search', [UserController::class, 'search']);

});

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('user_dashboard', [UserController::class, 'user_dashboard']);
    Route::get('/user_logout', [UserController::class, 'user_logout']);
    Route::get('/pay', [UserController::class, 'pay']);
    Route::post('/pay_check', [UserController::class, 'pay_check']);
    Route::get('/view_transaction', [UserController::class, 'view_transaction']);    
});




