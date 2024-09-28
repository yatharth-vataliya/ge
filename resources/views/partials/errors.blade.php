<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', () => {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                timer: 1500,
                showConfirmButton: false,
                title: '{{ session('success') }}'
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif
        @if (session('info'))
            Swal.fire({
                icon: 'info',
                title: '{{ session('info') }}'
            });
        @endif
    });
</script>
