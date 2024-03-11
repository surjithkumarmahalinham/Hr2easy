<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboardcontroller;

class Menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('ses_user_id')){
            $menu_lists = DB::table('menus')
            ->select('*')
            ->where('menu_status','<>','2')
            ->get();

            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('menu_list',compact('menu_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('menu_add',compact('sidemenu_lists','userpermission_list','fm_module_lists'));
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
        if(isset($formdata['menu_status'])){
            $status = $formdata['menu_status'];
        }
        /*if($_FILES['menu_icon']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName = $num2.'.'.$request->menu_icon->getClientOriginalExtension();
            $request->menu_icon->move(public_path('menuicons/'), $fileName);
        }*/

        $menu = new Menu;
        $menu->menu_name = $formdata['menu_name'];
        $menu->menu_slug = $formdata['menu_slug'];
        /*if($_FILES['menu_icon']['name']!=''){
            $menu->menu_icon = $fileName;
        }else{
            $menu->menu_icon = '';
        }*/
        $menu->menu_status = $status;
        $res = $menu->save();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Menu Saved'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Menu Not Saved'));
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
        $menu_detail = DB::table('menus')
        ->select('*')
        ->where('menu_id',$id)
        ->first();
        
        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('menu_edit',compact('menu_detail','sidemenu_lists','userpermission_list','fm_module_lists'));
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
        $status =0;
        if(isset($formdata['menu_status'])){
            $status = $formdata['menu_status'];
        }
       /* $fileName = '';
        if($_FILES['menu_icon']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName = $num2.'.'.$request->menu_icon->getClientOriginalExtension();
            $request->menu_icon->move(public_path('menuicons/'), $fileName);
        }*/

        $res = DB::table('menus')->where('menu_id',$id)
        ->update(array('menu_name'=>$formdata['menu_name'],'menu_slug'=>$formdata['menu_slug'],'updated_at'=>date('Y-m-d H:i:s'),'menu_status'=>$status));
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Menu Updated'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Menu Not Updated'));
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
        $res = DB::table('menus')->where('menu_id',$id)
        ->update(array('updated_at'=>date('Y-m-d H:i:s'),'menu_status'=>'2'));
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Menu Deleted'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Menu Not Deleted'));
        }
    }
}
