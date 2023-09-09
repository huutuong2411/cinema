<?php

use App\Http\Controllers\admin\AdminCategoriesController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminMovieController;
use App\Http\Controllers\admin\AdminRoomsController;
use App\Http\Controllers\admin\AdminTheatersController;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => '',
    'as' => 'user.',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home'); //snake_case;
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login_post');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register_post');
    Route::get('confirm', [AuthController::class, 'confirm'])->name('confirm');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user_verify');
    // reset password
    Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('post-forgotpassword', [AuthController::class, 'postforgotpassword'])->name('post_forgotpassword');
    Route::get('account/resetpassword/{token}', [AuthController::class, 'verifyPasswordReset'])->name('link_resetpassword');
    Route::get('resetpassword/{id}', [AuthController::class, 'resetpassword'])->name('resetpassword');
    Route::post('resetpassword/{id}', [AuthController::class, 'updatepassword'])->name('post_resetpassword');
});

// users
Route::resource('users', UserController::class);
// test send mail spam
Route::get('/send-mail', [SendEmailController::class, 'getSendEmail'])->name('get_send_email');
Route::post('/send-mail', [SendEmailController::class, 'postSendEmail'])->name('post_send_email');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/home', function () {
        return view('admin.home');
    });

    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::get('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send_web_notification');

    Route::get('/login', [AuthAdminController::class, 'index'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthAdminController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard'); //snake_case;

    //categories
    Route::group([
        'prefix' => 'categories',
    ], function () {
        Route::get('/', [AdminCategoriesController::class, 'index'])->name('categories');
        Route::post('/', [AdminCategoriesController::class, 'store'])->name('categories_add');
        Route::post('/{id}', [AdminCategoriesController::class, 'update'])->name('categories_edit');
        Route::get('/{id}/delete', [AdminCategoriesController::class, 'destroy'])->name('categories_delete');
        Route::get('/trash', [AdminCategoriesController::class, 'trash'])->name('trash_categories');
        Route::get('/{id}/restore', [AdminCategoriesController::class, 'restore'])->name('categories_restore');
    });

    //theaters
    Route::group([
        'prefix' => 'theaters',
    ], function () {
        Route::get('/', [AdminTheatersController::class, 'index'])->name('theaters');
        Route::post('/', [AdminTheatersController::class, 'store'])->name('theaters_add');
        Route::get('/trash', [AdminTheatersController::class, 'trash'])->name('theaters_trash');
        Route::post('/{id}', [AdminTheatersController::class, 'update'])->name('theaters_edit');
        Route::get('/{id}/delete', [AdminTheatersController::class, 'destroy'])->name('theaters_delete');
        Route::get('/{id}/restore', [AdminTheatersController::class, 'restore'])->name('theaters_restore');
    });

    //rooms
    Route::group([
        'prefix' => 'rooms',
    ], function () {
        Route::get('/', [AdminRoomsController::class, 'index'])->name('rooms');
        Route::get('/create', [AdminRoomsController::class, 'create'])->name('rooms_create');
        Route::get('/trash', [AdminRoomsController::class, 'trash'])->name('rooms_trash');
        Route::post('/', [AdminRoomsController::class, 'store'])->name('rooms_add');
        Route::get('/{id}', [AdminRoomsController::class, 'show'])->name('rooms_show');
        Route::get('/{id}/edit', [AdminRoomsController::class, 'edit'])->name('rooms_edit');
        Route::post('/{id}', [AdminRoomsController::class, 'update'])->name('rooms_update');
        Route::get('/{id}/delete', [AdminRoomsController::class, 'destroy'])->name('rooms_delete');
        Route::get('/{id}/restore', [AdminRoomsController::class, 'restore'])->name('rooms_restore');
    });
    //movie
    Route::group([
        'prefix' => 'movies',
    ], function () {
        Route::get('/', [AdminMovieController::class, 'index'])->name('movies');
        Route::get('/create', [AdminMovieController::class, 'create'])->name('movies_create');
        Route::get('/trash', [AdminMovieController::class, 'trash'])->name('movies_trash');
        Route::post('/', [AdminMovieController::class, 'store'])->name('movies_add');
        Route::get('/{id}', [AdminMovieController::class, 'show'])->name('movies_show');
        Route::get('/{id}/edit', [AdminMovieController::class, 'edit'])->name('movies_edit');
        Route::post('/{id}', [AdminMovieController::class, 'update'])->name('movies_update');
        Route::get('/{id}/delete', [AdminMovieController::class, 'destroy'])->name('movies_delete');
        Route::get('/{id}/restore', [AdminMovieController::class, 'restore'])->name('movies_restore');
    });
});
