<?php

use App\Http\Controllers\AttachCarController;
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
use App\Http\Controllers\BuyCarController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\ClientController;

Route::get('/', [SalonController::class, 'index'])->name('salon.index');

// Salon routes
Route::get('/salons', [SalonController::class, 'index'])->name('salons.index');
Route::get('/salons/create', [SalonController::class, 'create'])->name('salons.create');
Route::post('/salons', [SalonController::class, 'store'])->name('salons.store');
Route::get('/salons/{salon}/edit', [SalonController::class, 'edit'])->name('salons.edit');
Route::put('/salons/{salon}', [SalonController::class, 'update'])->name('salons.update');
Route::delete('/salons/{salon}', [SalonController::class, 'destroy'])->name('salons.destroy');

// Brand routes
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

// Country routes
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
Route::get('/countries/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
Route::put('/countries/{country}', [CountryController::class, 'update'])->name('countries.update');
Route::delete('/countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');

// Autos routes
Route::get('/autos', [AutoController::class, 'index'])->name('autos.index');
Route::get('/autos/create', [AutoController::class, 'create'])->name('autos.create');
Route::get('/autos/{auto}', [AutoController::class, 'show'])->name('autos.show');
Route::post('/autos', [AutoController::class, 'store'])->name('autos.store');
Route::get('/autos/{auto}/edit', [AutoController::class, 'edit'])->name('autos.edit');
Route::put('/autos/{auto}', 'AutoController@update')->name('autos.update');
Route::delete('/autos/{auto}', [AutoController::class, 'destroy'])->name('autos.destroy');
Route::get('autos/{auto}/detachClient', [AutoController::class, 'detachClient'])->name('autos.detachClient');
Route::resource('autos', AutoController::class);
Route::delete('autos/{auto}/deleteWithClient', [AutoController::class, 'deleteWithClient'])->name('autos.deleteWithClient');

// Client routes
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');// Client routes
Route::get('/clients/all', [ClientController::class, 'allIndex'])->name('clients.allIndex');
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

Route::post('/clients/{client}/detach/{auto}', [AttachCarController::class, 'detach'])->name('clients.detachCar');
Route::post('/clients/{client}/attach/{auto}', [ClientController::class, 'attachCar'])->name('clients.attachCar');

Route::delete('/clients/{client}/{auto}', [BuyCarController::class, 'destroy'])->name('clients.buyCar');
Route::post('/clients/{client}/{auto}', [BuyCarController::class, 'buyCar'])->name('clients.buyCar');



