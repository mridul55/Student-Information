<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    public function StudentAll()
    {
        $students = Student::latest()->get();
        return view('student.index',compact('students'));
    }

    public function StudentStore(Request $request)
    {
        
        $request->validate(
            [
                'class'=> 'required',
                'roll'=> 'required|unique:students',
                'name'=> 'required',
                'father_name'=> 'required',
                'mother_name'=> 'required',
                'email'=> 'required|unique:students',
                'phone'=> 'required|unique:students',
                'address'=> 'required',

            ],
            [
                'class.required' => 'class Is Required',
                'roll.required' => 'roll Is Required',
                'roll.unique' => 'roll Already Exits',
                'name.required' => 'Name Is Required',
                'father_name.required' => 'Father Name Is Required',
                'mother_name.required' => 'Mother Name Is Required',
                'email.required' => 'Email Is Required',
                'email.unique' => 'Email Already Exits',
                'phone.required' => 'Phone Number Is Required',
                'phone.unique' => 'Phone Number Already Exits',
                'address.required' => 'Address Is Required',
            ]
        );
        Student::insert([
            'class' => $request->class,
            'roll' => $request->roll,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        return response()->json([
            'status' => 'success',
            'msg' => 'Student Information Added successfully'
        ]);

    }


    public function StudentUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'class'=> 'required',
                'roll'=> 'required|unique:students',
                'name'=> 'required',
                'father_name'=> 'required',
                'mother_name'=> 'required',
                'email'=> 'required|unique:students',
                'phone'=> 'required|unique:students',
                'address'=> 'required',

            ],
            [
                'class.required' => 'class Is Required',
                'roll.required' => 'roll Is Required',
                'roll.unique' => 'roll Already Exits',
                'name.required' => 'Name Is Required',
                'father_name.required' => 'Father Name Is Required',
                'mother_name.required' => 'Mother Name Is Required',
                'email.required' => 'Email Is Required',
                'email.unique' => 'Email Already Exits',
                'phone.required' => 'Phone Number Is Required',
                'phone.unique' => 'Phone Number Already Exits',
                'address.required' => 'Address Is Required',
            ]
        );
        
        Student::findorFail($id)->update([
            'class' => $request->class,
            'roll' => $request->roll,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json([
            'status' => 'success',
            'msg' => 'Student Information Updated successfully'
        ]);

    }


    public function StudentDelete($id)
    {
        Student::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Deleted successfully'
        ]);
    }

    
}
