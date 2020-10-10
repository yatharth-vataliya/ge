@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        timer: 1500,
        showConfirmButton: false,
        title: '{{ session("success") }}'
    });
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session("error") }}'
    });
</script>
@endif
@if(session('info'))
<script>
    Swal.fire({
        icon: 'info',
        title: '{{ session("info") }}'
    });
</script>
@endif