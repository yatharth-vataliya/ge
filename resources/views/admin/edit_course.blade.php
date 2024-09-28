@extends('layouts.app')

@section('title')
    Edit Course
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
                        <h4>Edit Course</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_course') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="form-group">
                                <label for="institute">Select department</label>
                                <select name="department_id" id="department" class="custom-select">
                                    <option value="">--select department--</option>
                                    @foreach ($departments as $department)
                                        @if ($course->department_id == $department->id)
                                            <option value="{{ $department->id }}" selected>
                                                {{ $department->department_name }} ({{ $department->type }})</option>
                                        @endif
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                            ({{ $department->type }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" name="course_name" id="course_name"
                                    placeholder="Course Name" value="{{ $course->course_name }}">
                            </div>
                            <div class="form-group">
                                <label for="course_code">Course Code</label>
                                <input type="text" class="form-control" name="course_code" id="course_code"
                                    placeholder="Course Code" value="{{ $course->course_code }}">
                            </div>
                            <div class="form-group">
                                <label for="course_limit">Course Limit</label>
                                <input type="text" class="form-control" name="course_limit" id="course_limit"
                                    placeholder="Course Limit" value="{{ $course->course_limit }}">
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
