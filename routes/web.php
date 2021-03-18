<?php

use App\Http\Controllers\Admin\HomeController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cabinet', [App\Http\Controllers\Cabinet\HomeController::class, 'index'])->name('cabinet');



Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.',
        'middleware' => ['auth']
    ],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('users', 'UsersController');
    }
);
