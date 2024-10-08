<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ExpensesController::class)->group(function () {
    Route::post('/expenses/store', 'store')->name('expenses.store');
    Route::post('/expenses/import', 'importFromCsv')->name('expenses.import');
    Route::get('/expenses', 'index')->name('expenses.index');
    Route::get('/expenses/{id}', 'show')->name('expenses.show');
    Route::put('/expenses/{id}', 'update')->name('expenses.update');
    Route::delete('/expenses/{id}', 'destroy')->name('expenses.destroy');
});


Route::controller(UserController::class)->group(function () {
    Route::post('/user/store', 'store')->name('user.store');
});
