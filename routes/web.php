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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/welcome')->name('admin-')->group(function () {
    Route::get('/', [AC::class, 'index'])->name('welcome')->middleware('roles:A');
    Route::get('/add', [AC::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [AC::class, 'store'])->name('store')->middleware('roles:A');
    Route::get('/addhotel', [AC::class, 'createhotel'])->name('createhotel')->middleware('roles:A');
    Route::post('/storehotel', [AC::class, 'storehotel'])->name('storehotel')->middleware('roles:A');
    Route::get('/countrylist', [AC::class, 'show'])->name('clist')->middleware('roles:A');
    Route::get('/showhotel/{hotels}', [H::class, 'show'])->name('hotel')->middleware('roles:A');
    Route::get('/download/{hotels}', [H::class, 'pdf'])->name('pdf')->middleware('roles:A');
    Route::get('/hotellist', [AC::class, 'showhotel'])->name('hlist')->middleware('roles:A');
    Route::get('/edit/{hotels}', [H::class, 'edit'])->name('edit');
    Route::put('/update/{hotels}', [H::class, 'update'])->name('update')->middleware('roles:A');
    Route::get('/editcountry/{country}', [C::class, 'edit'])->name('cedit')->middleware('roles:A');
    Route::put('/updatecountry/{country}', [C::class, 'update'])->name('cupdate')->middleware('roles:A');
    Route::delete('/delete/{hotels}', [H::class, 'destroy'])->name('hdelete')->middleware('roles:A');
    Route::delete('/deletecountry/{country}', [C::class, 'destroy'])->name('cdelete')->middleware('roles:A');
});
Route::prefix('user/welcome')->name('user-')->group(function () {
    Route::get('/', [U::class, 'index'])->name('welcome')->middleware('roles:U|A');
    Route::get('/offers', [U::class, 'show'])->name('market')->middleware('roles:U|A');
    Route::post('/add/{hotels}', [U::class, 'addtocart'])->name('addtocart')->middleware('roles:U|A');
    Route::get('/viewlist', [U::class, 'viewlist'])->name('viewlist')->middleware('roles:U|A');
    Route::post('/viewlistupdate', [U::class, 'updatecart'])->name('updatecart')->middleware('roles:U|A');
    Route::post('/buy', [U::class, 'makeorder'])->name('purchase')->middleware('roles:U|A');
});
