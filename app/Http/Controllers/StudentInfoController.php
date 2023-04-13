<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $students = StudentInfo::orderBy('id','desc')->paginate(5);
        return view('student_info.index',compact('user','students'));
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student   =   StudentInfo::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'class_name' => $request->class_name, 
                        'roll_no' => $request->roll_no, 
                        'student_name' => $request->student_name, 
                        'father_name' => $request->father_name, 
                        'mother_name' => $request->mother_name, 
                        'email' => $request->email, 
                        'phone' => $request->phone, 
                        'address' => $request->address, 
                       
                    ]);
    
        return response()->json(['success' => true]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {   

        $where = array('id' => $request->id);
        $student  = StudentInfo::where($where)->first();
 
        return response()->json($student);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   

        $where = array('id' => $request->id);
        $student  = StudentInfo::where($where)->first();
 
        return response()->json($student);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = StudentInfo::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
