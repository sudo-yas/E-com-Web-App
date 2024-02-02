<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/addproduct', [App\Http\Controllers\ProductController::class, 'create'])->name('addproduct');
Route::post('/addproduct', [App\Http\Controllers\ProductController::class, 'store']);

// Route::get('/deleteproduct', [App\Http\Controllers\ProductController::class, 'delete'])->name('deleteproduct');
//Route::post('/products/{product}/delete', 'ProductController@delete')->name('deleteproduct');
Route::post('/products/{product}/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('deleteproduct');


Route::get('/editproduct/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editproduct');
Route::post('/products/{product}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('updateproduct');

// Route::get('/editproduct', [App\Http\Controllers\ProductController::class, 'create'])->name('editproduct');