<!DOCTYPE html>
<html lang="en" class="h-100">
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

<title>MotaAdmin - Bootstrap Admin Dashboard</title>

<link rel="shortcut icon" type="image/png" href="{{url('images/favicon.png')}}" />
<link href="{{url('css/style.css')}}" rel="stylesheet">
<style>
    .parsley-errors-list{
        display: none;
    }
    .parsley-error{
        border :2px solid red!important;
        box-shadow: -5px 5px 24px 5px #E3E3E3;
        border-color: red!important;
    }
</style>
</head>
<body class="h-100 login-page">
<img src="{{url('images/login.png')}}" class="background-img"/>
<div class="authincation h-100">
<div class="container h-100">
<div class="row justify-content-left h-100 align-items-center">
<div class="col-md-4">
<div class="authincation-content">
<div class="row no-gutters">
<div class="col-xl-12">
<div class="auth-form">
<img src="{{url('images/logo-color.png')}}" class="logo-color" >
<h4 class="text-center sign-text mb-2">Sign in your account</h4>
<p class="text-center" id="error_msg" style="color:red;">
@if(session()->has('login_message'))
    {{session()->get('login_message')}}
@endif
</p>
<!--<form id="login-form" data-parsley-validate="">-->
<form action="{{url('login')}}" id="login-form" data-parsley-validate="" method="POST">
    @csrf
<div class="form-group">
<label class="mb-1"><strong>Username</strong></label>
<input type="email" class="form-control" name="user_email" id="user_email" required >
</div>
<div class="form-group">
<label class="mb-1"><strong>Password</strong></label>
<input type="password" class="form-control" name="user_pwd" id="user_pwd" required >
</div>

<div class="form-row d-flex justify-content-between mt-4 mb-2">
<!--<div class="form-group">
<div class="custom-control custom-checkbox ml-1">
<input type="checkbox" class="custom-control-input" checked id="basic_checkbox_1">
<label class="custom-control-label" for="basic_checkbox_1">Remember </label>
</div>
</div>-->

</div>
<div class="text-center">
<button type="submit" class="btn btn-primary btn-block" onclick="signIn_func();" >Sign In</button>
</div>
</form>

<div class="form-group mt-3 mb-0">
<a href="page-forgot-password.html">Forgot Password?</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="{{url('vendor/global/global.min.js')}}"></script>
<script src="{{url('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('js/custom.min.js')}}"></script>
<script src="{{url('js/deznav-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    function signIn_func(){
        var valdate = $('#login-form').parsley().validate();
        if(valdate){
		    $formdata = $("#login-form").serialize();

            $.ajax({

                url: "{{ url('login') }}",
                type: 'post',
                data: $formdata,
                dataType: 'json',
                success: function (response)
                {
                    if(response.status==200){
                        window.location.href = "{{ url('dashboard')}}";
                    }else if(response.status==201){
                        $("#error_msg").html(response.msg);
                    }

                }

            });

        }
    }
</script>

</body>
</html>