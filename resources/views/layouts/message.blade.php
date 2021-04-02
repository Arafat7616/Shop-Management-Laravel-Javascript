<!-- Start Session Message -->
<!--Validation error show -->
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '' +
                '    <div class="alert alert-danger">\n' +
                '        <ul>\n' +
                '            @foreach ($errors->all() as $error)\n' +
                '                <li>{{ $error }}</li>\n' +
                '            @endforeach\n' +
                '        </ul>\n' +
                '    </div>\n' +
                '',
        })
    </script>
@endif
<!--Check session message--->
@if(session()->has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '{{ session('type') }}',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 1500,
        })
    </script>
@endif
<!-- Validation msg end--->
