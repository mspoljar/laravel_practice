<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('welcome-locale', app()->getLocale());
})->name('welcome');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome-locale');
});

Route::get('/menu', [MealController::class, 'menu']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/tag',[TagController::class, 'index']);
Route::get('/session',[UserController::class, 'index']);
Route::get('/meal/change/{id}',[MealController::class, 'change']);
Route::post('/menu/changed',[MealController::class,'changed']);
Route::get('/meal/delete/{id}',[MealController::class, 'delete']);
Route::get('/menu/new', [MealController::class, 'new']);
Route::post('/menu/addnew', [MealController::class, 'addnew']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
