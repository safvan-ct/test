
<link href="{{ asset('admin_assets/alert/sweetalert.css') }}" type="text/css" rel="stylesheet">
<style>
    .sa-icon.sa-success.animate {
    display: none !important;
}
.sweet-alert h2 {
    display: none !important;
}
</style>
@if (session('status'))
    <script>
        window.addEventListener("load", function() {
            swal("Success!", "{{ session('status') }}", "success");
        });

    </script>
@elseif(session('error'))
    <script>
        window.addEventListener("load", function() {
            swal("Failed!", "{{ session('error') }}", "error");
        });

    </script>
@endif
{{-- <script src="{{ asset('admin_assets/alert/jquery-3.4.1.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('admin_assets/alert/sweetalert.min.js') }}" type="text/javascript"></script>
