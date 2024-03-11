<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Dashboardcontroller extends Controller
{
    public function index()
    {   
       // dd(session()->all());exit;
       if(session()->has('ses_user_id')){
            session()->put('active_class','home'); // for active class
            $video_lists = DB::table('videos')
            ->select('*')
            ->get();
            
            //user permission data function
            $userpermission_data = $this->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = $this->financial_management_module_list();

            //dd($userpermission_data); exit;
            return view('dashboard',compact('video_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
       }else{
            return redirect('login');
       }
    }

    public function video_detail($id)
    {
        if(session()->has('ses_user_id')){
            $video_detail = DB::table('videos')
            ->select('*')
            ->where('video_id',$id)
            ->first();

            //user permission data function
            $userpermission_data = $this->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = $this->financial_management_module_list();

            return view('video_detail',compact('video_detail','sidemenu_lists','userpermission_list','fm_module_lists'));
        }else{
            return redirect('login');
        }
    }

    public function user_profile($id){

        if(session()->has('ses_user_id')){
            $user_detail = DB::table('users')
            ->select('*')
            ->where('user_id',$id)
            ->first();

            $role_lists = DB::table('roles')
            ->select('*')
            ->get();

            $user_reference_lists = DB::table('users')
            ->select('*')
            ->where('user_type','=','1')
            ->where('role_id','<>','1')
            ->where('user_status','=','1')
            ->get();

            //user permission data function
            $userpermission_data = $this->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = $this->financial_management_module_list();

            return view('user_profile',compact('user_detail','role_lists','sidemenu_lists','userpermission_list','user_reference_lists','fm_module_lists'));
        }else{
            return redirect('login');
        }
    }

    public function user_profile_update(Request $request, $id){

        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $formdata = $request->input();
        $status =0;
        if(isset($formdata['user_status'])){
            $status = $formdata['user_status'];
        }
        $fileName = '';
        $image_array = array();
        if($_FILES['user_logo']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName = $num2.'.'.$request->user_logo->getClientOriginalExtension();
            $request->user_logo->move(public_path('userlogo/'), $fileName);
            $image_array = array('user_logo'=>$fileName);
        }

        $pwd_array = array();
        if(isset($formdata['user_pwd']) && $formdata['user_pwd']!=''){
            $pwd_array = array('user_pwd'=>md5($formdata['user_pwd']));
        }

        $array_1 = array('role_id'=>$formdata['role_id'],'user_type'=>$formdata['user_type'],'user_name'=>$formdata['user_name'],'user_email'=>$formdata['user_email'],'user_mobile'=>$formdata['user_mobile'],'updated_at'=>date('Y-m-d H:i:s'),'user_status'=>$status);

        $merge_array = array_merge($array_1,$image_array,$pwd_array);
        $res = DB::table('users')->where('user_id',$id)
        ->update($merge_array);
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'User Profile Updated'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'User Profile Not Updated'));
        }

    }

    public function login(Request $request){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $formdata = $request->input();
            $user_detail = DB::table('users')
                ->select('*')
                ->where('user_email',$formdata['user_email'])
                ->where('user_pwd',MD5($formdata['user_pwd']))
                ->first();
            if($user_detail){
                session()->put('ses_user_id',$user_detail->user_id);
                session()->put('ses_role_id',$user_detail->role_id);
                session()->put('ses_user_name',$user_detail->user_name);
                session()->put('ses_user_email',$user_detail->user_email);
                session()->put('ses_user_logo',$user_detail->user_logo);
                session()->put('ses_user_type',$user_detail->user_type);
                return redirect('dashboard');
                //echo json_encode(array("status"=>200));
                exit;
            }else{
                session()->put('login_message',"Username / Password Incorrect!");
                return redirect('login');
                //echo json_encode(array("status"=>201,"msg"=>'Username / Password Incorrect!'));
                exit;
            }

        }
        return view('login');
    }

    public function logout(){
        session()->forget('ses_user_id');
        session()->forget('ses_role_id');
        session()->forget('ses_user_name');
        session()->forget('ses_user_email');
        session()->forget('login_message');
        session()->forget('ses_user_logo');
        session()->forget('ses_user_type');
        return redirect('login');
    }


    public function permission_data(){

        ////////Permission //////////////////
        $sidemenu_lists = DB::table('menus')
        ->select('*')
        ->get();

        if(session()->get('ses_user_type')==1){
            $userpermission_lists = DB::table('users as u')
            ->select('r.role_permission')
            ->join('roles as r','u.role_id','=','r.role_id')
            ->where('u.user_id',session()->get('ses_user_id'))
            ->first();
            $userpermission_list = $userpermission_lists->role_permission;
        }else{
            $userpermission_lists = DB::table('users')
            ->select('user_permission')
            ->where('user_id','=',session()->get('ses_user_id'))
            ->first();
            $userpermission_list = $userpermission_lists->user_permission;
        }
        ////////Permission //////////////////
        $data = array('sidemenu_lists'=>$sidemenu_lists,'userpermission_list'=>$userpermission_list);
        return $data;
    }

    public function financial_management_module_list(){

        $video_lists = DB::table('videos')
        ->select('*')
        ->get();
        return $video_lists;
    } 

    public function active_class(Request $request){
        $formdata = $request->input();
        if($formdata['menuid']!=''){
            session()->put('active_class',$formdata['menuid']);
            echo json_encode(array('status'=>200));
        }
    }
}
