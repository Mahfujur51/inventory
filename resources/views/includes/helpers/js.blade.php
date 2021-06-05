
< <script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('backend/')}}/js/jquery.min.js"></script>
<script src="{{asset('backend/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('backend/')}}/js/waves.js"></script>
<script src="{{asset('backend/')}}/js/wow.min.js"></script>
<script src="{{asset('backend/')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('backend/')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('backend/')}}/assets/chat/moment-2.2.1.js"></script>
<script src="{{asset('backend/')}}/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{asset('backend/')}}/assets/jquery-detectmobile/detect.js"></script>
<script src="{{asset('backend/')}}/assets/fastclick/fastclick.js"></script>
<script src="{{asset('backend/')}}/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="{{asset('backend/')}}/assets/jquery-blockui/jquery.blockUI.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>

<!-- flot Chart -->
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.time.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.resize.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.pie.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.selection.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.stack.js"></script>
<script src="{{asset('backend/')}}/assets/flot-chart/jquery.flot.crosshair.js"></script>

<!-- Counter-up -->
<script src="{{asset('backend/')}}/assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="{{asset('backend/')}}/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('backend/')}}/js/jquery.app.js"></script>

<!-- Dashboard -->
<script src="{{asset('backend/')}}/js/jquery.dashboard.js"></script>

<!-- Chat -->
<script src="{{asset('backend/')}}/js/jquery.chat.js"></script>

<!-- Todo -->
<script src="{{asset('backend/')}}/js/jquery.todo.js"></script>
<script src="{{asset('backend/')}}/assets/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backend/')}}/assets/datatables/dataTables.bootstrap.js"></script>
<script src="{{asset('backend/')}}/js/printThis.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script>

    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are You Sure Want to Delete?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else{
                    swal("Safe Data!");
                }

            });
    });

    // $(document).on("click", "#accept", function(e){
    //     e.preventDefault();
    //     var link = $(this).attr("href");
    //     swal({
    //         title: "Are You Sure Want to Accept?",
    //         text: "If you Accept this, it can't be Deleted.",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 window.location.href = link;
    //             }
    //
    //         });
    // });

</script>
@yield('custom_script')

