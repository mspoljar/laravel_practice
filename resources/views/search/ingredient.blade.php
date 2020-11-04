@extends('layouts.app')
<form action="/search/searchresults" method="post">
    @csrf
    <label for="ingredient">{{__('Ingredients')}}</label>
    <select name="ingredient" id="ingredient">
        @foreach ($ingredients as $ingredient)
            <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit">
    <input type="hidden" name="id" value=3>
    </form>