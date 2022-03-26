<?php

namespace App\Http\Controllers;
use App\Models\department;
use App\Models\student;
use Illuminate\Http\Request;

class deptcontroller extends Controller
{
    //
    public function getdepts()
    {
        $data=department::all();
        return response()->json($data);
    }


    public function adddept(Request $req)
    {
        $dept=new department();
        $dept->d_ID=$req->d_ID;
        $dept->d_Name=$req->d_Name;
        $st=$dept->save();
        if($st)
        {
            $da=array("msg"=>"Department Added Successfull");
            return response()->json($da);
        }
    }

    public function deptdel(Request $req)
    {
        $st=department::where('d_id',$req->d_id)->delete();
    
        if($st)
        {
            $da=array("msg"=>"Department deleted Successfull");
            return response()->json($da);
        }
    }

    public function deptupdate(Request $req)
    {
        
        $dept=department::Where("d_id",$req->d_id)->update(["d_Name" =>"$req->d_Name"]);
        
        if($dept)
        {
            $da=array("msg"=>"Department Added Successfull");
            return response()->json($da);
        }
    }

    public function deptdetails(Request $req)
    {
        $data=department::Where('d_id',$req->d_id)->first();
        $st=student::select('ID','s_Name')->where('dept',$req->d_id)->get();
        $data->setAttribute('students', $st);;
        return response()->json($data);
        
    }

}
