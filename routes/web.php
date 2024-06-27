<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\DishesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Models\Restaurant;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Chart\ChartController;

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

Route::get('/', [PageController::class, 'index'])->name('home');



Route::middleware(['auth', 'verified'])
                ->prefix('admin')
                ->name('admin.')
                ->group(function(){
                    // tutte le rotte protette da auth
                    Route::get('/',[RestaurantsController::class, 'index'])->name('home');

                    Route::get('/menu', [RestaurantsController::class, 'show'])->name('show');
                    Route::get('/create', [RestaurantsController::class, 'create'])->name('create');
                    Route::post('/store', [RestaurantsController::class, 'store'])->name('store');
                    // Route::get('/edit', [RestaurantsController::class, 'edit'])->name('edit');
                    // Route::put('/update', [RestaurantsController::class, 'update'])->name('update');
                    // Route::delete('/destroy', [RestaurantsController::class, 'destroy'])->name('destroy');

                    //! Rotta di creazione e salvataggio piatti
                    Route::get('/dishes/create', [DishesController::class, 'create'])->name('dishes.create');
                    Route::post('/dishes/store', [DishesController::class, 'store'])->name('dishes.store');

                    //? Rotta di Edit per il piatto
                    Route::get('/dishes/{dish}/edit', [DishesController::class, 'edit'])->name('dishes.edit');
                    Route::put('/dishes/{dish}/update', [DishesController::class, 'update'])->name('dishes.update');

                    //! Rotta per il delete piatti
                    Route::delete('/dishes/{dish}', [DishesController::class, 'destroy'])->name('dishes.destroy');

                    //ORDINI
                    Route::get('/ordini', [OrdersController::class, 'index'])->name('orders.index');
                    Route::get('/ordini/{order}', [OrdersController::class, 'show'])->name('orders.show');

                    //STATISTICHE

                    Route::get('/statistiche', [ChartController::class, 'chart']);
                });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
