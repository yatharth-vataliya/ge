<div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 p-2 m-2 rounded bg-white shadow">
				<label for="search" class="control-label">Search</label>
				<input type="text" class="form-control" name="search" wire:model="search" placeholder="Search by name,contact,enrollment no,email">
			</div>
			<div class="col-md-12 p-2 p-md-2 bg-white">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>No.</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Enrollment No.</th>
							<th>Institute</th>
							<th>Department</th>
							<th>Program</th>
							<th>Selected GE Course</th>
							<th>Sem</th>
							<th>Gender</th>
							<th>Contact</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@php $no = 0;  @endphp
						@foreach($students as $student)
						<tr>
							<td>{{ ++$no }}</td>
							<td>{{ $student->full_name }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->enrollment_no }}</td>
							<td>{{ $student->institute?->institute_name }}</td>
							<td>{{ $student->department?->department_name }}</td>
							<td>{{ $student->program?->program_name }}</td>
							<td>{{ $student->course?->course_name }}</td>
							<td>{{ $student->sem }}</td>
							<td>{{ $student->gender }}</td>
							<td>{{ $student->contact }}</td>
							<td><button type="button" class="btn btn-danger" onclick="remove_registration({{ $student->id }});">Delete</button></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $students->links('layouts.pagination_livewire') }}
			</div>
		</div>
	</div>
</div>
