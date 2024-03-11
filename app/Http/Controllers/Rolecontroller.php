<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboardcontroller;

class Rolecontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('ses_user_id')){
            $role_lists = DB::table('roles')
            ->select('*')
            ->get();
            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('role_list',compact('role_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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
        if(session()->has('ses_user_id')){
            $menu_lists = DB::table('menus')
            ->select('*')
            ->get();
            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('role_add',compact('menu_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(session()->has('ses_user_id')){
            $formdata = $request->input();
            $role_per_implode  = implode(',',$formdata['role_permission']);
            $role = new Role;
            $role->role_name = $formdata['role_name'];
            $role->role_permission = $role_per_implode;
            $res = $role->save();
            if($res){
                echo json_encode(array("status"=>200,"msg"=>'Role Saved'));
            }else{
                echo json_encode(array("status"=>201,"msg"=>'Role Not Saved'));
            }
        }else{
            return redirect('login');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session()->has('ses_user_id')){
            $role_detail = DB::table('roles')
            ->select('*')
            ->where('role_id',$id)
            ->first();

            $menu_lists = DB::table('menus')
            ->select('*')
            ->get();

            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();


            return view('role_edit',compact('role_detail','menu_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
        }else{
            return redirect('login');
        }
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
        if(session()->has('ses_user_id')){
            $formdata = $request->input();
            $role_per_implode  = implode(',',$formdata['role_permission']);
            $res = DB::table('roles')->where('role_id',$id)
            ->update(array('role_name'=>$formdata['role_name'],'role_permission'=>$role_per_implode,'updated_at'=>date('Y-m-d H:i:s')));
            if($res){
                echo json_encode(array("status"=>200,"msg"=>'Role Updated'));
            }else{
                echo json_encode(array("status"=>201,"msg"=>'Role Not Updated'));
            }
        }else{
            return redirect('login');
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
        if(session()->has('ses_user_id')){
            $res = DB::table('roles')->where('role_id',$id)
            ->delete();
            if($res){
                echo json_encode(array("status"=>200,"msg"=>'Role Deleted'));
            }else{
                echo json_encode(array("status"=>201,"msg"=>'Role Not Deleted'));
            }
        }else{
            return redirect('login');
        }
    }
}
