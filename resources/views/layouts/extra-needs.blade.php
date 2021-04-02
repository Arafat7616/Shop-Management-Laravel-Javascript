<!--Start Logout System-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<script>
    function logout(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You can login again in this system!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Logout!',
                    'Successfully logout from this system.',
                    'success'
                )
                setTimeout(function() {
                    //your code to be executed after 1 second
                    document.getElementById('logout-form').submit();
                }, 1000);//2 second
            }
        })
    }
</script>
<!--End Logout System-->
