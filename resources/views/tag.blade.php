@extends('layouts.app')
@foreach ($tags as $tag)

{{$tag->name ?? optional($tag->translate('hr'))->name}}
<br>
<a href="/tag/change/{{$tag->id}}"><button class="btn btn-blue">{{__('Change')}}</button></a>
<br>
<a onclick="return confirm('{{__('Are you sure you want to delete')}} {{$tag->name}}');"  href="/tag/delete/{{$tag->id}}"><button class="btn btn-blue">{{__('Delete')}}</button></a>
<br>
@endforeach
<br>
<a href="/tag/new"><button class="btn btn-blue">{{__('Add new tag')}}</button></a>
<br>
<a href="/">{{__('Homepage')}}</a>