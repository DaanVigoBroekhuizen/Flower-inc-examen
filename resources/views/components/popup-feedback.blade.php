<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

@if(session()->has('success'))
    <script>
        Swal.fire({
            title: '{{ session()->get('success') }}',
            icon: 'success',
            showConfirmButton : false,
            timer: 3000,
        })
    </script>
@endif

@if(session()->has('error'))
    <script>
        Swal.fire({
            title: '{{ session()->get('error') }}!',
            icon: 'error',
            showConfirmButton : false,
            timer: 3000,
        })
    </script>
@endif

@if(session()->has('edit'))
    <script>
        Swal.fire({
            title: '{{ session()->get('edit') }}!',
            icon: 'info',
            showConfirmButton : false,
            timer: 3000,
        })
    </script>
@endif
