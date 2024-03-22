<?php

use App\Http\Controllers\Article\ArticleController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

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

// static route
Route::get('/users', function () {
    return "These are the users.";
})->name('user.index');
// Dynamic route
Route::get('/users/{id}', function ($id) {
    return "This is user $id.";
});


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('articles', ArticleController::class);
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('permissions', PermissionController::class)->middleware('auth');

Route::get('/employee',[EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}',[EmployeeController::class, 'show'])->name('employee.show');
