

    </div>

    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Popper-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--Bootstrap-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!--Sweet Alerts 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- AdminLTE 3 -->
    <script type="text/javascript" src="<?= base_url() ?>resources/plugins/adminlte/js/adminlte.min.js"></script>

    <!-- Font Awesome 5.13.1 -->
    <script src="<?= base_url( ) ?>resources/plugins/fontawesome/js/all.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- QR -->
    <script src="<?= base_url( ) ?>resources/plugins/qr/qr_packed.js"></script>

    <!-- Leer QR -->
    <script type="text/javascript">

      function scanQR( node )
      {
        let reader = new FileReader();

        reader.onload = function()
        {
          node.value = "";
          qrcode.callback = function(res)
          {
            if ( !( res instanceof Error ) )
            {
              //validamos el QR pertenezca a un pedido
              console.log( res );
            }
            else
            {
              imprimir( '¡Ups!', 'No se detectó el código QR. Intente de nuevo', 'error' );
            }
          };
          qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);
      }

    </script>

    <!-- own -->
    <script type="text/javascript" src="<?= base_url() ?>resources/admin/js/<?= $js ?>.js"></script>

  </body>
</html>
