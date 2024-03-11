<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Menucontroller;
use App\Http\Controllers\Rolecontroller;
use App\Http\controllers\Usercontroller;
use App\Http\controllers\Documentcontroller;
use App\Http\controllers\Videocontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

//Dashboard Route
Route::get('/',[Dashboardcontroller::class,'index']);
Route::get('/dashboard',[Dashboardcontroller::class,'index']);
Route::any('/video-detail/{id}',[Dashboardcontroller::class,'video_detail']);
Route::any('/user-profile/{id}',[Dashboardcontroller::class,'user_profile']);
Route::any('/user-profile-update/{id}',[Dashboardcontroller::class,'user_profile_update']);
Route::any('/active-class',[Dashboardcontroller::class,'active_class']);

//Login & Logout
Route::any('/login',[Dashboardcontroller::class,'login']);
Route::any('/logout',[Dashboardcontroller::class,'logout']);

//Menu Route 
Route::get('/menu-list',[Menucontroller::class,'index']);
Route::get('/menu-add',[Menucontroller::class,'create']);
Route::post('/menu-save',[Menucontroller::class,'store']);
Route::get('/menu-edit/{id}',[Menucontroller::class,'edit']);
Route::put('/menu-update/{id}',[Menucontroller::class,'update']);
Route::any('/menu-delete/{id}',[Menucontroller::class,'destroy']);

//Role Route 
Route::get('/role-list',[Rolecontroller::class,'index']);
Route::get('/role-add',[Rolecontroller::class,'create']);
Route::post('/role-save',[Rolecontroller::class,'store']);
Route::get('/role-edit/{id}',[Rolecontroller::class,'edit']);
Route::put('/role-update/{id}',[Rolecontroller::class,'update']);
Route::any('/role-delete/{id}',[Rolecontroller::class,'destroy']);

//User Route 
Route::get('/user-list',[Usercontroller::class,'index']);
Route::get('/user-add',[Usercontroller::class,'create']);
Route::post('/user-save',[Usercontroller::class,'store']);
Route::get('/user-edit/{id}',[Usercontroller::class,'edit']);
Route::put('/user-update/{id}',[Usercontroller::class,'update']);
Route::any('/user-delete/{id}',[Usercontroller::class,'destroy']);
Route::any('/user-permission-list',[Usercontroller::class,'user_permission_list']);
Route::any('/check-email',[Usercontroller::class,'check_email']);

//Document Route 
Route::get('/document-list',[Documentcontroller::class,'index']);
Route::get('/document-add',[Documentcontroller::class,'create']);
Route::post('/document-save',[Documentcontroller::class,'store']);
Route::get('/document-edit/{id}',[Documentcontroller::class,'edit']);
Route::put('/document-update/{id}',[Documentcontroller::class,'update']);
Route::any('/document-delete/{id}',[Documentcontroller::class,'destroy']);

//Manual List
Route::get('/manual-list',[Documentcontroller::class,'manual_list']);
Route::any('/manual-detail/{id}',[Documentcontroller::class,'manual_detail']);


//Video Route 
Route::get('/video-list',[Videocontroller::class,'index']);
Route::get('/video-add',[Videocontroller::class,'create']);
Route::post('/video-save',[Videocontroller::class,'store']);
Route::get('/video-edit/{id}',[Videocontroller::class,'edit']);
Route::put('/video-update/{id}',[Videocontroller::class,'update']);
Route::any('/video-delete/{id}',[Videocontroller::class,'destroy']);



