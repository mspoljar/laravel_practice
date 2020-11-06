<div>
<h1>{{$meal->name}}</h1>
@foreach ($meal->ingredients as $ingredient)
    {{$ingredient->pivot->id}}
@endforeach
</div>