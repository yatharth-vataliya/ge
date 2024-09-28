@extends('layouts.app')

@section('title')
    Edit Program
@endsection

@section('js_script')
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row m-2 m-md-2 p-2 p-md-2">
            <div class="col-md-2">

            </div>
            <div class="col-md-8 p-2 p-md-2">
                <div class="card border-success bg-white">
                    <div class="card-header text-center">
                        <h4>Edit Program</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_program') }}">
                            @csrf
                            <input type="hidden" name="program_id" value="{{ $program->id }}">
                            <div class="form-group">
                                <label for="department" class="">Select department</label>
                                <select name="department_id" id="department" class="custom-select">
                                    <option value="">--select department--</option>
                                    @foreach ($departments as $department)
                                        @if ($department->id == $program->department_id)
                                            <option value="{{ $department->id }}" selected>
                                                {{ $department->department_name }} ({{ $department->type }}) </option>
                                        @endif
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                            ({{ $department->type }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="program_name">Program Name</label>
                                <input type="text" class="form-control" name="program_name" placeholder="Program Name"
                                    value="{{ $program->program_name }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-success btn-lg">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        @include('partials.form_errors')
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
