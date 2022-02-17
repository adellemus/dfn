<?php if (session::get('autenticado')): ?>
<!-- footer content-->
  </main>
    <footer class="py-4 bg-light mt-auto" style="margin-left: 0;">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">Copyright &copy; MAL C.A.</div>
          <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div> 
              <?php endif; ?> 
    <!-- Archivo config de js -->
    <script src="<?php echo BASE_URL; ?>public/js/config.js"></script>
    <script src="<?php echo BASE_URL; ?>layout/basic/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo BASE_URL; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_URL; ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo BASE_URL; ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo BASE_URL; ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo BASE_URL; ?>vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo BASE_URL; ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo BASE_URL; ?>vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo BASE_URL; ?>vendors/skycons/skycons.js"></script>
    <!-- Alertify -->
    <script src="<?php echo BASE_URL; ?>public/js/alertify.min.js" type="text/javascript"></script>
    <!-- Flot -->
    <script src="<?php echo BASE_URL; ?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo BASE_URL; ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo BASE_URL; ?>vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo BASE_URL; ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo BASE_URL; ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- PNotify -->
    <script src="<?php echo BASE_URL; ?>vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo BASE_URL; ?>vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Validate Scripts -->
    <script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>public/js/jquery.validationEngine-es.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/jquery.redirect/jquery.redirect.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo BASE_URL; ?>build/js/custom.min.js"></script>
  <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
    <?php endfor; ?>
<?php endif; ?>
<script>
   $(document).ready(function (){
           $('.ui-pnotify').remove();
   });
</script>
  </body>
</html>
  <!-- Template Main Javascript File -->
