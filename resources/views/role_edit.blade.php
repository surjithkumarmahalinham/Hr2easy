@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Role Edit</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('role-list')}}">Role List</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Role Edit</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role Edit</h4>
                    </div>

                    <div class="card-body">
                        <form id="role-form" data-parsley-validate="">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Role Name</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="text" class="form-control" name="role_name" id="role_name" value="{{$role_detail->role_name}}" required/>
                                    </div>

                                
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Role Permission</label>
                                </div>

                                <div class="col-6">
                                    @foreach($menu_lists as $menu_list)

                                    @if(in_array($menu_list->menu_id,explode(',',$role_detail->role_permission)))
                                        <input type="checkbox" checked="checked" name="role_permission[]"  value="{{$menu_list->menu_id}}"/> &nbsp; {{$menu_list->menu_name}} <br>
                                    @else
                                        <input type="checkbox" name="role_permission[]"  value="{{$menu_list->menu_id}}"/> &nbsp; {{$menu_list->menu_name}} <br>
                                    @endif  
                                    @endforeach
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Update" onclick="Update_Role();" />
                                    <a href="{{url('role-list')}}" class="btn btn-secondary">Cancel</a>
                                </div>

                            
                            </div>
                        </form>   


                        
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@include('common.footer')

    <script>
        function Update_Role(){
            var valdate = $('#role-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('role-form'));;

                $.ajax({

                    url: "{{ url('role-update/'.$role_detail->role_id) }}",
                    type: 'POST',
                    data: formdata,
                    dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function (response)
                    {
                        if(response.status==200){
                            alert(response.msg);
                            window.location.href = "{{ url('role-list')}}";
                        }else if(response.status==201){
                            alert(response.msg);
                        }

                    }

                });

            }
        }
    </script>

</body>
</html>