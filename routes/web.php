<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BlockController;



Route::get('/clear-cache', function() {
    Artisan::call('optimize');

    echo "Cleared!";
    die;
    // return what you want
});
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
    Route::POST('add-financial', [FormController::class, 'addFinancial'])->name('financial.add');
    Route::resource('forms', FormController::class);

    // Route::resource('customers', CustomerController::class);
    Route::GET('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::resource('blocks', BlockController::class);

});
Auth::routes();

// Route::get('/reports', function () {
//     return view('pages.reports');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/invoice', function () {
    return view('pages.invoice');
});

Route::get('/plots', function () {
    return view('pages.plots');
});

Route::get('/booked-plots', function () {
    return view('pages.booked-plots');
});

Route::get('/commission-calculation', function () {
    return view('pages.commission-calc');
});

Route::get('/dashboard-dealer', function () {
    return view('pages.dashboard-dealer');
});

Route::get('/create-file', function () {
    return view('pages.create-file');
});

// Route::get('/add-block', function () {

//     return view('pages.create-block');
// });

Route::get('/financial_view', function () {
    return view('pages.financial-view');
});