<form action="/tag/addnew" method="post">
    @csrf
<label>{{__('Tag name for english version')}}
<div>
    <input type="text" name="enname" id="enname">
</div>
</label>
<br>
<label>{{__('Tag name for croatian version')}}
    <div>
        <input type="text" name="hrname" id="hrname">
    </div>
    </label>
    <br>
<label>{{__('Slug name for english version')}}
        <div>
            <input type="text" name="enslug" id="enslug">
        </div>
 </label>
 <br>
<label>{{__('Slug name for croatian version')}}
            <div>
                <input type="text" name="hrslug" id="hrslug">
            </div>
</label>
<br>
    <div>
        <input type="submit" class="button expanded" value="{{__('Add tag')}}"></input>
      </div>
<input type="hidden" name="id" 
value={{$id}}>
</form>
