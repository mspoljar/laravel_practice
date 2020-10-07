<?php

use Illuminate\Support\Facades\Route;
use App\Meal;
use App\Ingredient;
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
    return view('welcome');
});
/*
Route::get('/about', function (){
    //return view('about');
    echo 'About';
});
Route::get('/contact', function(){
    //return view('contact');
    echo 'contact';
});
Route::get('/post/{id}',function($id){
    return "This is post number " . $id;
});
Route::get('/admin/posts/example', array('as'=>'admin.home', function()
{

    $url = route('admin.home');
    return "this url is " . $url;

}));
*/
//Route::get('/post/{id}','PostsController@index');
//Route::resource('posts', 'PostsController');
//Route::get('/contact','PostsController@contact');
//Route::get('/post/{id}/{name}/{password}','PostsController@show_post');

Route::get('/meal/{id}/ingredient',function($id){


    $meal=Meal::find($id);
    
      foreach($meal->ingredients as $ingredient){

        return $ingredient;
        
      }
       

});