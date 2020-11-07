<div>
<h1>{{$meal->name}}</h1>
@foreach ($ingredients as $ingredient)
    <li>
    {{$ingredient['name']}}
    </li>
@endforeach
@foreach ($tags as $tag)
    <li>
        {{$tag['name']}}
    </li>
@endforeach
</div>