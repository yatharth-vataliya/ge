@extends('layouts.app')

@section('title')
Institutes
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid">
	<div class="row bg-white m-2 m-md-2">
		<div class="col-md-4 border border-primary p-2 p-md-2">
			<form enctype="multipart/form-data">
				<div class="form-group">
					<label for="institute">Institute Name</label>
					<input type="text" class="form-control" id="institute_name" placeholder="Institute Name">
				</div>
				<div class="form-group">
					<input type="button" value="Insert" class="btn btn-lg btn-success" onclick="insert_institute();">
				</div>
			</form>
		</div>
		<div class="col-md-8 border border-warning p-2 p-md-2">
			<table class="table table-striped table-responsive table-hover">
				<thead>
					<tr>
						<th>Institute Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody id="row">
					@foreach($institutes as $institute)
					<tr id="row{{ $institute->id }}">
						<td>{{ $institute->institute_name }}</td>
						<td><button type="button" class="btn btn-warning" onclick="edit_institute({{ $institute->id }});">Edit</button></td>
						<td><button type="button" class="btn btn-danger" onclick="delete_institute({{ $institute->id }});">Delete</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-12 text-center">
					{{ $institutes->links() }}
				</div>
			</div>
		</div>
	</div>
	<div class="row bg-white m-2 m-md-2">
		<div class="col-md-4 p-2 p-md-2" id="edit_form">
			
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
	function insert_institute(){
		const i_name = document.querySelector("#institute_name");
		axios.post('{{ route("insert_institute") }}', {
			_token:'{{ csrf_token() }}',
			institute_name: i_name.value
		})
		.then(function (response) {
			if(response.data.check){
				Swal.fire({
					icon: 'success',
					title: 'Institute created successfully.',
					showConfirmButton: false,
					timer: 1500
				});
				let row = document.querySelector("#row");
				let institute = response.data.institute;
				let row_txt = `<tr id="row${institute.id}">
				<td>${institute.institute_name}</td>
				<td><button type="button" class="btn btn-warning" onclick="edit_institute(${institute.id});">Edit</button></td>
				<td><button type="button" class="btn btn-danger" onclick="delete_institute(${institute.id})">Delete</button></td>
				</tr>`;
				row.innerHTML += row_txt;
				i_name.value = '';
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Something went wrong please try again.',
					showConfirmButton: true
				});
			}
		})
		.catch(function (error) {
			console.log(error);
		});
	}

	function delete_institute(institute_id){
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
				axios.get(`{{ route("delete_institute") }}/${institute_id}`)
				.then(function (response) {
					let res = response.data;
					if(res.check){
						Swal.fire({
							icon: 'success',
							showConfirmButton: false,
							title: 'Institute is deleted.',
							timer:2000
						});
						let row = document.querySelector("#row"+institute_id);
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

	function edit_institute(institute_id){
		axios.get(`{{ route("edit_institute") }}/${institute_id}`).then(function(response){
			let res = response.data;
			if(res.check){
				let edit_form = `<form>
				<div class="form-group">
				<label for="update_institute">Update Institute Name</label>
				<input type="text" class="form-control" id="update_institute_name" placeholder="Update Institute Name" value="${res.institute.institute_name}">
				</div>
				<div class="form-group">
				<input type="button" value="Update" class="btn btn-lg btn-info" onclick="update_institute(${res.institute.id});">
				</div>
				</form>`;
				let form = document.querySelector("#edit_form");
				form.innerHTML = edit_form;
			}
		});
	}

	function update_institute(i_id){
		var i_name = $('#update_institute_name').val();
		axios.post('{{ route("update_institute") }}',{
			_token: '{{ csrf_token() }}',
			institute_id: i_id,
			institute_name: i_name
		}).then(function(response){
			let res = response.data;
			if(res.check){
				Swal.fire({
					icon: 'success',
					showConfirmButton: false,
					title: 'Institute is Updated.',
					timer:2000
				});
				let row_txt = document.querySelector("#row"+i_id);
				row_txt.childNodes[1].textContent = i_name;
				document.querySelector("#edit_form").innerHTML = "";
			}else{
				Swal.fire({
					icon: 'error',
					showConfirmButton: true,
					title: 'Something Went wrong.'
				});
			}
		});
	}

</script>
@endsection
