  <footer class="footer pt-1 mt-1">
    <div class="text-center">
      <p class="text-dark my-4 text-sm font-weight-normal">
        All rights reserved. Copyright © <script>
          document.write(new Date().getFullYear())
        </script> Created by <a href="">Tim Pendaftaran</a>.
      </p>
    </div>
  </footer>


  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>




  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="<?php echo base_url() ?>/assets/js/plugins/countup.min.js"></script>





  <script src="<?php echo base_url() ?>/assets/js/plugins/choices.min.js"></script>



  <script src="<?php echo base_url() ?>/assets/js/plugins/prism.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/plugins/highlight.min.js"></script>



  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="<?php echo base_url() ?>//assets/js/plugins/rellax.min.js"></script>
  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="<?php echo base_url() ?>//assets/js/plugins/tilt.min.js"></script>
  <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
  <script src="<?php echo base_url() ?>//assets/js/plugins/choices.min.js"></script>


  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="<?php echo base_url() ?>//assets/js/plugins/parallax.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="<?php echo base_url() ?>//assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>


  <script type="text/javascript">
    if (document.getElementById('state1')) {
      const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('state2')) {
      const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
      if (!countUp1.error) {
        countUp1.start();
      } else {
        console.error(countUp1.error);
      }
    }
    if (document.getElementById('state3')) {
      const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
      if (!countUp2.error) {
        countUp2.start();
      } else {
        console.error(countUp2.error);
      };
    }
    if (document.getElementById('state4')) {
      const countUp2 = new CountUp('state4', document.getElementById("state4").getAttribute("countTo"));
      if (!countUp2.error) {
        countUp2.start();
      } else {
        console.error(countUp2.error);
      };
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
        dom: 'Blfrtip',
        scrollX: true,
        stateSave: true,
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#dataTable1').DataTable({
        scrollX: true,
        stateSave: true,
      });
    });
  </script>



  <script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
      $("#check-all").click(function() { // Ketika user men-cek checkbox all
        if ($(this).is(":checked")) // Jika checkbox all diceklis
          $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
        else // Jika checkbox all tidak diceklis
          $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
      });
    });
  </script>

























  </body>

  </html>