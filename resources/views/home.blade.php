@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')
@if(!empty($students[0]->institute->institute_name))
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-2 p-md-2 bg-white">
            <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
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
                        <td>{{ $student->enrollment_no }}</td>
                        <td>{{ $student->institute->institute_name }}</td>
                        <td>{{ $student->department->department_name }}</td>
                        <td>{{ $student->program->program_name }}</td>
                        <td>{{ $student->course->course_name }}</td>
                        <td>{{ $student->sem }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->contact }}</td>
                        <td><button type="button" class="btn btn-danger" onclick="remove_registration({{ $student->id }});">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $students->links() }}
        </div>
    </div>
</div>
@else
<div class="jumbotron">
  <h1 class="display-4">No Records Found</h1>
</div>
@endif
@endsection

@section('javascript')
<script>
    function remove_registration(r_id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.value){
                window.location = `{{ route('remove_registration') }}/${r_id}`;
            }else{
                Swal.fire({
                    title: 'Nothing is deleted.',
                    icon: 'info',
                    showConfirmButton: true
                });
            }
        });
    }
</script>
@endsection
