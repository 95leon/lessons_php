<?php

use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\IndexHomeController;
use App\Http\Controllers\News\IndexNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

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
Route::match(['get', 'post'], '/users/export/', [ExportController::class, 'exportNews'])->name('users.export');

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexAdminController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [IndexAdminController::class, 'create'])->name('create');
        Route::match(['get', 'post'], '/save', [IndexAdminController::class, 'saveNews'])->name('save');
        Route::get('/edit/{categoryId}', [IndexAdminController::class, 'editNews'])->name('edit');
        Route::match(['get', 'post'], '/category/{category}', [IndexAdminController::class, 'editCategory'])->name('category');
        Route::match(['get', 'post'], '/message/{news}', [IndexAdminController::class, 'editMessage'])->name('message');
        Route::name('delete.')
            ->prefix('delete')
            ->group(function () {
                Route::delete('/message/{id}', [IndexAdminController::class, 'deleteMessage'])->name('message');
                Route::delete('/category/{id}', [IndexAdminController::class, 'deleteCategory'])->name('category');
            });
    });

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [IndexNewsController::class, 'index'])->name('index');
        Route::prefix('category')
            ->group(function () {
                Route::get('/{categoryId}', [IndexNewsController::class, 'newsCategory'])->name('category');
                Route::get('/message/{news}', [IndexNewsController::class, 'newsItem'])->name('category.message');
            });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
