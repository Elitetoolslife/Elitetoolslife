<?php

use App\Http\Controllers\BalanceController;





Route::get('/add-balance', [BalanceController::class, 'showForm'])->name('balance.form');
Route::post('/add-balance', [BalanceController::class, 'addBalance'])->name('balance.add');