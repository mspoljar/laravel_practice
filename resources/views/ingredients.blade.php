@extends('layouts.app')

@foreach($ingredients as $ingredient)

<img height="250" src="{{$ingredient->path}}" alt="">
<br>
{{$ingredient->name ?? optional($ingredient->translate('hr'))->name}}
<br>
<a href="/ingredient/change/{{$ingredient->id}}"><button class="btn btn-blue">{{__('Change')}}</button></a>
<br>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$ingredient->name}}');"  href="/ingredient/delete/{{$ingredient->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
{{$ingredients->links()}}
<br>
<a href="/ingredient/new"><button class="btn btn-blue">{{__('Add new ingredient')}}</button></a>
<br>
<a href="/">{{__('Homepage')}}</a>