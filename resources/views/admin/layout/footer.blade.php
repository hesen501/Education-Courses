            <!-- footer -->
            <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('adminn/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('adminn/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminn/js/app-style-switcher.js')}}"></script>
<script src="{{asset('adminn/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('adminn/js/waves.js')}}"></script>
<!--Menu sidebar -->
<!--Custom JavaScript -->
<script src="{{asset('adminn/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('adminn/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('adminn/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('adminn/js/pages/dashboards/dashboard1.js')}}"></script>
<script>
    var elems = document.getElementsByClassName('confirmationDelete');
    var confirmIt = function (e) {
        if (!confirm('Silməyə əminsiz?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
@stack('js')
</body>

</html>