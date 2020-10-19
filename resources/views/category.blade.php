@extends('layouts.app')
@foreach($categories as $category)


{{$category->name ?? optional($category->translate('hr'))->name}}
<br>
<a href="/ingredient/change/{{$category->id}}"><button class="btn btn-blue">{{__('Change')}}</button></a>
<br>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$category->name}}');"  href="/category/delete/{{$category->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
<br>
<a href="/category/new"><button class="btn btn-blue">{{__('Add new category')}}</button></a>
<br>
<a href="/">{{__('Homepage')}}</a>
