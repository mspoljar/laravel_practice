@extends('layouts.app')
<form action="/ingredient/addnew" method="post" enctype="multipart/form-data">
    @csrf
<label>{{__('Ingredient name for english version')}}
        <div>
            <input type="text" name="enname" id="enname">
        </div>
</label>
<br>
<label>{{__('Ingredient name for croatian version')}}
    <div>
        <input type="text" name="hrname" id="hrname">
    </div>
</label>
<br>
<label>{{__('Ingredient slug for english version')}}
    <div>
        <input type="text" name="enslug" id="enslug">
    </div>
</label>
<br>
<label>{{__('Ingredient slug for croatian version')}}
    <div>
        <input type="text" name="hrslug" id="hrslug">
    </div>
</label>
<br>
<input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
<br>
<input type="submit" value="{{__('Add new ingredient')}}">
<input type="hidden" name="id" value="{{$ingredient->id}}">
</form>

@if (count($errors)>0)


<div class="alert">
     <ul>
         @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
         @endforeach
     </ul>
</div>
    
@endif
