<?php

use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;

Route::get('finance', [FinanceController::class, 'finance'])->name('finance');
Route::get('finance-lib', [FinanceController::class, 'financeLib'])->name('finance.lib');
