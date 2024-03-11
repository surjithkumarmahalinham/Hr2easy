@include('common.header')
@include('common.leftsidemenu_icon')


<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>Video List</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Video List</a></li>
</ol>
</div>
</div>
<div class="row">

<div class="col-xl-9 col-xxl-12">
 <div class="card-body bg-white" style="padding:10px;">
<div class="row" >
<div class="col-xl-12 col-xxl-12">
<div class="menu-list">
<div class="row" style="border-bottom: 1px solid #085e81;margin-bottom: 15px;margin-right: -13px;margin-left: -13px;">
<div class="col-xl-6">
<h4>Video Details</h4>
    </div>
<div class="col-xl-6">

        <a  class="btn btn-primary" href="{{url('video-add')}}" style="margin-bottom: 10px;float:right;">Add Video</a>
    </div>
</div>


    <form id="video-delete">
       @csrf
    </form>
        <table class="table table-striped" id="display">
            <thead class="custom-thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">video Name</th>
                    <th scope="col">video Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; ?>
                @foreach($video_lists as $video_list)
                <tr>
                    <th scope="row">{{$cnt}}</th>
                    <td>{{$video_list->video_name}}</td>
                    <td>
                        @if($video_list->video_image!='')
                        <img src="{{url('public/video/'.$video_list->video_image)}}"  width="70" height="50">
                        @endif
                    <td>
                        <a class="btn-sm btn-primary" href="{{url('video-edit/'.$video_list->video_id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn-sm btn-danger" href="javascript:void(0);" onclick="video_delete('{{ $video_list->video_id }}');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php $cnt++; ?>
                @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@include('common.footer')

<script>

    $(document).ready(function () {
        $('#display').DataTable();
    });

    function video_delete(video_id){

        if(window.confirm('Are you sure, you want to delete!')){
            
            var formdata = $("#video-delete").serialize();
            $.ajax({

                url: "{{url('video-delete/')}}/"+video_id,
                type: 'post',
                dataType: 'json',
                data: formdata,
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