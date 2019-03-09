<!-- footer content -->
<script>
    var url='{{URL::to('/')}}';
    var token='{{csrf_token()}}'

</script>
<footer>
    <div class="copyright-info">
        <p class="pull-right">Licensed by  <a href="grafiastech.com">grafiastech.com</a>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
<!-- /page content -->

</div>



<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<!-- jQuery -->
<script src="{{URL::to('/backend/css/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::to('/backend/css/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::to('/backend/css/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::to('/backend/css/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{URL::to('/backend/css/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{URL::to('/backend/css/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{URL::to('/backend/css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::to('/backend/css/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{URL::to('/backend/css/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{URL::to('/backend/css/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{URL::to('/backend/css/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{URL::to('/backend/css/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{URL::to('/backend/css/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{URL::to('/backend/css/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{URL::to('/backend/css/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::to('/backend/css/build/js/custom.min.js')}}"></script>

<!-- bootstrap-daterangepicker -->
<!-- bootstrap-wysiwyg -->
<script src="{{URL::to('backend/css/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{URL::to('backend/css/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{URL::to('backend/css/vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- jQuery Tags Input -->
<script src="{{URL::to('backend/css/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<!-- Switchery -->
<script src="{{URL::to('backend/css/vendors/switchery/dist/switchery.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL::to('backend/css/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Parsley -->
<script src="{{URL::to('backend/css/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<!-- Autosize -->
<script src="{{URL::to('backend/css/vendors/autosize/dist/autosize.min.js')}}"></script>
<!-- jQuery autocomplete -->
<script src="{{URL::to('backend/css/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
<!-- starrr -->
<script src="{{URL::to('backend/css/vendors/starrr/dist/starrr.js')}}"></script>
<!-- Custom Theme Scripts -->
<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-23581568-13', 'auto');
    ga('send', 'pageview');

</script>

{{--<script src="{{URL::to('backend/js/bootstrap.min.js')}}"></script>

<!-- gauge js -->
<script type="text/javascript" src="{{URL::to('backend/js/gauge/gauge.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/gauge/gauge_demo.js')}}"></script>
<!-- bootstrap progress js -->
<script src="{{URL::to('backend/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{URL::to('backend/js/nicescroll/jquery.nicescroll.min.js')}}"></script>
<!-- icheck -->
<script src="{{URL::to('backend/js/icheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{URL::to('backend/js/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/datepicker/daterangepicker.js')}}"></script>
<!-- chart js -->
<script src="{{URL::to('backend/js/chartjs/chart.min.js')}}"></script>

<script src="{{URL::to('backend/js/custom.js')}}"></script>

<!-- flot js -->
<!--[if lte IE 8]><script type="text/javascript" src="{{URL::to('backend/js/excanvas.min.js')}}"></script><![endif]-->
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/date.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{URL::to('backend/js/flot/jquery.flot.resize.js')}}"></script>--}}

</body>
</html>