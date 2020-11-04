<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('category',['categories'=>Category::all()]);
    }

    public function change($id)
    {
        $category=Category::findorFail($id);
        return view('category.change',['category'=>$category]);
    }

    public function update(Request $request)
    {
            $lang=$request->session()->get('language');
            $category=Category::findorFail($_POST['id']);
            $validatedData=$request->validate([
                'name'=>'required',
                'slug'=>'required'
            ]);
            $category->categoryTranslation()->whereLocale($lang)->update(['name'=>$_POST['name'],'slug'=>$_POST['slug']]);
            return redirect('/category');
    }
    
    public function delete($id)
    {
        $category=Category::findorFail($id);
        $category->categoryTranslation()->delete();
        $category->delete();
        return redirect('/category');
    }

    public function new()
    {
        $category= new Category;
        $category->save();
        $id=$category->id;
        return view('category.new',['category'=>$category,'id'=>$id]);
    }

    public function addnew(Request $request)
    {
        $category=Category::findorFail($request->id);
        $validatedData=$request->validate([
            'enname'=>'required',
            'enslug'=>'required',
            'hrname'=>'required',
            'hrslug'=>'required'
        ]);
        $category->categoryTranslation()->create(['locale'=>'en','name'=>$request->enname, 'slug'=>$request->enslug]);
        $category->categoryTranslation()->create(['locale'=>'hr','name'=>$request->hrname, 'slug'=>$request->hrslug]);
        return redirect('/category');
    }
}
