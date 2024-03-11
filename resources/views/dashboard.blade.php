@include('common.header')
@include('common.leftsidemenu_icon')

<div class="content-body">

<div class="container-fluid">
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
<h4>Hi, welcome back!</h4>

</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
</ol>
</div>
</div>
<div class="row">
<div class="col-xl-9 col-xxl-12">

<div class="row">

<?php 
    $uerpermission = array();
    if($userpermission_list!=''){
        $uerpermission = explode(',',$userpermission_list);
    }


foreach($video_lists as $video_list){
    if(in_array($video_list->menu_id,$uerpermission) || session()->get('ses_role_id')==1){ ?>
    <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
    <div class="card">
    <a href="<?= url('video-detail/'.$video_list->video_id); ?>">
    <img src="<?= url('public/video/'.$video_list->video_image); ?>" class="img-full" > 
    <img src="<?= url('public/images/videoimage/play.png'); ?>" class="img-full-top" >
    <div class="text-overlay"><?= $video_list->video_name; ?></div>
    </a>
    </div>
    </div>
   <?php } } ?>


<!--<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="overtime-planing.html">
<img src="{{url('public/images/videoimage/ApproveLeave.png')}}" class="img-full" >
<img src="{{url('public/images/videoimage/play.png')}}" class="img-full-top" >
<div class="text-overlay">Approve Leave</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="overtime-planing.html">
<img src="{{url('public/images/videoimage/Overtimevideo.png')}}" class="img-full" >
<img src="{{url('public/images/videoimage/play.png')}}" class="img-full-top" >
<div class="text-overlay"> Apply Overtime</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="overtime-planing.html">
<img src="{{url('public/images/videoimage/Replacementleave.png')}}" class="img-full" >
<img src="{{url('public/images/videoimage/play.png')}}" class="img-full-top" >
<div class="text-overlay">Apply Replacement Leave</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="overtime-planing.html">
<img src="{{url('public/images/videoimage/Signin.png')}}" class="img-full" >
<img src="{{url('public/images/videoimage/play.png')}}" class="img-full-top" >
<div class="text-overlay">Sign in & Sign Out</div>
</a>
</div>
</div>

<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
<div class="card">
<a href="overtime-planing.html">
<img src="{{url('public/images/videoimage/Timesheetvideo.png')}}" class="img-full" >
<img src="{{url('public/images/videoimage/play.png')}}" class="img-full-top" >
<div class="text-overlay">Timesheet </div>
</a>
</div>
</div>-->

</div>
</div>
</div>
</div>
</div>


@include('common.footer')
 
</body>
</html>