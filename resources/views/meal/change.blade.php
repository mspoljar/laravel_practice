<form action="/menu/changed" method="post">
    @csrf
    <label>Name
<input type="text" name="name" id="name" value={{$meal->name}}>
</label>
<div>
    <input type="submit" class="button expanded" value="{{__('Change meal')}}"></input>
  </div>
<input type="hidden" name="id" 
value={{$meal->id}}>
</form>