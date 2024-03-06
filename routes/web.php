<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Articles\ArticleController;

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
// Route::get('/users', function () {
//     return "These are the users.";
// });
// Dynamic route
// Route::get('/users/{id}', function ($id) {
//     return "This is user $id.";
// });

Route::get('/articles', [ArticleController::class, 'index']);
