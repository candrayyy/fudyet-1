<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FactController;
use App\Http\Controllers\FoodFactController;
use App\Http\Controllers\FormController;

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

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'formSubmit'])->name('form.formsubmit');

Route::get('admin/login', [LoginController::class, 'showFormLogin'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
   

    Route::resource('admin/foods', FoodController::class);
    Route::resource('admin/facts', FactController::class);
    Route::resource('admin/rules', FoodFactController::class);
});