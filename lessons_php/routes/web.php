<?php

use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\IndexHomeController;
use App\Http\Controllers\News\IndexNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexHomeController::class, 'index'])->name('index');
Route::view('/about', 'about')->name('about');

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexAdminController::class, 'index'])->name('index');
        Route::get('/addnews', [IndexAdminController::class, 'addNews'])->name('addnews');
    });

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [IndexNewsController::class, 'index'])->name('index');
        Route::get('/category/{category_id}', [IndexNewsController::class, 'newsCategory'])->name('category');
        Route::get('/category/message/{id}', [IndexNewsController::class, 'newsItem'])->name('category.message');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
