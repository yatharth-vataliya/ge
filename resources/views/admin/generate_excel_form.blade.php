@extends('layouts.app')

@section('title')
Excel Generate Form
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid">
	<div class="row bg-white">
		<div class="col-md-6 p-2 p-md-2 border border-info">
			<form method="POST" action="{{ route('department_excel') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="department">Select Department</label>
					<select class="custom-select" name="department_id">
						<option value="">--Select Any Department--</option>
						@foreach($departments as $department)
						<option value="{{ $department->id }}">{{ $department->department_name }} ({{ $department->type }})</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-lg btn-info" value="Generate Excel">
				</div>
			</form>
		</div>
		<div class="col-md-6 p-2 p-md-2 border border-warning">
			<form method="POST" action="{{ route('course_excel') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="course">Select Course</label>
					<select class="custom-select" name="course_id">
						<option value="">--Select Any Course--</option>
						@foreach($courses as $course)
						<option value="{{ $course->id }}">{{ $course->course_name }} ({{ $course->department->type }})</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-lg btn-warning" value="Generate Excel">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('javascript')

@endsection
