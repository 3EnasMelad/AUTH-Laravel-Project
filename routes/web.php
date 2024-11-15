<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::middleware(['auth'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('Home2');
});










Route::middleware(['auth'])->get('/home', [CustomerController::class, 'index'])->name('customers.index');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
