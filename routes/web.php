<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\TypeController;
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

// Login
Route::get('/', [SigninController::class, 'index'])->name('login');
Route::post('post-login', [SigninController::class, 'login'])->name('post.login');
Route::get('logout', [SigninController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
// Page
    Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::any('edit', [PageController::class, 'edit'])->name('edit');
    Route::any('page/update/{operation_id}', [PageController::class, 'update'])->name('page.update');
    Route::any('page/save/{operation_id}', [PageController::class, 'saved'])->name('page.save');
    Route::post('page/delete', [PageController::class, 'delete']);
// Type
    Route::any('type/view', [TypeController::class, 'view'])->name('type');
    Route::get('type/edit/{typeoperation_id}', [TypeController::class, 'edit'])->name('type.edit');
    Route::post('type/update/{typeoperation_id}', [TypeController::class, 'update'])->name('type.update');
    Route::any('type/delete/{typeoperation_id}', [TypeController::class, 'delete'])->name('type.delete');
    Route::any('type/add', [TypeController::class, 'add'])->name('type.add');
});
