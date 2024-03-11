@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Video Edit</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('video-list')}}">Video List</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Video Edit</a></li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Video Edit</h4>
                    </div>

                    <div class="card-body">
                        <form id="video-form" data-parsley-validate="">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Menu Name</label>
                                </div>

                                <div class="col-6">
                                   <select class="form-control" name="menu_id" id="menu_id" required>
                                        <option value="">Select Menu</option>
                                        @foreach($menu_lists as $menu_list)
                                            @if($menu_list->menu_id==$video_detail->menu_id)
                                                <option value="{{$menu_list->menu_id}}" selected="selected">{{$menu_list->menu_name}}</option>
                                            @else
                                                <option value="{{$menu_list->menu_id}}">{{$menu_list->menu_name}}</option>
                                            @endif 
                                        @endforeach


                                    </select>
                                </div>

                            </div>

                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Video Name</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="text" class="form-control" name="video_name" id="video_name" value="{{$video_detail->video_name}}" required/>
                                    </div>

                            </div>


                            <div class="row form-group">
                                
                                    <div class="col-3">
                                        <label>Video Cover Image</label>
                                    </div>

                                    <div class="col-6">
                                        <input type="file" class="form-control" name="video_image" id="video_image"  />
                                    </div>
                                    @if($video_detail->video_image!='')
                                        <img src="{{url('public/video/'.$video_detail->video_image)}}"  width="70" height="50">
                                    @endif
                                
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label>Video File</label>
                                </div>

                                <div class="col-6">
                                    <input type="file" class="form-control" name="video_file" id="video_file"  />
                                </div>
                                @if($video_detail->video_file!='')
                                    <a href="{{url('public/video/'.$video_detail->video_file)}}" class="btn btn-primary" target="_blank">View Video</a>
                                @endif
                            
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-3">
                                    <label></label>
                                </div>

                                <div class="col-6">
                                    <input type="button" class="btn btn-primary" value="Update" onclick="Update_video();" />
                                    <a href="{{url('video-list')}}" class="btn btn-secondary">Cancel</a>
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
        function Update_video(){
            var valdate = $('#video-form').parsley().validate();
            if(valdate){
                var formdata=new FormData(document.getElementById('video-form'));;

                $.ajax({

                    url: "{{ url('video-update/'.$video_detail->video_id) }}",
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
                            window.location.href = "{{ url('video-list')}}";
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