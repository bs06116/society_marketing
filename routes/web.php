<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

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
Auth::routes(['verify'=>true]);
Route::get('/', function () {
    if (auth()->user()) {
        return redirect()->route('dashboard.index');
    }
    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::GET('profit-calculation', [HomeController::class, 'profit_calculation']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::GET('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');


});
Auth::routes();

// Route::get('/reports', function () {
//     return view('pages.reports');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/invoice', function () {
    return view('pages.invoice');
});

Route::get('/create-file', function () {
    return view('pages.create-file');
});