<form action="/tag/update" method="post">
    @csrf
    <label>{{__('Tag name')}}
    <input type="text" name="name" id="name" value="{{$tag->name}}">
    </label>
    <br>
    <label>{{__('Slug name')}}
    <input type="text" name="slug" id="slug" value="{{$tag->slug}}">
    </label>
    <br>
    <input type="submit" value="{{__('Change tag')}}">
    <input type="hidden" name="id" value="{{$tag->id}}">
    </form>