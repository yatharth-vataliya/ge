<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstituteController extends Controller
{
    public function index(){
        $institutes = Institute::latest()->paginate(7);
        return view('admin.institute',compact('institutes'));
    }

    public function insertInstitute(Request $request){
        $validator = Validator::make($request->all(),[
            'institute_name' => 'required|string|unique:institutes,institute_name',
        ]);

        if($validator->fails()){
            return response()->json([
                'check' => false,
            ]);
        }

        $institute = Institute::create($request->only(['institute_name']));

        if(empty($institute->id)){
            return response()->json([
                'check' => false,
            ]);
        }else{
            return response()->json([
                'check' => true,
                'institute' => $institute
            ]);
        }
    }

    public function deleteInstitute($institute_id = NULL){
        if($institute_id == NULL)
            return response()->json([
                'check' => false,
            ]);

        $result = Institute::destroy([$institute_id]);
        $departments = Department::where('institute_id',$institute_id)->get();
        foreach ($departments as $department) {
            $department->courses()->delete();
            $department->programs()->delete();
        }
        $deleted_departments = Department::where('institute_id',$institute_id)->delete();

        if ($result) {
            return response()->json([
                'check' => true,
            ]);
        }
    }

    public function editInstitute($institute_id = NULL){
        if($institute_id == NULL)
            return response()->json(['check' => false ]);

        $institute = Institute::find($institute_id);

        if(empty($institute))
            return response()->json([ 'check' => false ]);
        else
            return response()->json([
                'check' => true,
                'institute' => $institute
            ]);
    }

    public function updateInstitute(Request $request){
        $validator = Validator::make($request->all(),[
            'institute_name' => 'required|string|unique:institutes,institute_name',
            'institute_id' => 'required|integer'
        ]);

        if($validator->fails())
            return response()->json([ 'check' => false ]);

        $result = Institute::where('id',$request->input('institute_id'))->update(['institute_name' => $request->input('institute_name')]);

        if($result)
            return response()->json([ 'check' => true ]);
        else
            return response()->json([ 'check' => false ]);
    }
}
