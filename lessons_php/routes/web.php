<?php

use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\IndexHomeController;
use App\Http\Controllers\News\IndexNewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LoginController;

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

Route::view('/about', 'about')->name('about');
Route::view('/registration', 'registration')->name('registration');
Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('profile');
Route::match(['get', 'post'], '/users/export', [ExportController::class, 'exportNews'])->name('users.export');
Route::get('/auth/vk', [LoginController::class, 'loginVK'])->name('vklogin');
Route::get('/auth/yandex', [LoginController::class, 'loginYandex'])->name('yandexlogin');
Route::get('/auth/vk/response', [LoginController::class, 'responseVK'])->name('vkresponse');
Route::get('/auth/yandex/response', [LoginController::class, 'responseYandex'])->name('yandexresponse');

Route::controller(IndexHomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/account', 'account')->name('account');
        Route::match(['get', 'post'], '/add/user', 'addUser')->name('add.user');
    });

Route::controller(IndexAdminController::class)
    ->name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'role'])
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{categoryId}', 'editNews')->name('edit');
        Route::match(['get', 'post'], '/create', 'create')->name('create');
        Route::match(['get', 'post'], '/create/news', 'createNews')->name('create.news');
        Route::match(['get', 'post'], '/save', 'saveNews')->name('save');
        Route::match(['get', 'post'], '/category/{category}', 'editCategory')->name('category');
        Route::match(['get', 'post'], '/message/{news}', 'editMessage')->name('message');
        Route::match(['get', 'post'], '/parse/{id_source?}', [ParserController::class, 'index'])->name('parse');
        Route::name('delete.')
            ->prefix('delete')
            ->group(function () {
                Route::delete('/message/{id}', 'deleteMessage')->name('message');
                Route::delete('/category/{id}', 'deleteCategory')->name('category');
            });
    });

Route::controller(IndexNewsController::class)
    ->name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::prefix('category')
            ->group(function () {
                Route::get('/{categoryId}', 'newsCategory')->name('category');
                Route::get('/message/{news}', 'newsItem')->name('category.message');
            });
    });

//Auth::routes();
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
