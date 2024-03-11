<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboardcontroller;
class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('ses_user_id')){
            $user_lists = DB::table('users as u')
            ->select('u.*','r.role_name','us.user_name as user_rolename')
            ->leftjoin('roles as r','u.role_id','=','r.role_id')
            ->leftjoin('users as us','us.user_id','=','u.reference_userid')
            ->where('u.user_status','<>', '2')
            ->get();
            //->toSql();
            //dd($user_lists); exit;

            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('user_list',compact('user_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
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
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('user_add',compact('role_lists','user_reference_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $formdata = $request->input();
        
        $status =0;
        if(isset($formdata['user_status'])){
            $status = $formdata['user_status'];
        }
        if($_FILES['user_logo']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName = $num2.'.'.$request->user_logo->getClientOriginalExtension();
            $request->user_logo->move(public_path('userlogo/'), $fileName);
        }

        $user_per_implode = '';
        if(isset($formdata['user_pwd']) && $formdata['user_permission']!=''){
            $user_per_implode  = implode(',',$formdata['user_permission']);
        }

        $user = new User;
        $user->role_id = $formdata['role_id'];
        $user->user_type = $formdata['user_type'];
        $user->user_name = $formdata['user_name'];
        $user->user_pwd = md5($formdata['user_pwd']);
        $user->user_email = $formdata['user_email'];
        $user->user_mobile = $formdata['user_mobile'];
        if($_FILES['user_logo']['name']!=''){
            $user->user_logo = $fileName;
        }else{
            $user->user_logo = '';
        }
        $user->user_status = $status;
        $user->user_permission = $user_per_implode;
        $user->reference_userid = $formdata['reference_userid'];
        $res = $user->save();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'user Saved'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'user Not Saved'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $role_lists = DB::table('roles')
        ->select('*')
        ->get();

        $user_reference_lists = DB::table('users')
        ->select('*')
        ->where('user_type','=','1')
        ->where('role_id','<>','1')
        ->where('user_status','=','1')
        ->get();

        $user_detail = DB::table('users')
        ->select('*')
        ->where('user_id',$id)
        ->first();
        //dd($user_detail); exit;

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('user_edit',compact('user_detail','role_lists','user_reference_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $formdata = $request->input();
        //dd($formdata); exit;
        $status =0;
        if(isset($formdata['user_status'])){
            $status = $formdata['user_status'];
        }
        $role_id =0;
        if(isset($formdata['role_id'])){
            $role_id = $formdata['role_id'];
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

        $user_per_implode = '';
        if(isset($formdata['user_pwd']) && $formdata['user_permission']!=''){
            $user_per_implode  = implode(',',$formdata['user_permission']);
        }

        $array_1 = array('role_id'=>$role_id,'user_type'=>$formdata['user_type'],'user_name'=>$formdata['user_name'],'user_email'=>$formdata['user_email'],'user_mobile'=>$formdata['user_mobile'],'updated_at'=>date('Y-m-d H:i:s'),'user_status'=>$status,'reference_userid'=>$formdata['reference_userid'],'user_permission'=>$user_per_implode);

        $merge_array = array_merge($array_1,$image_array,$pwd_array);
        $res = DB::table('users')->where('user_id',$id)
        ->update($merge_array);
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'user Updated'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'user Not Updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $res = DB::table('users')->where('user_id',$id)
        ->update(array('updated_at'=>date('Y-m-d H:i:s'),'user_status'=>'2'));
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'user Deleted'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'user Not Deleted'));
        }
    }

    public function user_permission_list(Request $request)
    {
        $formdata = $request->input();
        $user_id = $formdata['userid'];
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }

        $user_detail = DB::table('users as u')
        ->select('r.role_permission')
        ->join('roles as r','u.role_id','=','r.role_id')
        ->where('u.user_id',$user_id)
        ->first();
        //dd($formdata); exit;
        $explode_menuids = explode(',',$user_detail->role_permission);

        $menu_lists = DB::table('menus')
        ->select('*')
        ->whereIn('menu_id',$explode_menuids)
        ->get();
        if($formdata['form_type']=='add'){
            $returnHTML = view('ajax.user_permission_ajax',compact('menu_lists'))->render();
        }else if($formdata['form_type']=='edit'){
            $permission = explode(',',$formdata['user_permission']);
           // print_r($permission); exit;
            $returnHTML = view('ajax.user_permission_edit_ajax',compact('menu_lists','permission'))->render();
        }
        
        return response()->json(array('htmldata'=>$returnHTML));
    }

    public function check_email(Request $request){

        $formdata = $request->input();
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }

        $email_count = DB::table('users')
        ->where('user_email',$formdata['email'])
        ->count();
        //dd($email_count); exit;
        echo json_encode(array('email_count'=>$email_count));
    }
}
