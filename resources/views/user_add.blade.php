@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>User Add</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('user-list')}}">User List</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User Add</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Add</h4>
                    </div>

                    <div class="card-body">
                        <form id="user-form" data-parsley-validate="">
                        <input type="hidden" name="form_type" id="form_type" value="add"/>
                            @csrf
                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Type</label>
                                </div>

                                <div class="col-6">
                                    <select class="form-control" name="user_type" id="user_type" onchange="usertype_func(this.value);" required>
                                        <option value="">Select User Type</option>
                                        <option value="1">Role</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row form-group" id="role_div" style="display:none;">
                                
                                <div class="col-3">
                                    <label>Role Name</label>
                                </div>

                                <div class="col-6">
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="0">Select Role</option>
                                        @foreach($role_lists as $role_list)
                                            <option value="{{$role_list->role_id}}">{{$role_list->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row form-group" id="userreference_div" style="display:none;">
                                
                                <div class="col-3">
                                    <label>User Reference Name</label>
                                </div>

                                <div class="col-6">
                                    <select class="form-control" name="reference_userid" id="reference_userid" onchange="userpermission_fun(this.value);">
                                        <option value="0">Select User Reference</option>
                                        @foreach($user_reference_lists as $user_reference_list)
                                            <option value="{{$user_reference_list->user_id}}">{{$user_reference_list->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            
                            <!-- User Permission -->
                            <div id="user-permission"></div>


                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Name</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="user_name" id="user_name" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Password</label>
                                </div>

                                <div class="col-6">
                                    <input type="password" class="form-control" name="user_pwd" id="user_pwd" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Email</label>
                                </div>

                                <div class="col-6">
                                    <input type="email" class="form-control" name="user_email" id="user_email" onblur="checkemail_function(this.value);" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Mobile</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="user_mobile" id="user_mobile" onkeypress="return isNumberKey(event);" required/>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Logo</label>
                                </div>

                                <div class="col-6">
                                    <input type="file" class="form-control" name="user_logo" id="user_logo" />
                                </div>

                            
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>User Status</label>
                                </div>

                                <div class="col-3">
                                    <input type="checkbox" class="" name="user_status" id="user_status" value="1"  />
                                </div>
                            
                            </div>


                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Save" onclick="Save_user();" />
                                    <a href="{{url('user-list')}}" class="btn btn-secondary">Cancel</a>
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
        function usertype_func(usertype){
            if(usertype==1){
                $('#role_div').show();
                $('#userreference_div').hide();
                $('#userpermission_div').hide();
                $("#reference_userid").val('0');
                $(".filter-option-inner-inner").text('Select Role');
            }else if(usertype==2){
                $('#role_div').hide();
                $('#userreference_div').show();
                $("#role_id").val('0');
                $(".filter-option-inner-inner").text('Select User Reference');
            }
        }

        function userpermission_fun(userid){
            var csrf_token = $("input[name='_token']").val();
            var form_type = $("#form_type").val();
            $.ajax({

                url: "{{ url('user-permission-list') }}",
                type: 'POST',
                data: 'userid='+userid+"&_token="+csrf_token+"&form_type="+form_type,
                dataType: 'json',
                success: function (response)
                {
                   $("#user-permission").html(response.htmldata);
                }

            });
        }


        function Save_user(){
            var valdate = $('#user-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('user-form'));;

                $.ajax({

                    url: "{{ url('user-save') }}",
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
                            window.location.href = "{{ url('user-list')}}";
                        }else if(response.status==201){
                            alert(response.msg);
                        }

                    }

                });

            }
        }

    function checkemail_function(email){
        var csrf_token = $("input[name='_token']").val();
        $.ajax({

            url: "{{ url('check-email') }}",
            type: 'POST',
            data: 'email='+email+"&_token="+csrf_token,
            dataType: 'json',
            success: function (response)
            {
                if(response.email_count==1){
                    alert('This email already exits!');
                    $("#user_email").val('');
                }

            }

        });
    }

    </script>

</body>
</html>