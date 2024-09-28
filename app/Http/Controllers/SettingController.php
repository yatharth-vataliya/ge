<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\GeneralSetting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::get();

        return view('settings.index', ['settings' => $settings]);
    }

    public function editRegistration(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'registration' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'check' => false,
                'message' => 'some validations are not valid please don\'t mess with code ',
            ]);
        }

        GeneralSetting::updateOrInsert(
            ['key' => 'registration'],
            ['value' => $request->registration]
        );

        return response()->json([
            'check' => true,
            'message' => 'Registration is '.$request->registration.' now',
        ]);

    }

    public function truncateStudents()
    {
        $result = Student::truncate();
        Course::where([])->update(['course_count' => 0]);
        if ($result) {
            return response()->json([
                'check' => true,
                'message' => 'Students table truncated successfully',
            ]);
        } else {
            return response()->json([
                'check' => false,
                'message' => 'Something won\'t wrong please try again later',
            ]);
        }
    }
}
