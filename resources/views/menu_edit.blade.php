@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Menu Edit</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('menu-list')}}">Menu List</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Edit</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Menu Edit</h4>
                    </div>

                    <div class="card-body">
                        <form id="menu-form" data-parsley-validate="">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Menu Name</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="text" class="form-control" name="menu_name" id="menu_name" value="{{$menu_detail->menu_name}}" required/>
                                    </div>

                                
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Menu Slug</label>
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" name="menu_slug" id="menu_slug" value="{{$menu_detail->menu_slug}}" required/>
                                </div>

                            </div>

                            <!--<div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Menu Icon</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="file" class="form-control" name="menu_icon" id="menu_icon" />
                                        
                                    </div>
                                    @if($menu_detail->menu_icon!='')
                                        <img src="{{url('public/menuicons/'.$menu_detail->menu_icon)}}"  width="70" height="50">
                                    @endif
                                
                            </div>-->

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Menu Status</label>
                                </div>
                               
                                <div class="col-3">
                                @if($menu_detail->menu_status=='1')
                                    <input type="checkbox" class="" name="menu_status" id="menu_status" value="1" checked />
                                @else
                                    <input type="checkbox" class="" name="menu_status" id="menu_status" value="1"  />
                                @endif    
                                    
                                </div>
                            
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Update" onclick="Update_Menu();" />
                                    <a href="{{url('menu-list')}}" class="btn btn-secondary">Cancel</a>
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
        function Update_Menu(){
            var valdate = $('#menu-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('menu-form'));;

                $.ajax({

                    url: "{{ url('menu-update/'.$menu_detail->menu_id) }}",
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
                            window.location.href = "{{ url('menu-list')}}";
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