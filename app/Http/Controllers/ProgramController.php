<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        $programs = Program::with(['department'])->latest()->paginate(7);

        return view('admin.program', compact('departments', 'programs'));
    }

    public function insertProgram(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'program_name' => 'required|string|max:50',
        ], [
            'department_id.required' => 'Please select any department.',
            'program_name.required' => 'Program name field is required',
        ]);

        $program = Program::create($request->only(['department_id', 'program_name']));

        if (! empty($program->id)) {
            return redirect()->route('program')->with('success', 'Program Successfully Inserted.');
        } else {
            return back()->with('error', 'Something went wrong please try again.');
        }

    }

    public function deleteProgram($program_id = null)
    {
        if ($program_id == null) {
            return response()->json(['check' => false]);
        }

        $deleted_programs = Program::where('id', $program_id)->delete();

        if (! empty($deleted_programs)) {
            return response()->json(['check' => true]);
        } else {
            return response()->json(['check' => false]);
        }
    }

    public function editProgram($program_id = null)
    {
        if ($program_id == null) {
            return back()->with('error', 'Soemthing went wrong please try again.');
        }

        $program = Program::find($program_id);

        $departments = Department::latest()->get();

        if (! empty($program->id)) {
            return view('admin.edit_program', compact('program', 'departments'));
        } else {
            return back()->with('error', 'Program not found ):');
        }
    }

    public function updateProgram(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'department_id' => 'required',
            'program_name' => 'required|string|max:50',
        ], [
            'program_id.required' => 'Please don\'t mess with the code',
            'department_id.required' => 'Please select any department.',
            'program_name.required' => 'Program name field is required',
        ]);

        $program = Program::where('id', $request->input('program_id'))->update($request->only(['department_id', 'program_name']));

        if (! empty($program)) {
            return redirect()->route('program')->with('success', 'Program successfully updated.');
        } else {
            return back()->with('error', 'Something went wrong please try again.');
        }

    }
}
