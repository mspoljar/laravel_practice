<form action="/menu/changed" method="post" enctype="multipart/form-data">
    @csrf
    <label>{{__('Meal name')}}
<input type="text" name="name" id="name" value={{$meal->name}}>
</label>
<br>
<h3>{{__('Choose the ingredients')}}</h3>
@foreach ($ingredients as $ingredient)
    <input type="checkbox" name='ingredients[{{$ingredient->id}}]' value={{$ingredient->name}}>
    <label for="ingredients">{{$ingredient->name}}</label><br>
@endforeach
</div>
<div>
<h3>{{__('Choose the tags')}}</h3>
@foreach ($tags as $tag)
    <input type="checkbox" name='tags[{{$tag->id}}]' value={{$tag->name}}>
    <label for="tag">{{$tag->name}}</label><br>
@endforeach
</div>
<div>
    <h3>{{__('Choose the category')}}</h3>
@foreach ($categories as $category)
    <input type="checkbox" name='category' value={{$category->id}}>
    <label for="category">{{$category->name}}</label><br>
@endforeach
</div>
<div>
    <input type="submit" class="button expanded" value="{{__('Change meal')}}"></input>
  </div>
<input type="hidden" name="id" 
value={{$meal->id}}>
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