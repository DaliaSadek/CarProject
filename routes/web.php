<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarWebsiteController;

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
    Route::get('messages', function () {
        return view('admin/messages');
    })->name('messages');
});
