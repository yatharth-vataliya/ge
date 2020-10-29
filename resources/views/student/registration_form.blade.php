@extends('layouts.app')

@section('title')
GE Registration
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route('register_student') }}" enctype="multipart/form-data">
				@csrf
				<div class="card border-primary">
					<div class="card-header text-center">
						GE REGISTRATION
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="institute">Select Institute</label>
							<select name="institute_id" class="custom-select" id="institute" onchange="load_department(this.value);">
								<option value="" disabled selected>select institute</option>
								@foreach($institutes as $institute)
								<option value="{{ $institute->id }}">{{ $institute->institute_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group p-1">
							<label class="my-0 p-0 mx-2 control-label">UG</label>
							<input type="radio" id="degree" name="degree" value="UG"  onchange="load_department(document.querySelector('#institute').value)" checked="">
							<label class="my-0 p-0 mx-2 control-label">PG</label>
							<input type="radio" id="degree" name="degree" value="PG" onchange="load_department(document.querySelector('#institute').value)" >
						</div>
						<div class="form-group">
							<label for="department">Select Department</label>
							<select name="department_id" class="custom-select" id="department" onchange="load_program(this.value);load_course(this.value);">
								<option value="">select department</option>
							</select>
						</div>
						<div class="form-group">
							<label for="program">Select Program</label>
							<select name="program_id" class="custom-select" id="program">
								<option value="">select program</option>
							</select>
						</div>
						<div class="form-group">
							<label for="course">Select Course (Your Choice)</label>
							<select name="course_id" class="custom-select" id="course">
								<option value="">select Course</option>
							</select>
						</div>
						<div class="form-group">
							<label for="sem">Select Sem</label>
							<select name="sem" class="custom-select">
								<option value="{{ old('sem') ?? '' }}" selected>{{ old('sem') ?? 'Select Sem' }}</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
						<div class="form-group">
							<label for="enrollno">Enrollment No</label>
							<input type="text" name="enrollment_no" value="{{ old('enrollment_no') }}" class="form-control" placeholder="Enrollment No">
						</div>
						<div class="form-group">
							<label for="full_name">Enter Full Name</label>
							<input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Sir name Your name Father name">
						</div>
						<div class="form-group">
							<label for="gender">Gender&nbsp;&nbsp;&nbsp;</label>
							<input type="radio" name="gender" value="male" class="custom-radio" {{ old('gender') == 'male' ? 'checked' : '' }}> Male
							<input type="radio" name="gender" value="female" class="custom-radio" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
						</div>
						<div class="form-group">
							<label for="contact">Enter Contact</label>
							<input type="text" name="contact" value="{{ old('contact') }}" class="form-control" placeholder="Enter Contact">
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" value="Register" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			@include('partials.form_errors')
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
	document.querySelector("#program").innerHTML = `<option value=''>--select any program--</option>`;
	document.querySelector("#department").innerHTML = `<option value=''>--select any department--</option>`;
	document.querySelector("#course").innerHTML = `<option value=''>--select any course--</option>`;

	function load_department(i_id){
		var degree = $('input[name="degree"]:checked').val();
		axios.get(`{{ route('load_department') }}/${i_id}/${degree}`).then(function(response){
			var department = document.querySelector("#department");
			if(response.data.check){
				department.innerHTML = response.data.departments;
			}else{
				Swal.fire({
					icon: 'error',
					timer: 1000,
					title: 'Something went wrong',
					showConfirmButton: false
				});
			}
		});
		document.querySelector("#program").innerHTML = `<option value=''>--select any program--</option>`;
		document.querySelector("#course").innerHTML = `<option value=''>--select any course--</option>`;
	}

	function load_program(d_id){
		axios.get(`{{ route('load_program') }}/${d_id}`).then(function(response){
			var program = document.querySelector("#program");
			if(response.data.check){
				program.innerHTML = response.data.programs;
			}else{
				Swal.fire({
					icon: 'error',
					timer: 1000,
					title: 'Something went wrong',
					showConfirmButton: false
				});
			}
		});
	}

	function load_course(d_id){
		var i_id = document.querySelector("#institute").value;
		axios.get(`{{ route('load_course') }}/${d_id}/${i_id}`).then(function(response){
			var course = document.querySelector("#course");
			if(response.data.check){
				course.innerHTML = response.data.courses;
			}else{
				Swal.fire({
					icon: 'error',
					timer: 1000,
					title: 'Something went wrong',
					showConfirmButton: false
				});
			}
		});
	}


</script>
@endsection
