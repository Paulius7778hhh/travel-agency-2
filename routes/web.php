<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController as AC;

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
    Route::get('/edit/{admin}', [A::class, 'edit'])->name('edit');
    Route::put('/edit/{admin}', [A::class, 'update'])->name('update');
    Route::delete('/delete/{admin}', [A::class, 'destroy'])->name('delete');
});
