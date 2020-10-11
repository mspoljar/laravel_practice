@foreach($categories as $category)

<td>{{ $category->translate('en')->name }}</td>
<br>
    @endforeach
