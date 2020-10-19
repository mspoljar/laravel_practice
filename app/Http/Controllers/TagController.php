<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //

    public function index()
    {
        return view('tag',['tags'=>Tag::all()]);
    }

    public function change($id)
    {
        $tag=Tag::findorFail($id);
        return view('tag.change',['tag'=>$tag]);
    }

    public function update(Request $request)
    {
            $lang=$request->session()->get('language');
            $tag=Tag::findorFail($_POST['id']);
            $tag->tagTranslation()->whereLocale($lang)->update(['name'=>$_POST['name'],'slug'=>$_POST['slug']]);
            return redirect('/tag');
    }

    public function delete($id)
    {
        $tag=Tag::findorFail($id);
        $tag->tagTranslation()->delete();
        $tag->delete();
        return redirect('/tag');
    }

    public function new()
    {
        $tag=new Tag;
        $tag->save();
        $id=$tag->id;
        return view('tag.new',['id'=>$id,'tag'=>$tag]);
    }

    public function addnew()
    {
        $tag=Tag::findorFail($_POST['id']);
        $tag->tagTranslation()->create(['locale'=>'en','name'=>$_POST['enname'], 'slug'=>$_POST['enslug']]);
        $tag->tagTranslation()->create(['locale'=>'hr','name'=>$_POST['hrname'], 'slug'=>$_POST['hrslug']]);
        return redirect('/tag');
    }
}
