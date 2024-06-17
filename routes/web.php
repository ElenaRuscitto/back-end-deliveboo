<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\DishesController;
use App\Models\Restaurant;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])
                ->prefix('admin')
                ->name('admin.')
                ->group(function(){
                    // tutte le rotte protette da auth
                    Route::get('/',[DashboardController::class, 'index'])->name('home');
                    Route::resource('/restaurants', RestaurantsController::class);

                    //! Rotta di creazione e salvataggio
                    Route::get('/restaurants/{restaurant}/dishes/create', [DishesController::class, 'create'])->name('dishes.create');
                    Route::post('/restaurants/{restaurant}/dishes', [DishesController::class, 'store'])->name('dishes.store');

                    //? Rotta di Edit per il piatto
                    Route::get('/dishes/{dish}/edit', [DishesController::class, 'edit'])->name('dishes.edit');
                    Route::patch('/dishes/{dish}/update', [DishesController::class, 'update'])->name('dishes.update');

                    //! Rotta per il delete
                    Route::delete('/restaurants/{restaurant}/dishes/{dish}', [DishesController::class, 'destroy'])->name('dishes.destroy');
                });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
