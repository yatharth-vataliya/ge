<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
    	$settings = GeneralSetting::get();
    	return view('settings.index',['settings' => $settings ]);
    }

    public function editRegistration(Request $request){
    	$validated = Validator::make($request->all(),[
    		'registration' => 'required',
    	]);

    	if($validated->fails()){
    		return response()->json([
    			'check' => false,
    			'message' => 'some validations are not valid please don\'t mess with code '
    		]);
    	}

    	GeneralSetting::updateOrInsert(
            ['key' => 'registration'],
            ['value' => $request->registration]
    );

    	return response()->json([
    		'check' => true,
    		'message' => 'Registration is '.$request->registration. ' now'
    	]);

    }

}
