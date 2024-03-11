<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboardcontroller;

class Documentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('ses_user_id')){
            $document_lists = DB::table('documents')
            ->select('*')
            ->get();

            //user permission data function
            $userpermission_data = (new Dashboardcontroller)->permission_data();
            $sidemenu_lists = $userpermission_data['sidemenu_lists'];
            $userpermission_list = $userpermission_data['userpermission_list'];

            $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

            return view('document_list',compact('document_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
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

        return view('document_add',compact('sidemenu_lists','userpermission_list','fm_module_lists'));
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

        if($_FILES['doc_image']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_image = $num2.'.'.$request->doc_image->getClientOriginalExtension();
            $request->doc_image->move(public_path('document/'), $fileName_image);
        }

        if($_FILES['doc_pdf']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_pdf = $num2.'.'.$request->doc_pdf->getClientOriginalExtension();
            $request->doc_pdf->move(public_path('document/'), $fileName_pdf);
        }

        $document = new Document;
        $document->doc_name = $formdata['doc_name'];
        if($_FILES['doc_image']['name']!=''){
            $document->doc_image = $fileName_image;
        }else{
            $document->doc_image = '';
        }
        if($_FILES['doc_pdf']['name']!=''){
            $document->doc_pdf = $fileName_pdf;
        }else{
            $document->doc_pdf = '';
        }

        $res = $document->save();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'Document Saved'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'Document Not Saved'));
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
        $document_detail = DB::table('documents')
        ->select('*')
        ->where('document_id',$id)
        ->first();

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('document_edit',compact('document_detail','sidemenu_lists','userpermission_list','fm_module_lists'));
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
        if($_FILES['doc_image']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_image = $num2.'.'.$request->doc_image->getClientOriginalExtension();
            $request->doc_image->move(public_path('document/'), $fileName_image);
            $array_image = array('doc_image'=>$fileName_image);
        }

        $array_pdf = array();
        if($_FILES['doc_pdf']['name']!=''){
            $num2 = rand(1000000000,10000000000);
            $fileName_pdf = $num2.'.'.$request->doc_pdf->getClientOriginalExtension();
            $request->doc_pdf->move(public_path('document/'), $fileName_pdf);
            $array_pdf = array('doc_pdf'=>$fileName_pdf);
        }

        $array_1 = array('doc_name'=>$formdata['doc_name'],'updated_at'=>date('Y-m-d H:i:s'));
        $merge_array = array_merge($array_1,$array_image,$array_pdf);
        //dd($merge_array); exit;
        $res = DB::table('documents')->where('document_id',$id)
        ->update($merge_array);
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'document Updated'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'document Not Updated'));
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
        $res = DB::table('documents')->where('document_id',$id)
        ->delete();
        if($res){
            echo json_encode(array("status"=>200,"msg"=>'document Deleted'));
        }else{
            echo json_encode(array("status"=>201,"msg"=>'document Not Deleted'));
        }
    }

    public function manual_list(){
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $document_lists = DB::table('documents')
        ->select('*')
        ->get();

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('manual_list',compact('document_lists','sidemenu_lists','userpermission_list','fm_module_lists'));
    }

    public function manual_detail($id)
    {
        if(!session()->has('ses_user_id')){
            return redirect('login');
            exit;
        }
        $document_detail = DB::table('documents')
        ->select('*')
        ->where('document_id',$id)
        ->first();

        //user permission data function
        $userpermission_data = (new Dashboardcontroller)->permission_data();
        $sidemenu_lists = $userpermission_data['sidemenu_lists'];
        $userpermission_list = $userpermission_data['userpermission_list'];

        $fm_module_lists = (new Dashboardcontroller)->financial_management_module_list();

        return view('manual_detail',compact('document_detail','sidemenu_lists','userpermission_list','fm_module_lists'));
    }
}
