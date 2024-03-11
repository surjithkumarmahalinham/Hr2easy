<!DOCTYPE html>
<?php //echo session()->get('active_class'); exit;?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="MotaAdmin - Bootstrap Admin Dashboard" />
<meta property="og:title" content="MotaAdmin - Bootstrap Admin Dashboard" />
<meta property="og:description" content="MotaAdmin - Bootstrap Admin Dashboard" />
<meta property="og:image" content="social-image.png" />
<meta name="format-detection" content="telephone=no">

<title>Hr2eazy User Manual</title>

<link rel="shortcut icon" type="image/png" href="{{url('images/favicon.png')}}" />
<link href="{{url('css/fontawesome.min.css')}}" rel="stylesheet">
<link href="{{url('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('vendor/chartist/css/chartist.min.css')}}">
<link href="{{url('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
<link href="{{url('css/style.css')}}" rel="stylesheet">
<link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
<link rel="stylesheet" href="{{url('css/plyr.css')}}">
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{url('css/main.css')}}">
<style>
    .parsley-errors-list{
        display: none;
    }
    .parsley-error{
        border :2px solid red!important;
        box-shadow: -5px 5px 24px 5px #E3E3E3;
        border-color: red!important;
    }
    .custom-thead{
        color: white;
        background-color: #085e81;
    }
</style>

</head>
<body>

<div id="preloader">
<div class="sk-three-bounce">
<div class="sk-child sk-bounce1"></div>
<div class="sk-child sk-bounce2"></div>
<div class="sk-child sk-bounce3"></div>
</div>
</div>


<div id="main-wrapper">

<div class="nav-header">
<a href="javascript:void(0);" class="brand-logo" onclick="activemenufunc('home','dashboard');">
<img class="logo-abbr" src="{{url('images/logo-left.png')}}" alt="">
<img class="logo-compact" src="{{url('images/logo-text.png')}}" alt="">
<img class="brand-title" src="{{url('images/logo-text.png')}}" alt="">
</a>
<div class="nav-control">
<div class="hamburger">
<span class="line"></span><span class="line"></span><span class="line"></span>
</div>
</div>
</div>
@include('common.leftsidemenu')

<div class="header">
<div class="header-content">
<nav class="navbar navbar-expand">
<div class="collapse navbar-collapse justify-content-between">
<div class="header-left">
<div class="search_bar dropdown">
<!--<span class="search_icon p-3 c-pointer" data-toggle="dropdown">
<i class="mdi mdi-magnify"></i>
</span>-->
<div class="dropdown-menu p-0 m-0">
<form>
<!--<input class="form-control" type="search" placeholder="Search" aria-label="Search">-->
</form>
</div>
</div>
</div>
<ul class="navbar-nav header-right">

<!--<li class="nav-item dropdown notification_dropdown">
<a class="nav-link bell dz-fullscreen" href="#">
<svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
<svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
</a>
</li>

<li class="nav-item dropdown notification_dropdown">
<a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
<svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
</svg>
<div class="pulse-css"></div>
</a>
<div class="dropdown-menu dropdown-menu-right">
<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
<ul class="timeline">
<li>
<div class="timeline-panel">
<div class="media mr-2">
<img alt="image" width="50" src="images/avatar/1.jpg">
</div>

<div class="media-body">
<h6 class="mb-1">Dr sultads Send you Photo</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
<li>
<div class="timeline-panel">
<div class="media mr-2 media-info">
KG
</div>
<div class="media-body">
<h6 class="mb-1">Resport created successfully</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
<li>
<div class="timeline-panel">
<div class="media mr-2 media-success">
<i class="fa fa-home"></i>
</div>
<div class="media-body">
<h6 class="mb-1">Reminder : Treatment Time!</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
<li>
<div class="timeline-panel">
<div class="media mr-2">
<img alt="image" width="50" src="images/avatar/1.jpg">
</div>
<div class="media-body">
<h6 class="mb-1">Dr sultads Send you Photo</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
<li>
<div class="timeline-panel">
<div class="media mr-2 media-danger">
KG
</div>
<div class="media-body">
<h6 class="mb-1">Resport created successfully</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
<li>
<div class="timeline-panel">
<div class="media mr-2 media-primary">
<i class="fa fa-home"></i>
</div>
<div class="media-body">
<h6 class="mb-1">Reminder : Treatment Time!</h6>
<small class="d-block">29 July 2021 - 02:26 PM</small>
</div>
</div>
</li>
</ul>
</div>
<a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
</div>
</li>-->
@if(session()->has('ses_user_id'))
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="#" role="button" data-toggle="dropdown">
<img src="{{ url('userlogo/'.session()->get('ses_user_logo'))}}" width="20" alt="" />
<div class="header-info">
<span>Hey, <strong>{{session()->get('ses_user_name')}}</strong></span>
<!--<small>Business Profile</small>-->
</div>
</a>

<div class="dropdown-menu dropdown-menu-right">
@if(session()->get('ses_role_id')!=1)
<a href="{{url('user-profile/'.session()->get('ses_user_id'))}}" class="dropdown-item ai-icon">
<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
<span class="ml-2">Profile </span>
</a>
@endif
<!--<a href="email-inbox.html" class="dropdown-item ai-icon">
<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
<span class="ml-2">Inbox </span>
</a>-->

<a href="{{url('logout')}}" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</div>
</li>
@endif
</ul>
</div>
</nav>
</div>
</div>