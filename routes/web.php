<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IngredientController;

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



Route::group(['middleware'=>'web'],function(){
    Route::get('/menu', [MealController::class, 'menu']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/tag',[TagController::class, 'index']);
    Route::get('/session',[UserController::class, 'index']);
    Route::get('/meal/change/{id}',[MealController::class, 'change']);
    Route::post('/menu/changed',[MealController::class,'update']);
    Route::get('/meal/delete/{id}',[MealController::class, 'delete']);
    Route::get('/menu/new', [MealController::class, 'new']);
    Route::post('/menu/addnew', [MealController::class, 'addnew']);
    Route::get('/show/meal/{id}', [MealController::class, 'show']);
    Route::get('/category/change/{id}',[CategoryController::class, 'change']);
    Route::post('/category/update',[CategoryController::class, 'update']);
    Route::get('/category/delete/{id}',[CategoryController::class, 'delete']);
    Route::get('/category/new',[CategoryController::class,'new']);
    Route::post('/category/addnew',[CategoryController::class, 'addnew']);
    Route::get('/tag/change/{id}', [TagController::class, 'change']);
    Route::post('/tag/update',[TagController::class, 'update']);
    Route::get('/tag/delete/{id}',[TagController::class, 'delete']);
    Route::get('/tag/new',[TagController::class, 'new']);
    Route::post('/tag/addnew',[TagController::class,'addnew']);
    Route::get('/ingredient',[IngredientController::class, 'index']);
    Route::get('/ingredient/change/{id}',[IngredientController::class, 'change']);
    Route::post('/ingredient/update',[IngredientController::class,'update']);
    Route::get('/ingredient/new',[IngredientController::class,'new']);
    Route::post('/ingredient/addnew',[IngredientController::class, 'addnew']);
    Route::get('/ingredient/delete/{id}',[IngredientController::class, 'delete']);
    Route::get('/search',[WelcomeController::class,'search']);
    Route::get('/search/meal',[WelcomeController::class,'meal']);
    Route::get('/search/category',[WelcomeController::class,'category']);
    Route::get('/search/ingredient',[WelcomeController::class,'ingredient']);
    Route::get('/search/tag',[WelcomeController::class,'tag']);
    Route::post('/search/searchresults',[WelcomeController::class,'searchresults']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
