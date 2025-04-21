<?php

use App\Http\Controllers\PizzaOrderController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('pizza')
    ->group(function () {
        Route::get('/', [PizzaOrderController::class, 'index'])
            ->name('pizza.index');
        Route::post('/order', [PizzaOrderController::class, 'store'])
            ->name('pizza.store');
    });
