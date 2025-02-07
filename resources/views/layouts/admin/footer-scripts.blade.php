<!-- jquery -->
<script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/Admin/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';

</script>

<!-- chart -->
<script src="{{ URL::asset('assets/Admin/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/Admin/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/Admin/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/Admin/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/Admin/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/Admin/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/Admin/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/Admin/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/Admin/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/Admin/js/custom.js') }}"></script>

<script src="{{ URL::asset('assets/Admin/plugins/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
<script>
    swal("{{ session('status') }}");
</script>
@endif

<script>
    // Copy written
    $(document).ready(function () {

        // Title  =>  Meta title.
        $("#name").on("input", function () {
            $("#name").val(this.value);
        });
        // Title => slug
        $("#name").keyup(function () {
            var Text = $(this).val();
            var slug = getSlug(Text);
            $("#slug").val(slug);
        });
    });
</script>


