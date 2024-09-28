@extends('layouts.app')

@section('title')
    Edit Department
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
                        <h4>Edit Department</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_department') }}">
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $department->id }}">
                            <div class="form-group">
                                <label for="institute" class="">Select Institute</label>
                                <select name="institute_id" id="institute" class="custom-select">
                                    <option value="">--select institute--</option>
                                    @foreach ($institutes as $institute)
                                        @if ($department->institute_id == $institute->id)
                                            <option value="{{ $institute->id }}" selected>{{ $institute->institute_name }}
                                            </option>
                                        @endif
                                        <option value="{{ $institute->id }}">{{ $institute->institute_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department_name">Department</label>
                                <input type="text" class="form-control" name="department_name"
                                    placeholder="Department Name" value="{{ $department->department_name }}">
                            </div>
                            <div class="form-inline form-group">
                                <div class="form-check form-check-inline">
                                    TYPE :- &nbsp;
                                    <input type="radio" name="type" id="PG" value="PG"
                                        class="form-check-input" {{ $department->type == 'PG' ? 'checked' : '' }}>
                                    <label for="PG" class="form-check-label">PG</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="type" class="form-check-input" value="UG"
                                        id="UG" {{ $department->type == 'UG' ? 'checked' : '' }}>
                                    <label for="UG">UG</label>
                                </div>
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
