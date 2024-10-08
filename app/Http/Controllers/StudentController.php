<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Course;
use App\Models\Department;
use App\Models\GeneralSetting;
use App\Models\Institute;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function showRegistrationForm()
    {
        $institutes = Institute::latest()->get();
        $setting = GeneralSetting::where('key', '=', 'registration')->first();
        if (! empty($setting->value) && $setting->value == 'on') {
            return view('student.registration_form', compact('institutes'));
        } else {
            return view('student.closed');
        }
    }

    public function loadDepartment($institute_id = null, ?string $degree = null)
    {
        if ($institute_id == null || $degree == null) {
            return response()->json(['check' => false]);
        }

        $departments = Department::where('institute_id', $institute_id)->where('type', $degree)->latest()->get();

        if (! empty($departments[0]->id)) {
            $options = "<option value=''>--select department--</option>";
            foreach ($departments as $department) {
                $options .= "<option value='{$department->id}'>{$department->department_name} ({$department->type}) </option>";
            }

            return response()->json(['check' => true, 'departments' => $options]);
        } else {
            return response()->json(['check' => false]);
        }

    }

    public function loadProgram($department_id = null)
    {
        if ($department_id == null) {
            return response()->json(['check' => false]);
        }

        $programs = Program::where('department_id', $department_id)->latest()->get();

        if (! empty($programs[0]->id)) {
            $options = "<option value=''>--select program--</option>";
            foreach ($programs as $program) {
                $options .= "<option value='{$program->id}'>{$program->program_name}</option>";
            }

            return response()->json(['check' => true, 'programs' => $options]);
        } else {
            return response()->json(['check' => false]);
        }

    }

    public function loadCourse($department_id = null, $institute_id = null)
    {
        if ($department_id == null || $institute_id == null) {
            return response()->json(['check' => false]);
        }

        $department = Department::find($department_id);

        if (empty($department->id)) {
            return response()->json(['check' => false]);
        }

        $departments = Department::where('id', '<>', $department_id)->where('institute_id', $institute_id)->where('type', $department->type)->latest()->get();

        if (empty($departments[0]->id)) {
            return response()->json(['check' => false]);
        }

        $options = "<option value=''>--select any course--</option>";

        foreach ($departments as $department) {
            foreach ($department->courses()->get() as $course) {
                $options .= "<option value='{$course->id}'>{$course->course_name} ({$department->type})</option>";
            }
        }

        return response()->json(['check' => true, 'courses' => $options]);
    }

    public function registerStudent(Request $request)
    {
        $validated = $request->validate([
            'institute_id' => 'required|integer',
            'department_id' => 'required|integer',
            'program_id' => 'required|integer',
            'course_id' => 'required|integer',
            'sem' => 'required|integer',
            'enrollment_no' => 'required|unique:students',
            'full_name' => 'required|string|max:191|min:15',
            'email' => 'nullable|email',
            'gender' => 'required|string',
            'contact' => 'required|string|max:10|min:10',
        ], [
            'institute_id.required' => 'Please select any Institute.',
            'department_id.required' => 'Please select any Department.',
            'program_id.required' => 'Please select any Program.',
            'course_id.required' => 'Please select any course.',
            'sem.required' => 'Please select any sem.',
            'enrollment_no.required' => 'Please insert Enrollment No.',
            'full_name.required' => 'Please insert Full name as mentioned.',
            'full_name.max' => 'Inserted name is too long.',
            'full_name.min' => 'It looks like inserted name is too short.',
            'gender.required' => 'Please select any Gender.',
            'contact.required' => 'Please insert Contact.',
            'contact.max' => 'Insert only 10 digit contact number.',
            'contact.min' => 'Insert only 10 digit contact number.',
        ]);

        $course = Course::find($request->input('course_id'));

        if (empty($course->id)) {
            return back()->wiht('error', 'Something went wrong please try again.');
        }

        $course_limit = $course->course_limit;

        $course_count = (int) $course->course_count;

        $course_count++;

        if ($course_count > $course_limit) {
            return back()->with('error', 'This course is completed it\'s limit please select another one.');
        }

        $course->course_count = $course_count;

        $course->save();

        $student = Student::create($validated);

        return redirect()->route('ge_registration')->with('success', 'Your registration is successfull.');
    }

    public function removeRegistration($student_id = null)
    {
        if ($student_id == null) {
            return back()->wit('error', 'Something went wrong please try again.');
        }

        $student = Student::findOrFail($student_id);
        $courseId = $student->course_id;
        $course = Course::findOrFail($courseId);
        $courseCount = (int) $course->course_count;
        $courseCount--;
        $course->course_count = $courseCount;
        $course->save();
        Student::destroy([$student_id]);

        return redirect()->route('home')->with('success', 'Successfully Deleted.');

    }

    public function generateExcelForm()
    {
        $courses = Course::latest()->get();
        $departments = Department::latest()->get();

        return view('admin.generate_excel_form', compact('courses', 'departments'));
    }

    public function departmentExcel(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
        ], [
            'department_id.required' => 'Please select any Department',
        ]);

        // return Excel::create();
        return Excel::download(new StudentExport(null, $request->input('department_id')), 'DepartmentWiseExcel.xlsx');
        // $department_id = $request->input('department_id');
        // $students = Student::where('department_id',$department_id)->latest()->get();
        // return Excel::create('DepartMentWiceExcel',function($excel) use ($students){
        // 	$excel->sheet('DepartmentWiceExcelSheet',function($sheet) use ($students){
        // 		$sheet->setFontFamily('Times New Roman');
        // 		$sheet->setStyle([
        // 			'borders' => [
        // 				'allborders' => [
        // 					'color' => [
        // 						'rgb' => '000000'
        // 					]
        // 				]
        // 			]
        // 		]);
        // 		$sheet->mergeCells('A1:H1');
        // 		$sheet->cells('A1',function($cells){
        // 			$cells->setValignment('center');
        // 			$cells->setBackground('#FFFF00');
        //       $cells->setAlignment('left');
        //       $cells->setFontWeight('bold');
        //       $cells->setFontSize(24);
        //       $cells->setBorder('medium', 'none', 'medium', 'medium');
        // 		});
        // 		$sheet->setCellValue('A1','ATMIYA UNIVERSITY, Rajkot');
        // 	});
        // })->export('xlsx');

    }

    public function courseExcel(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
        ], [
            'course_id.required' => 'Please select any Course',
        ]);

        return Excel::download(new StudentExport($request->input('course_id'), null), 'CourseWiseExcel.xlsx');
    }
}
