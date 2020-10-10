<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Program;
use App\Models\Course;

class DepartmentController extends Controller
{
    public function index(){
        $institutes = Institute::latest()->get();
        $departments = Department::with(['institute'])->latest()->paginate(7);
        return view('admin.department',compact('institutes','departments'));
    }

    public function insertDepartment(Request $request){
        $request->validate([
            'institute_id' => 'required',
            'department_name' => 'required|string|max:50',
            'type' => 'required'
        ],[
            'institute_id.required' => 'Please Select Any Institute.',
            'type.required' => 'Please Select UG or PG for department.',
        ]);

        $department = Department::create($request->only(['institute_id','department_name','type']));

        if(!empty($department->id))
            return redirect()->route('department')->with('success','Department successfully created.');
        else
            return back()->with('error','Something went wrong please try again.');
    }

    public function deleteDepartment($department_id = NULL){
        if($department_id == NULL)
            return response()->json([ 'check' => false ]);

        $deleted_department = Department::where('id',$department_id)->delete();
        $deleted_program = Program::where('department_id',$department_id)->delete();
        $deleted_courses = Course::where('department_id',$department_id)->delete();

        if(!empty($deleted_department))
            return response()->json([ 'check' => true ]);
        else
            return response()->json([ 'check' => false ]);

    }

    public function editDepartment($department_id = NULL){
        if($department_id == NULL)
            return back()->with('error','Something went wrong please try again.');

        $department = Department::find($department_id);
        $institutes = Institute::latest()->get();

        if(!empty($department->id))
            return view('admin.edit_department',compact('department','institutes'));
        else
            return back()->with('error','Something went wrong please try again.');
    }

    public function updateDepartment(Request $request){
        $request->validate([
            'department_id' => 'required',
            'institute_id' => 'required',
            'department_name' => 'required|string|max:50',
            'type' => 'required'
        ],[
            'department_id.required' => 'Dont\' mess with the code.',
            'institute_id.required' => 'Please Select Any Institute.',
            'type.required' => 'Please Select UG or PG for department.',
        ]);

        $department = Department::where('id',$request->input('department_id'))->update([
            'institute_id' => $request->input('institute_id'),
            'department_name' => $request->input('department_name'),
            'type' => $request->input('type')
        ]);

        if(!empty($department))
            return redirect()->route('department')->with('success','Department successfully updated.');
        else
            return back()->with('error','Something went wrong please try again.');
    }

}
