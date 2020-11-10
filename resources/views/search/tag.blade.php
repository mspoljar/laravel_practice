<form action="/searchtag" method="get">
<label for="tag">{{__('Tag')}}</label>
<select name="tag" id="tag">
    <option value="">-</option>
    @foreach ($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
</select>
<br>
<label for="per_page">{{__('Results per page')}}</label>
<input type="number" name="per_page" id="per_page">
<br>
<label for="lang">{{__('Choose the language')}}</label>
<select name="lang" id="lang">
    @foreach (config('app.languages') as $langLocale => $langName)
<option value="{{$langLocale}}">{{$langName}}</option>
    @endforeach
</select>
<br>
<input type="submit" value="{{__('Search')}}">
</form>