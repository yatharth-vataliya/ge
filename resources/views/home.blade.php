@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')
@livewire('student-list')
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
