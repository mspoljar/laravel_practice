@foreach ($tags as $tag)

{{$tag->name ?? optional($tag->translate('hr'))->name}}
    
@endforeach