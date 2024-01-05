<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;

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

//Route::get('/{page}', [AdminController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])-> prefix('cpanel')->group(function () {
    // /cpanel
  
        Route::get('', [AdminController::class, 'index']);

        //   /category
        // Route::resource('category', CategoryController::class);

        Route:: prefix('category')->group(function () {
            Route::get('show', [CategoryController::class, 'index']);
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('save', [CategoryController::class, 'store'])->name('category.save');

            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update');

            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        });

        //   /news
        // Route::resource('news/show', NewsController::class);
        // Route::resource('news', NewsController::class);
        
        Route:: prefix('news')->group(function () {
            Route::get('show', [NewsController::class, 'index']);
            Route::get('add', [NewsController::class, 'create']);
            Route::post('save', [NewsController::class, 'store'])->name('news.save');

            Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
            Route::post('update/{id}', [NewsController::class, 'update'])->name('news.update');

            Route::delete('delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');
        });
        
        //   /tags

        Route:: prefix('tags')->group(function () {
            Route::get('show', [TagController::class, 'index']);
            Route::get('add', [TagController::class, 'create']);
            Route::post('save', [TagController::class, 'store'])->name('tags.save');

            Route::get('edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
            Route::post('update/{id}', [TagController::class, 'update'])->name('tags.update');

            Route::delete('delete/{id}', [TagController::class, 'destroy'])->name('tags.delete');
        });


        
   });
   
require __DIR__.'/auth.php';
