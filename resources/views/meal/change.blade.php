<form action="/menu/changed" method="post" enctype="multipart/form-data">
    @csrf
    <label>{{__('Meal name')}}
<input type="text" name="name" id="name" value={{$meal->name}}>
</label>
<br>
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