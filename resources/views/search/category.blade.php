<form action="/search/searchresults" method="post">
@csrf
<label for="category">{{__('Categories')}}</label>
<select name="category" id="category">
    <option value="">-</option>
    @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>
<br>
<input type="submit">
<input type="hidden" name="id" value=1>
</form>