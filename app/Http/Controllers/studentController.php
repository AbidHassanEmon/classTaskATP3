<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public function getstudents()
    {
        $data=student::all();
        return response()->json($data);
    }

    public function addstudent(Request $req)
    {
        $student=new student();
        $student->s_Name=$req->s_Name;
        $student->dept=$req->dept;
        $st=$student->save();
        if($st)
        {
            $da=array("msg"=>"Student Added Successfull");
            return response()->json($da);
        }
    }


    public function studentdel(Request $req)
    {
        $st=student::where('ID',$req->ID)->delete();
        
        if($st)
        {
            $da=array("msg"=>"Student deleted Successfull");
            return response()->json($da);
        }
    }


    public function studentupdate(Request $req)
    {
    
        $st=student::Where("ID",$req->ID)->update(["s_Name" =>"$req->s_Name","dept" =>"$req->dept"]);
        
        if($st)
        {
            $ca=array("msg"=>"Student Updated Successfull");
            return response()->json($ca);
        }
    }


}
