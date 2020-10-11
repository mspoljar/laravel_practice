@foreach($menu as $meal)

<td>{{ $meal->translate('en')->name }}</td>
<br>
    @endforeach
