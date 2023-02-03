<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin/user')->name('admin-')->group(function () {
    Route::get('/', [AC::class, 'index'])->name('welcome');
    Route::get('/create', [A::class, 'create'])->name('create');
    Route::post('/create', [A::class, 'store'])->name('store');
    Route::get('/edit/{accountlist}', [A::class, 'edit'])->name('edit');
    Route::put('/edit/{accountlist}', [A::class, 'update'])->name('update');
    Route::delete('/delete/{accountlist}', [A::class, 'destroy'])->name('delete');
    Route::get('/accountlist', [A::class, 'show'])->name('show');
    Route::get('/minus/{accountlist}', [A::class, 'moneysubstract'])->name('account-balance');
    Route::put('/minus/{accountlist}', [A::class, 'minus'])->name('withdraw');
    Route::get('/plus/{accountlist}', [A::class, 'moneycount'])->name('moneycount');
    Route::put('/plus/{accountlist}', [A::class, 'plus'])->name('plus');
});
