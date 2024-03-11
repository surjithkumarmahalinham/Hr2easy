@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>User Profile</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User Profile</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Profile</h4>
                    </div>

                    <div class="card-body">
                        <form id="user-form" data-parsley-validate="">
                        <input type="hidden" name="user_type"  value="{{$user_detail->user_type}}" />
                            @csrf
                            {{ method_field('PUT') }}

                            @if($user_detail->user_type==1)
                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Role Name</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="hidden" name="role_id" id="role_id" value="{{$user_detail->role_id}}"/>
                                       <select class="form-control" name="roles_id" id="roles_ids" disabled >
                                            <option value="">Select Role</option>
                                            @foreach($role_lists as $role_list)
                                                @if($role_list->role_id==$user_detail->role_id)
                                                    <option value="{{$role_list->role_id}}" selected="selected">{{$role_list->role_name}}</option>
                                                @else
                                                    <option value="{{$role_list->role_id}}">{{$role_list->role_name}}</option>
                                                @endif    
                                            @endforeach
                                        </select>
                                    </div>

                            </div>
                            @endif

                            @if($user_detail->user_type==2)
                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Reference Name</label>
                                </div>

                                <div class="col-6">
                                <input type="hidden" name="reference_userid" id="reference_userid" value="{{$user_detail->reference_userid}}"/>
                                    <select class="form-control"  disabled>
                                        <option value="0">Select User Reference</option>
                                        @foreach($user_reference_lists as $user_reference_list)

                                            @if($user_reference_list->user_id==$user_detail->reference_userid)
                                                <option value="{{$user_reference_list->user_id}}" selected="selected">{{$user_reference_list->user_name}}</option>
                                            @else
                                                <option value="{{$user_reference_list->user_id}}">{{$user_reference_list->user_name}}</option>
                                            @endif    
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            @endif

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Name</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="user_name" id="user_name" value="{{$user_detail->user_name}}" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Password</label>
                                </div>

                                <div class="col-6">
                                    <input type="password" class="form-control" name="user_pwd" id="user_pwd"/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Email</label>
                                </div>

                                <div class="col-6">
                                    <input type="email" class="form-control" name="user_email" id="user_email" value="{{$user_detail->user_email}}" readonly required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Mobile</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="user_mobile" id="user_mobile" value="{{$user_detail->user_mobile}}" onkeypress="return isNumberKey(event);" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Logo</label>
                                </div>

                                <div class="col-6">
                                    <input type="file" class="form-control" name="user_logo" id="user_logo" />
                                </div>
                                @if($user_detail->user_logo!='')
                                    <img src="{{url('public/userlogo/'.$user_detail->user_logo)}}"  width="45" height="45">
                                @endif
                            
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Status</label>
                                </div>

                                <div class="col-3">
                                    @if($user_detail->user_status=='1')
                                        <input type="checkbox" class="" name="user_status" id="user_status" value="1" checked />
                                    @else
                                        <input type="checkbox" class="" name="user_status" id="user_status" value="1"  />
                                    @endif   
                                </div>
                            
                            </div>


                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Update" onclick="Update_user();" />
                                    <a href="{{url('dashboard')}}" class="btn btn-secondary">Cancel</a>
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
        function Update_user(){
            var valdate = $('#user-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('user-form'));;

                $.ajax({

                    url: "{{ url('user-profile-update/'.$user_detail->user_id) }}",
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
                            window.location.href = "{{ url('user-profile/'.$user_detail->user_id)}}";
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