<form action="/menu/addnew" method="post" enctype="multipart/form-data">
    @csrf
<label>{{__('Meal name for english version')}}
<div>
    <input type="text" name="enname" id="enname">
</div>
</label>

<label>{{__('Meal name for croatian version')}}
    <div>
        <input type="text" name="hrname" id="hrname">
    </div>
</label>
<input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
    <div>
        <input type="submit" class="button expanded" value="{{__('Add meal')}}"></input>
      </div>
<input type="hidden" name="id" 
value={{$id}}>
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