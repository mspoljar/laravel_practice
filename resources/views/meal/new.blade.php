<form action="/menu/addnew" method="post">
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
    <div>
        <input type="submit" class="button expanded" value="{{__('Add meal')}}"></input>
      </div>
<input type="hidden" name="id" 
value={{$id}}>
</form>
