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
        $categories=Category::all();
        return view('welcome',compact('categories'));
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
        $tags=[];
        $ingredients=[];
        $pagarray=[];
        $i=1;
        $Primarymeals=Meal::where('category_id','=',$request->category)->paginate($request->per_page);
        $category=Category::findorfail($request->category)->first()->toArray();
        
        if(isset($request->with)){
            $f=$request->with;
        }else{
            $f=[];
        };
     
            foreach($Primarymeals->items() as $meal){
                foreach($meal->translations as $m){
                    if($m->locale==$request->lang){
                        $ar=[
                            'id'=>$m->id,
                            'title'=>$m->name,
                            'description'=>$m->description,
                        ];
                    }
                }

                if(in_array('tags',$f)){
                    $tar=[];
                    foreach($meal->tags as $tag){
                        foreach($tag->translations as $t){
                            if($t->locale==$request->lang){
                                $tar[]=array(
                                'id'=>$t->id,
                                'name'=>$t->name,
                                'slug'=>$t->slug, 
                                );}
                        }
                    }
                }

                if(in_array('ingredients',$f)){
                    $iar=[];
                    foreach($meal->ingredients as $ingredient){
                        foreach($ingredient->translations as $i)
                        {
                            if($i->locale==$request->lang){
                                $iar[]=[
                                    'id'=>$i->id,
                                    'name'=>$i->name,
                                    'slug'=>$i->slug, 
                                        ];
                                } 
                        }
                    }
                };
                if(in_array('category',$f)){
                    $data[]=[
                        'id'=>$ar['id'],
                        'title'=>$ar['title'],
                        'description'=>$ar['description'],
                        'category'=>[
                            'id'=>$category['id'],
                            'name'=>$category['name'],
                            'slug'=>$category['slug'],
                        ],
                    ];
                }else{
                    $data[]=[
                        'id'=>$ar['id'],
                        'title'=>$ar['title'],
                        'description'=>$ar['description'],
                    ]; 
                }
                if(in_array('tags',$f)){
                    $data[]=[
                        'tags'=>$tar,
                    ];
                }
                if(in_array('ingredients',$f)){
                    $data[]=[
                        'ingredients'=>$iar,
                    ];
                }
            }

        $meta=[
            'currentPage'=>$request->page,
            'totalItems'=>$Primarymeals->total(),
            'itemsPerPage'=>$request->per_page,
            'totalPage'=>ceil($Primarymeals->total()/$request->per_page),
        ];
        

        $links=[
            'prev'=>$Primarymeals->previousPageUrl(),
            'next'=>$Primarymeals->nextPageUrl(),
            'self'=>$Primarymeals->url($request->page),
        ];
        
        $result=[
           'meta'=>$meta,
           'data'=>$data,
           'links'=>$links,
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
