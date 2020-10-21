@extends('layouts.app')
@foreach ($meals as $meal)
<img height="250" src="{{$meal->path}}" alt="">
<br>
{{$meal->name ?? optional($meal->translate('hr'))->name}}
<br>
<a href="/meal/change/{{$meal->id}}"><button class="btn btn-blue">{{__('Change')}}</button></a>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$meal->name}}');"  href="/meal/delete/{{$meal->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
{{$meals->links()}}
<a href="/menu/new">{{__('Add new meal')}}</a>
<br>
<a href="/">{{__('Homepage')}}</a>