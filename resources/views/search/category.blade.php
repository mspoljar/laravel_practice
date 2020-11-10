<form action="/searchcat" method="get">
<label for="category">{{__('Categories')}}</label>
<select name="category" id="category">
    <option value=null>-</option>
    @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>
<br>
<label for="per_page">{{__('Results per page')}}</label>
<input type="number" name="per_page" id="per_page">
<br>
<label for="page">{{__('Page number')}}</label>
<input type="number" name="page" id="page">
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