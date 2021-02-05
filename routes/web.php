<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', function () {
	return redirect()->route('ge_registration');
});

// Route::redirect('/', '/ge_registration');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
	Route::get('/institute','InstituteController@index')->name('institute');
	Route::post('/insert_institute','InstituteController@insertInstitute')->name('insert_institute');
	Route::get('/delete_institute/{institute_id?}','InstituteController@deleteInstitute')->name('delete_institute');
	Route::get('/edit_institute/{institute_id?}','InstituteController@editInstitute')->name('edit_institute');
	Route::post('/update_institute','InstituteController@updateInstitute')->name('update_institute');
	Route::get('/department','DepartmentController@index')->name('department');
	Route::post('/insert_department','DepartmentController@insertDepartment')->name('insert_department');
	Route::get('/delete_department/{department_id?}','DepartmentController@deleteDepartment')->name('delete_department');
	Route::get('/edit_department/{department_id?}','DepartmentController@editDepartment')->name('edit_department');
	Route::post('/update_department','DepartmentController@updateDepartment')->name('update_department');
	Route::get('/program','ProgramController@index')->name('program');
	Route::post('/insert_program','ProgramController@insertProgram')->name('insert_program');
	Route::get('/delete_program/{program_id?}','ProgramController@deleteProgram')->name('delete_program');
	Route::get('/edit_program/{program_id?}','ProgramController@editProgram')->name('edit_program');
	Route::post('/update_program','ProgramController@updateProgram')->name('update_program');
	Route::get('/course','CourseController@index')->name('course');
	Route::post('/insert_course','CourseController@insertCourse')->name('insert_course');
	Route::get('/delete_course/{course_id?}','CourseController@deleteCourse')->name('delete_course');
	Route::get('/edit_course/{course_id?}','CourseController@editCourse')->name('edit_course');
	Route::post('/update_course','CourseController@updateCourse')->name('update_course');
	Route::get('/remove_registration/{student_id?}','StudentController@removeRegistration')->name('remove_registration');
	Route::get('/generate_excel_form','StudentController@generateExcelForm')->name('generate_excel_form');
	Route::post('/department_excel','StudentController@departmentExcel')->name('department_excel');
	Route::post('/course_excel','StudentController@courseExcel')->name('course_excel');
	Route::get('/register_user','UserController@showRegisterForm')->name('register_user');
	Route::post('/registerUser','UserController@registerUser')->name('registerUser');
	Route::get('/delete_user/{user_id?}','UserController@deleteUser')->name('delete_user');
	Route::get('/brochure','BrochureController@index')->name('brochure');
	Route::post('/brochure/store','BrochureController@store')->name('brochure.store');
	Route::get('/delete_brochure/{brochure_id?}','BrochureController@destroy')->name('brochure.delete');

	Route::get('/settings','SettingController@index')->name('settings');
	Route::post('/edit/registrtaion','SettingController@editRegistration')->name('edit.registration');

});

Route::get('/ge_registration','StudentController@showRegistrationForm')->name('ge_registration');
Route::get('/load_department/{institute_id?}/{degree?}','StudentController@loadDepartment')->name('load_department');
Route::get('/load_program/{department_id?}','StudentController@loadProgram')->name('load_program');
Route::get('/load_course/{department_id?}/{institute_id?}','StudentController@loadCourse')->name('load_course');
Route::post('/register_student','StudentController@registerStudent')->name('register_student');
Route::view('/about_us','about_us');
Route::get('/download/brochure/{brochure_id}','BrochureController@download')->name('brochure.download');
Route::get('/news',function(){
	$brochures = \App\Models\Brochure::latest()->paginate(7);
	return view('student.news',compact('brochures'));
})->name('news');


Route::fallback(function(){
	return view('fallback');
});
