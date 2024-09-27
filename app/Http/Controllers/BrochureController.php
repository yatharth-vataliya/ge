<?php

namespace App\Http\Controllers;

use App\Models\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BrochureController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $brochures = Brochure::latest()->paginate(5);
    return view('brochure.brochure',compact('brochures'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
      'file_name' => 'required|string|max:190',
      'file_description' => 'required|string|max:190',
      'brochure_file' => 'required|max:2048|mimes:jpeg,JPG,JPEG,doc,docx,pdf,png,PNG'
    ]);

    if($validator->fails())
      return response()->json([ 'check' => false ]);

    if($request->hasFile('brochure_file')){
      $brochure_file_name_to_save = \time().'.'.$request->file('brochure_file')->extension();
      $request->file('brochure_file')->storeAs('public/brochures',$brochure_file_name_to_save);
    }

    $brochure = Brochure::create([
      'file_name' => $request->input('file_name'),
      'file_description' => $request->input('file_description'),
      'file_path' => $brochure_file_name_to_save
    ]);

    return response()->json([
      'check' => true,
      'brochure' => $brochure
    ]);

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Brochure  $brochure
  * @return \Illuminate\Http\Response
  */
  public function show(Brochure $brochure)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Brochure  $brochure
  * @return \Illuminate\Http\Response
  */
  public function edit(Brochure $brochure)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Brochure  $brochure
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Brochure $brochure)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Brochure  $brochure
  * @return \Illuminate\Http\Response
  */
  public function destroy(Brochure $brochure_id)
  {
    $file_name_to_delete = $brochure_id->file_path;
    Storage::delete("public/brochures/{$file_name_to_delete}");
    $brochure_id->delete();
    return response()->json([
      'check' => true
    ]);
  }

  public function download(?int $brochure_id = NULL){
    if($brochure_id == NULL) return response()->json([ 'check' => False ]);

    $brochure = Brochure::find($brochure_id);

    if(!empty($brochure)) return Storage::download('public/brochures/'.$brochure->file_path);
  }

}
