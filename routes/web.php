<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

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

Route::resource('customers', CustomerController::class);
Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');

Route::get('/customers/{customer}/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/customers/{customer}/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('customers/{customer}/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('customers/{customer}/orders/edit/{order}', [OrderController::class, 'edit'])->name('orders.edit');
Route::post('/customers/{customer}/orders/{order}/update', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/customers/{customer}/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::resource('vehicles', VehicleController::class);
Route::get('vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');