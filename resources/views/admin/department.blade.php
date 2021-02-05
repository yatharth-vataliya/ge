@extends('layouts.app')

@section('title')
Department
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid">
	<div class="row m-2 m-md-2 bg-white">
		<div class="col-md-4 border border-primary p-2 p-md-2">
			<form method="POST" action="{{ route('insert_department') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="institute">Select Institute</label>
					<select name="institute_id" id="institute" class="custom-select">
						<option value="">--select institute--</option>
						@foreach($institutes as $institute)
						@if(old('institute_id') == $institute->id)
						<option value="{{ old('institute_id') }}" selected>{{ $institute->institute_name }}</option>
						@endif
						<option value="{{ $institute->id }}">{{ $institute->institute_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="department_name">Department</label>
					<input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department Name" value="{{ old('department_name') }}">
				</div>
				<div class="form-inline form-group">	
					<div class="form-check form-check-inline">
						TYPE :- &nbsp;
						<input type="radio" name="type" id="PG" value="PG" class="form-check-input" {{ old('type') == 'PG' ? 'checked' : '' }}>
						<label for="PG" class="form-check-label">PG</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="type" class="form-check-input" value="UG" id="UG" {{ old('type') == 'UG' ? 'checked' : '' }}>
						<label for="UG">UG</label>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-success btn-lg">
				</div>
			</form>
		</div>
		<div class="col-md-8 p-2 p-md-2 border border-warning">
			<table class="table table-striped table-responsive table-hover">
				<thead>
					<tr>
						<th>Institute Name</th>
						<th>Department Name</th>
						<th>Department Type</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($departments as $department)
					<tr id="row{{ $department->id }}">
						<td>{{ $department->institute->institute_name }}</td>
						<td>{{ $department->department_name }}</td>
						<td>{{ $department->type }}</td>
						<td><a href="{{ route('edit_department',[ 'department_id' => $department->id ]) }}" class="btn btn-warning">Edit</a></td>
						<td><button type="button" class="btn btn-danger" onclick="delete_department({{ $department->id }});">Delete</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-12 text-center">
					{{ $departments->links() }}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@include('partials.form_errors')
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script type="text/javascript" charset="utf-8">
	function delete_department(d_id){
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				axios.get(`{{ route("delete_department") }}/${d_id}`)
				.then(function (response) {
					let res = response.data;
					if(res.check){
						Swal.fire({
							icon: 'success',
							showConfirmButton: false,
							title: 'Department is deleted.',
							timer:2000
						});
						let row = document.querySelector("#row"+d_id);
						row.remove();
					}else{
						Swal.fire({
							icon: 'error',
							title: 'something went wrong. don not mess with the code.',
							showConfirmButton: true
						});
					}
				});
			}else{
				Swal.fire({
					icon: 'error',
					showConfirmButton: true,
					title: 'Not deleted.',
				});
			}
		});
	}
</script>
@endsection
