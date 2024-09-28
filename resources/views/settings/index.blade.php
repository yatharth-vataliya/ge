@extends('layouts.app')

@section('title')
    Setting
@endsection

@section('js_script')
@endsection

@section('css')
@endsection

@section('content')
    @php
        $setting = $settings->where('key', '=', 'registration')->first();
        if (!empty($setting)) {
            $registration = $setting->value;
        } else {
            $registration = 'off';
        }
    @endphp
    <div class="container-fluid">
        <div class="row shadow rounded">
            <div class="col-md-4">
                <form method="POST">
                    <div class="form-group">
                        <label for="registration">Registration</label>
                        <select id="registration" name="registration" class="custom-select">
                            <option value="on" {{ $registration == 'on' ? 'selected' : '' }}>on</option>
                            <option value="off" {{ $registration == 'off' ? 'selected' : '' }}>off</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-4 p-2 mt-4">
                <button id="truncate_student" class="btn btn-outline-danger">Truncate Students Data</button>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', () => {
            $("#registration").on('change', function() {
                var reg = $(this).val();
                axios.post('{{ route('edit.registration') }}', {
                    '_token': '{{ csrf_token() }}',
                    'registration': reg
                }).then(response => {
                    res = response.data;
                    if (res.check) {
                        Swal.fire({
                            title: 'Changes are done to registration',
                            text: `${res.message}`,
                            icon: 'info',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Something is wrong',
                            text: `${res.message}`,
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                }).catch(error => {});
            });

            $("#truncate_student").click(function() {
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
                        axios.get(`{{ route('truncate_students') }}`)
                            .then(function(response) {
                                let res = response.data;
                                if (res.check) {
                                    Swal.fire({
                                        icon: 'success',
                                        showConfirmButton: false,
                                        title: 'All students data is deleted from database.',
                                        timer: 2000
                                    });
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
                            icon: 'info',
                            showConfirmButton: true,
                            title: 'Everything is safe.',
                        });
                    }
                });
            });
        });
    </script>
@endsection
