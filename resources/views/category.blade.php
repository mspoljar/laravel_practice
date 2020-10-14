@foreach($categories as $category)


{{$category->name ?? optional($category->translate('hr'))->name}}
<br>
@endforeach
