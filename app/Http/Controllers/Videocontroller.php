<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboardcontroller;

class Videocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('ses_user_id')){
            $video_lists = DB::table('videos')
            ->select('*')
            ->get();
            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('video_list',compact('video_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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
        $menu_lists = DB::table('menus')
        ->select('*')
        ->get();

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('video_add',compact('menu_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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

        if($_FILES['video_image']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_image = $num2.'.'.$request->video_image->getClientOriginalExtension();
            $request->video_image->move(public_path('video/'), $fileName_image);
        }

        if($_FILES['video_file']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_video = $num2.'.'.$request->video_file->getClientOriginalExtension();
            $request->video_file->move(public_path('video/'), $fileName_video);
        }

        $video = new Video;
        $video->menu_id = $formdata['menu_id'];
        $video->video_name = $formdata['video_name'];
        if($_FILES['video_image']['name']!=''){
            $video->video_image = $fileName_image;
        }else{
            $video->video_image = '';
        }
        if($_FILES['video_file']['name']!=''){
            $video->video_file = $fileName_video;
        }else{
            $video->video_file = '';
        }

        $res = $video->save();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Video Saved'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Video Not Saved'));
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
        $video_detail = DB::table('videos')
        ->select('*')
        ->where('video_id',$id)
        ->first();

        $menu_lists = DB::table('menus')
        ->select('*')
        ->get();

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('video_edit',compact('video_detail','menu_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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

        $array_image = array();
        if($_FILES['video_image']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_image = $num2.'.'.$request->video_image->getClientOriginalExtension();
            $request->video_image->move(public_path('video/'), $fileName_image);
            $array_image = array('video_image'=>$fileName_image);
        }

        $array_video = array();
        if($_FILES['video_file']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_video = $num2.'.'.$request->video_file->getClientOriginalExtension();
            $request->video_file->move(public_path('video/'), $fileName_video);
            $array_video = array('video_file'=>$fileName_video);
        }

        $array_1 = array('menu_id'=>$formdata['menu_id'],'video_name'=>$formdata['video_name'],'updated_at'=>date('Y-m-d H:i:s'));
        $merge_array = array_merge($array_1,$array_image,$array_video);
        //dd($merge_array); exit;
        $res = DB::table('videos')->where('video_id',$id)
        ->update($merge_array);
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Video Updated'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Video Not Updated'));
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
        $res = DB::table('videos')->where('video_id',$id)
        ->delete();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Video Deleted'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Video Not Deleted'));
        }
    }
}
