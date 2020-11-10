<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ingredient;
use App\Http\Controllers\App;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function search()
    {
        return view('search');
    }

    public function meal()
    {
        return view('search.meal');
    }

    public function category()
    {
        $categories=Category::all();
        return view('search.category',['categories'=>$categories]);
    }

    public function tag()
    {
        $tags=tag::all();
        return view('search.tag',['tags'=>$tags]);
    }

    public function ingredient()
    {
        $ingredients=ingredient::all();
        return view('search.ingredient',['ingredients'=>$ingredients]);
    }

    public function categoryresult(Request $request)
    {
    
        $data=[];
        $tempdata=[];
        $tags=[];
        $ingredients=[];
        $mealtags=Meal::where('category_id','=',$request->category)->get();
        foreach($mealtags as $meal)
        {
            foreach($meal->tags as $tag)
            {
             foreach($tag->translations as $t){
                if($t->locale==$request->lang){
                    $tags[]=[
                    'id'=>$t->id,
                    'name'=>$t->name,
                    'slug'=>$t->slug, 
                     ];}
             }
            }
        };
        $mealingredients=Meal::where('category_id','=',$request->category)->get();
       foreach($mealingredients as $meal)
        {
            foreach($meal->ingredients as $ingredient)
            {
                foreach($ingredient->translations as $i)
                {
                    if($i->locale==$request->lang)
                    {
                    $ingredients[]=[
                        'id'=>$i->id,
                        'name'=>$i->name,
                        'slug'=>$i->slug, 
                         ];
                    }
                }
            }
        };
        $mealcount=Meal::where('category_id','=',$request->category)->get();
        $category=Category::findorfail($request->category)->first()->toArray();
       $meal=Meal::where('category_id','=',$request->category)->paginate($request->per_page)->toArray();
       //for($i=0,$i<count($meal['data']['translation']))
       $meta=[
           'currentPage'=>$request->page,
           'totalItems'=>count($mealcount),
           'itemsPerPage'=>$request->per_page,
           'totalPage'=>ceil(count($mealcount)/$request->per_page)
       ];
       foreach($mealcount as $meal){
           foreach($meal->translations as $m)
           {
                if($m->locale==$request->lang)
                {
                    $data[]=[
                        'id'=>$m->id,
                        'title'=>$m->name,
                        'description'=>$m->description,
                        'category'=>[
                            'id'=>$category['id'],
                            'name'=>$category['name'],
                            'slug'=>$category['slug'],
                        ],
                        'tags'=>$tags,
                        'ingredients'=>$ingredients,
                    ];
                }
           }
       }
       $result=[
           'meta'=>$meta,
           'data'=>$data,
       ];
        return view('search.result',compact('result'));
    }

    public function test()
    {
        $data=[];
        $test=Meal::whereCategory_id(1)->get();     
        foreach($test as $t){
            foreach($t->translations as $tr){
               if($tr->locale=='en'){
                $data[]=$tr;
               }
            }
        }
        
        return view('test', compact('data'));
    }
    
}
