<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GE REGISTRATION</title>
</head>
<body>
	@if(!empty($students[0]->id))
	<table class="table-bordered table table-striped">
		<thead>
			<tr align="center">
				<th colspan="8">ATMIYA UNIVERSITY, Rajkot</th>
			</tr>
			<tr align="center">
				<th colspan="8"></th>
			</tr>
			<tr align="center">
				<th colspan="8">Generic Elective Course Selection</th>
			</tr>
			<tr align="center">
				<th colspan="8">Course :- {{ $course_name }}</th>
			</tr>
			<tr>
				<th></th>
				<th>Semester - {{ $students[0]->sem }}</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>Batch - {{ date('Y') }}</th>
			</tr>
			<tr>
				<th>Sr. No.</th>
				<th>Enrolment No.</th>
				<th>Name of Student</th>
				<th>Department</th>
				<th>Male/Female</th>
				<th>Phone No</th>
				<th>Selected Course</th>
			</tr>
		</thead>
		<tbody>
			@php  $no = 0; @endphp
			@foreach($students as $student)
			<tr>
				<td>{{ ++$no }}</td>
				<td>{{ $student->enrollment_no }}</td>
				<td>{{ $student->full_name }}</td>
				<td>{{ $student->department->department_name }} ({{ $student->department->type }})</td>
				<td>{{ $student->gender }}</td>
				<td>{{ $student->contact }}</td>
				<td>{{ $student->course->course_name }} ({{ $student->course->department->type }})</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<table>
		<thead>
			<tr>
				<th>No Records Found</th>
			</tr>
		</thead>
	</table>
	@endif
</body>
</html>
