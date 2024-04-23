<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // customer
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('customer/listing', [CustomerController::class, 'list'])->name('customer.list');
    Route::get('customer/sale-listing/{id}', [CustomerController::class, 'saleList'])->name('customer.sale.list');
    Route::get('customer/payment/{id}', [CustomerController::class, 'payment'])->name('customer.view');
    Route::post('customer/payment/save', [CustomerController::class, 'paymentSave'])->name('customer.payment.save');
    
    Route::post('check/remaining/weight',[CustomerController::class,'checkRemainingWeight'])->name('check.remaining.weight');

    // sale
    Route::get('sale', [SaleController::class, 'index'])->name('sale');
    Route::get('sale/listing', [SaleController::class, 'list'])->name('sale.list');
    Route::get('sale/create', [SaleController::class, 'create'])->name('sale.create');
    Route::post('sale/save', [SaleController::class, 'save'])->name('sale.save');

});

require __DIR__.'/auth.php';
