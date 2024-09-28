<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class StudentExport implements FromCollection
class StudentExport implements FromView, ShouldAutoSize
{
    private $course_id;

    private $department_id;

    public function __construct($course_id = null, $department_id = null)
    {
        $this->course_id = $course_id;
        $this->department_id = $department_id;
    }
    /*public function collection()
    {
    //
}*/

    public function view(): View
    {
        if (! empty($this->course_id)) {
            $students = Student::where('course_id', $this->course_id)->latest()->get();
            $course_name = (Course::find($this->course_id))->course_name;

            return view('excel.course', ['students' => $students, 'course_name' => $course_name]);
        }

        if (! empty($this->department_id)) {
            $students = Student::where('department_id', $this->department_id)->latest()->get();
            $department_name = (Department::find($this->department_id))->department_name;

            return view('excel.department', compact('students', 'department_name'));
        }
    }
}
