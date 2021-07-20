<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;

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
    return view('home');
});

Route::get('admin/login', [LoginController::class, 'showFormLogin'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
 
});