<form action="/search/searchresults" method="post">
    @csrf
    <label for="tag">{{__('Tags')}}</label>
    <select name="tag" id="tag">
        @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
    <br>
    <input type="submit">
    <input type="hidden" name="id" value=2>
    </form>