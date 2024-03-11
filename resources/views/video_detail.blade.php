@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>{{$video_detail->video_name}}</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Applying Leave</a></li>
</ol>
</div>
</div>
<div class="row">
<div class="col-xl-9 col-xxl-12">
<div class="row">
<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
<div class="">
<video width="100%" height="100%" controls autoplay>>
  <source src="{{url('public/video/'.$video_detail->video_file)}}" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
</video>


</div>
</div>



</div>
</div>
</div>
</div>
</div>

@include('common.footer')

</body>
</html>