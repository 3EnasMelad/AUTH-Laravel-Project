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




use App\Http\Controllers\FormController;

Route::middleware(['auth'])->get('/forms', [FormController::class, 'index'])->name('forms.index'); // لعرض جميع النماذج
Route::middleware(['auth'])->get('/forms/create', [FormController::class, 'create'])->name('forms.create'); // لعرض صفحة إنشاء نموذج جديد
Route::post('/forms', [FormController::class, 'store'])->name('forms.store'); // لحفظ نموذج جديد

Route::get('/forms/{form}/fill', [FormController::class, 'fill'])->name('forms.fill'); // لعرض نموذج معين للتعبئة
Route::post('/forms/{form}/submit', [FormController::class, 'submitForm'])->name('forms.submit'); // لحفظ البيانات المدخلة في نموذج معين
Route::delete('/forms/{id}', [FormController::class, 'destroy'])->name('forms.destroy');






Route::middleware(['auth'])->get('/home', [CustomerController::class, 'index'])->name('customers.index');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
