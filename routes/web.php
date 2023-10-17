<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');    
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/users/create-bulk', [App\Http\Controllers\Voyager\VoyagerUserController::class, 'create_bulk'])->name('voyager.users.bulk-add');
    Route::post('/users/create-bulk-ajax', [App\Http\Controllers\Voyager\VoyagerUserController::class, 'create_bulk_ajax'])->name('voyager.users.bulk-add-post');
    Voyager::routes();
    Route::match(['put', 'patch'], '/users/{id}', [App\Http\Controllers\Voyager\VoyagerUserController::class, 'update'])->name('voyager.users.update');

    Route::get('/users', [App\Http\Controllers\Voyager\VoyagerUserController::class, 'index'])->name('voyager.users.index');
    Route::get('/login-attempts', [App\Http\Controllers\Voyager\VoyagerLoginAttemptController::class, 'index'])->name('voyager.login-attempts.index');

    Route::get('/login', [App\Http\Controllers\Voyager\VoyagerAuthController::class, 'login'])->name('voyager.login');
    Route::post('/login', [App\Http\Controllers\Voyager\VoyagerAuthController::class, 'postLogin'])->name('voyager.postlogin');
    Route::post('/logout', [App\Http\Controllers\Voyager\VoyagerAuthController::class, 'logout'])->name('voyager.logout');

});
