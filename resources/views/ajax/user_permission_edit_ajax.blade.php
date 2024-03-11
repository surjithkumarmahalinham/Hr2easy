<div class="row form-group" id="userpermission_div">
                                
    <div class="col-3">
        <label>User Permission</label>
    </div>

    <div class="col-6">
        @foreach($menu_lists as $menu_list)
            @if(in_array($menu_list->menu_id,$permission))
                <label><input type="checkbox" name="user_permission[]"  checked="checked" value="{{$menu_list->menu_id}}"/> &nbsp; {{$menu_list->menu_name}}</label> <br>
            @else
            <label><input type="checkbox" name="user_permission[]"  value="{{$menu_list->menu_id}}"/> &nbsp; {{$menu_list->menu_name}}</label> <br>
            @endif

        @endforeach
    </div>

</div>