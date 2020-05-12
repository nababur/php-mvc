<div class="well card-footer">
  <p>Webiste: <a target="_blank" href="https://codeceil.com/">https://codeceil.com/</a>
      <span class="float-right">Like us: <a target="_blank" href="https://www.facebook.com/Codeceil/">https://www.facebook.com/Codeceil/</a> </span>
  </p>
</div>




  </body>




  <!-- Jquery script -->
  <script src="<?php echo BASE_URL; ?>/assets/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/bootstrap.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/jquery.dataTables.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $("#flash-msg").delay(7000).fadeOut("slow");
      });
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
</html>
