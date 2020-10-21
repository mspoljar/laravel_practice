@extends('layouts.app')

@foreach ($results as $result)
    {{$result->name}}
    <br>
@endforeach