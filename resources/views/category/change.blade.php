<form action="/category/update" method="post">
@csrf
<label>{{__('Category name')}}
<input type="text" name="name" id="name" value="{{$category->name}}">
</label>
<br>
<label>{{__('Slug name')}}
<input type="text" name="slug" id="slug" value="{{$category->slug}}">
</label>
<br>
<input type="submit" value="{{__('Change category')}}">
<input type="hidden" name="id" value="{{$category->id}}">
</form>
@if (count($errors)>0)


<div class="alert">
     <ul>
         @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
         @endforeach
     </ul>
</div>
    
@endif