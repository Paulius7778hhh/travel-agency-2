<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController as AC;
use App\Http\Controllers\HotelsController as H;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\UserxpController as U;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/welcome')->name('admin-')->group(function () {
    Route::get('/', [AC::class, 'index'])->name('welcome');
    Route::get('/add', [AC::class, 'create'])->name('create');
    Route::post('/store', [AC::class, 'store'])->name('store');
    Route::get('/addhotel', [AC::class, 'createhotel'])->name('createhotel');
    Route::post('/storehotel', [AC::class, 'storehotel'])->name('storehotel');
    Route::get('/countrylist', [AC::class, 'show'])->name('clist');
    Route::get('/showhotel/{hotels}', [H::class, 'show'])->name('hotel');
    Route::get('/download/{hotels}', [H::class, 'pdf'])->name('pdf');
    Route::get('/hotellist', [AC::class, 'showhotel'])->name('hlist');
    Route::get('/edit/{hotels}', [H::class, 'edit'])->name('edit');
    Route::put('/update/{hotels}', [H::class, 'update'])->name('update');
    Route::get('/editcountry/{country}', [C::class, 'edit'])->name('cedit');
    Route::put('/updatecountry/{country}', [C::class, 'update'])->name('cupdate');
    Route::delete('/delete/{hotels}', [H::class, 'destroy'])->name('hdelete');
    Route::delete('/deletecountry/{country}', [C::class, 'destroy'])->name('cdelete');
});
Route::prefix('user/welcome')->name('user-')->group(function () {
    Route::get('/', [U::class, 'index'])->name('welcome');
    Route::get('/offers', [U::class, 'show'])->name('market');
});
