<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('user.profile');
    Route::get('/transaction', [App\Http\Controllers\HomeController::class, 'transaction'])->name('user.transaction');
    Route::get('/bill', [App\Http\Controllers\HomeController::class, 'bill'])->name('user.bill');
    Route::get('/history/{id}', [App\Http\Controllers\HomeController::class, 'history'])->name('user.history');
    Route::post('/bill/print', [App\Http\Controllers\HomeController::class, 'generatePDF'])->name('user.generatePDF');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/tenants', [App\Http\Controllers\AdminController::class, 'tenants'])->name('admin.tenants');
    Route::get('/admin/tenants/add', [App\Http\Controllers\AdminController::class, 'Addtenant'])->name('admin.Addtenant');
    Route::get('/admin/tenants/{id}', [App\Http\Controllers\AdminController::class, 'EditTenant'])->name('admin.EditTenant');
    Route::get('/admin/bills', [App\Http\Controllers\AdminController::class, 'bills'])->name('admin.bills');
    Route::get('/admin/bills/{id}', [App\Http\Controllers\AdminController::class, 'AddBills'])->name('admin.AddBills');
    Route::get('/admin/transactions', [App\Http\Controllers\AdminController::class, 'transactions'])->name('admin.transactions');
    Route::get('/admin/transaction/{id}', [App\Http\Controllers\AdminController::class, 'Editbills'])->name('admin.Editbills');


    Route::post('/admin/add', [App\Http\Controllers\AdminController::class, 'SubmitTenant'])->name('admin.SubmitTenant');
    Route::post('/admin/tenant/edit', [App\Http\Controllers\AdminController::class, 'SubmitEditTenant'])->name('admin.SubmitEditTenant');
    Route::post('/admin/bills/add', [App\Http\Controllers\AdminController::class, 'SubmitBills'])->name('admin.SubmitBills');
    Route::post('/admin/bills/update', [App\Http\Controllers\AdminController::class, 'UpdateBills'])->name('admin.UpdateBills');
    Route::post('/admin/bills/pending', [App\Http\Controllers\AdminController::class, 'pending'])->name('admin.pending');
    Route::post('/admin/bills/paid', [App\Http\Controllers\AdminController::class, 'paid'])->name('admin.paid');
    Route::post('/admin/tenant/delete', [App\Http\Controllers\AdminController::class, 'deleteTenant'])->name('admin.deleteTenant');

});
