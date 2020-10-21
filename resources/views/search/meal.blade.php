<form action="/search/searchresults" method="post">
    @csrf
<input type="text" name="query" id="query">
<input type="submit">
<input type="hidden" name="id" value=0>
</form>