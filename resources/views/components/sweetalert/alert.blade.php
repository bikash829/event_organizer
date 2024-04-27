@if ($session)
    <script>
        let message = @json(session('success'));
        $(document).ready(function() {

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
@endif
