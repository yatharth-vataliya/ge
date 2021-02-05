<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Department;

class CourseController extends Controller
{
    public function index(){
        $departments = Department::latest()->get();
        $courses = Course::latest()->paginate(7);
        return view('admin.course',compact('departments','courses'));
    }

    public function insertCourse(Request $request){
        $validated = $request->validate([
            'department_id' => 'required',
            'course_name' => 'required|string',
            'course_code' => 'required|string',
            'course_limit' => 'required|integer|max:350',
        ],[
            'department_id.required' => 'Please select any department.',
            'course_name.required' => 'Please Insert Course Name.',
            'course_code.required' => 'Please Insert Course Code.',
            'course_limit.required' => 'Please Insert Course Limit',
            'course_limit.integer' => 'Course Limit Field must be Number',
        ]);

        $course = Course::create($validated);

        if(!empty($course->id))
            return redirect()->route('course')->with('success','Course successfully inserted.');
        else
            return back()->with('error','Something Went Wrong please try again.');
    }

    public function deleteCourse($course_id = NULL){
        if($course_id == NULL)
            return response()->json([ 'check' => false ]);
            // return back()->with('error','Something went wrong please try again.');

        $deleted_course = Course::where('id',$course_id)->delete();

        if(!empty($deleted_course))
            return response()->json([ 'check' => true ]);
        else
            return response()->json([ 'check' => false ]);
    }

    public function editCourse($course_id = NULL){
        if($course_id == NULL)
            return back()->with('error','Don\'t mess with the code please.');

        $course = Course::find($course_id);
        $departments = Department::latest()->get();

        if(!empty($course->id))
            return view('admin.edit_course',compact('course','departments'));
        else
            return back()->with('error','Soemthing went wrong please.');
    }

    public function updateCourse(Request $request){
        $validated = $request->validate([
            'course_id' => 'required',
            'department_id' => 'required',
            'course_name' => 'required|string',
            'course_code' => 'required|string',
            'course_limit' => 'required|integer|max:350',
        ],[
            'course_id.required' => 'Please Don\'t mess with code.',
            'department_id.required' => 'Please select any department.',
            'course_name.required' => 'Please Insert Course Name.',
            'course_code.required' => 'Please Insert Course Code.',
            'course_limit.required' => 'Please Insert Course Limit',
            'course_limit.integer' => 'Course Limit Field must be Number',
        ]);

        $course = Course::where('id',$request->input('course_id'))->update($request->only(['department_id','course_name','course_code','course_limit']));

        if(!empty($course))
            return redirect()->route('course')->with('success','Course successfully updated.');
        else
            return back()->with('error','Something went wrong please try again.');
    }
}
