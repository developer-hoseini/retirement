<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenIdController;
use App\Http\Controllers\LettersController;
use Illuminate\Http\Request;
use App\Http\Controllers\InvoiceController;
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
Route::get('openid/auth/office={office}&ver_code={ver_code}&nc={nc}', [OpenIdController::class, 'auth']);
/*
Route::get('openid/auth/office={office}&ver_code={ver_code}&nc={nc}', function (Request $request) {
	dd($request->route('ver_code'));
});
*/
Route::get('/logout', [\App\Http\Controllers\OpenIdController::class , 'logout'])->name('logout');


Route::middleware(['authOffice'])->group(function() {
	Route::get('/', [LettersController::class, 'index'])->name('home');
});



//Route::get('/', [LettersController::class, 'index'])->name('home');


Route::get('/sa', function () {
    return view('sa');
});

Route::get('letters/create', [LettersController::class, 'create'])->name('letters.create');
Route::post('letters/store', [LettersController::class, 'store'])->name('letters.store');
Route::get('letters/search', [LettersController::class, 'search'])->name('letters.search');
Route::post('letters/store-image', [LettersController::class, 'storeImage'])->name('letters.store.image');

Route::get('transactions', [InvoiceController::class, 'showTransactions'])->name('show.transactions');

Route::get('letters/register-payment' , [InvoiceController::class , 'index'])->middleware(["customerAccess"])->name('letters.register.payment');
Route::post('payment/verify/{amount}/{order_id}', [InvoiceController::class , 'verify']);
Route::get('payment/verify/{amount}/{order_id}', [InvoiceController::class , 'verify']);

