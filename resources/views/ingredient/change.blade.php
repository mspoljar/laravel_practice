@extends('layouts.app')
<form action="/ingredient/update" method="post" enctype="multipart/form-data">
    @csrf
<input type="text" name="name" id="name" value="{{$ingredient->name}}">
<br>
<input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
<br>
<input type="submit" value="{{__('Change ingredient\'s name')}}">
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