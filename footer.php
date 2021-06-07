<footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <small>Copyright &copy; Tushar Bodarya 2021</small>
    </div>
  </div>
</footer>
<script type="text/javascript">
  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });

// make it as accordion for smaller screens
if ($(window).width() < 992) {
  $('.dropdown-menu a').click(function(e){
    e.preventDefault();
    if($(this).next('.submenu').length){
      $(this).next('.submenu').toggle();
    }
    $('.dropdown').on('hide.bs.dropdown', function () {
     $(this).find('.submenu').hide();
   })
  });
}
</script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>
<script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/vendor/sparkline/jquery.sparkline.js"></script>
<script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="assets/vendor/jquery-steps/jquery.stepy.js"></script>
<script src="assets/vendor/icheck/skins/icheck.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/select2/js/select2.min.js"></script>
<script src="assets/vendor/js-init/init-select2.js"></script>
<script src="assets/vendor/js-init/sparkline/init-sparkline.js"></script>
<script src="assets/vendor/js-init/init-form-wizard.js"></script>
<script src="assets/vendor/flot/jquery.flot.min.js"></script>
<script src="assets/vendor/flot/jquery.flot.pie.min.js"></script>
<script src="assets/vendor/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets/vendor/js-init/flot/init-flot-widget.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/vendor/vector-map/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendor/js-init/vmap/init-vmap-world.js"></script>
<script src="assets/vendor/js-init/init-datatable.js"></script>
<script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="assets/vendor/js-init/chartjs/init-creative-state-chart.js"></script>
<script src="assets/vendor/js-init/chartjs/init-doughnut-chart.js"></script>
<script src="assets/vendor/js-init/chartjs/init-doughnut-chart2.js"></script>
<script src="assets/vendor/js-init/chartjs/init-sales-overview-chart.js"></script>
<script src="assets/vendor/vector-map/jquery-jvectormap-us-aea.js"></script>
<script src="assets/vendor/js-init/vmap/init-vmap-usa.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.responsive.min.js"></script>
<script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
<script src="assets/vendor/datatables/jszip.min.js"></script>
<script src="assets/vendor/datatables/pdfmake.min.js"></script>
<script src="assets/vendor/datatables/vfs_fonts.js"></script>
<script src="assets/vendor/datatables/buttons.html5.min.js"></script>
<script src="assets/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/vendor/js-init/pickers/init-date-picker.js"></script>
<script src="assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js"></script>
<script src="assets/vendor/timepicker/js/bootstrap-timepicker.js"></script>
</body>
</html>
