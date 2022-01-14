<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021 Rapide Reparation. Tous droits réservés.</span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src={{asset("vendors/js/vendor.bundle.base.js")}}></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src={{asset("vendors/chart.js/Chart.min.js")}}></script>
<script src={{asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")}}></script>
<script src={{asset("vendors/progressbar.js/progressbar.min.js")}}></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src={{asset("js/off-canvas.js")}}></script>
<script src={{asset("js/hoverable-collapse.js")}}></script>
<script src={{asset("js/template.js")}}></script>
<script src={{asset("js/settings.js")}}></script>
<script src={{asset("js/todolist.js")}}></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src={{asset("js/jquery.cookie.js")}} type="text/javascript"></script>
<script src={{asset("js/Chart.roundedBarCharts.js")}}></script>
@stack('scripts')
<!-- End custom js for this page-->
</body>

</html>