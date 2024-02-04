<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarWebsiteController;
use App\Http\Controllers\CategoryController;

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

Route::get('index', [CarWebsiteController::class, 'index'])->name('index');
Route::get('listing', [CarWebsiteController::class, 'listing'])->name('listing');
Route::get('testimonial', [CarWebsiteController::class, 'testimonial'])->name('testimonial');
Route::get('about', [CarWebsiteController::class, 'about'])->name('about');
Route::get('blog', [CarWebsiteController::class, 'blog'])->name('blog');
Route::get('contact', [CarWebsiteController::class, 'contact'])->name('contact');
Route::get('single/{id}', [CarWebsiteController::class, 'single'])->name('single');

Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'verified'], function () {

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('createCategory', [CategoryController::class, 'create'])->name('createCategory');
    Route::post('storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::get('deleteCategory/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

    Route::get('messages', function () {
        return view('admin/messages');
    })->name('messages');
});
