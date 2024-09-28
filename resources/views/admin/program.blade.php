@extends('layouts.app')

@section('title')
    Programs
@endsection

@section('js_script')
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row m-2 m-md-2 bg-white">
            <div class="col-md-4 border border-primary p-2 p-md-2">
                <form method="POST" action="{{ route('insert_program') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="institute">Select department</label>
                        <select name="department_id" id="department" class="custom-select">
                            <option value="">--select department--</option>
                            @foreach ($departments as $department)
                                @if (old('department_id') == $department->id)
                                    <option value="{{ old('department_id') }}" selected>{{ $department->department_name }}
                                        ({{ $department->type }})</option>
                                @endif
                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                    ({{ $department->type }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program_name">Program</label>
                        <input type="text" class="form-control" name="program_name" id="program_name"
                            placeholder="Program Name" value="{{ old('program_name') }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-success btn-lg">
                    </div>
                </form>
            </div>
            <div class="col-md-8 p-2 p-md-2 border border-warning">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Program Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr id="row{{ $program->id }}">
                                <td>{{ $program->department->department_name }} ({{ $program->department->type }})</td>
                                <td>{{ $program->program_name }}</td>
                                <td><a href="{{ route('edit_program', ['program_id' => $program->id]) }}"
                                        class="btn btn-warning">Edit</a></td>
                                <td><button type="button" class="btn btn-danger"
                                        onclick="delete_program({{ $program->id }});">Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ $programs->links() }}
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
        function delete_program(p_id) {
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
                    axios.get(`{{ route('delete_program') }}/${p_id}`)
                        .then(function(response) {
                            let res = response.data;
                            if (res.check) {
                                Swal.fire({
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Institute is deleted.',
                                    timer: 2000
                                });
                                let row = document.querySelector("#row" + p_id);
                                row.remove();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'something went wrong. don not mess with the code.',
                                    showConfirmButton: true
                                });
                            }
                        });
                } else {
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
