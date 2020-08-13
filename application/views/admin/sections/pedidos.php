
        <div class="content-wrapper">
          <div class="content">
            <div class="container-fluid">

              <div class="container-fluid mb-1"> <br> </div>

              <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                  <div class="card">
                    <div class="card-header text-center">
                      <b>Mis pedidos actuales</b>
                    </div>
                    <div class="card-body text-center">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <div id="table-pedidos">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="pedido-details" tabindex="-1" aria-labelledby="pedido-detailsLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="pedido-detailsLabel">Detalles del pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">Código del pedido</th>
                        <td><span id="modal-codigo-pedido"></span></td>
                      </tr>
                      <tr>
                        <th scope="row">Dueño</th>
                        <td><span id="modal-nombre-usuario"></span></td>
                      </tr>
                      <tr>
                        <th scope="row">Status</th>
                        <td><span id="modal-status-pedido"></span></td>
                      </tr>
                      <tr>
                        <th scope="row">Total</th>
                        <td>$<span id="modal-total-pedido"></span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <p class="text-center">
                  <b>Productos</b>
                </p>

                <div class="table-responsive">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                      </tr>
                    </thead>
                    <tbody id="modal-productos-pedido">

                    </tbody>
                  </table>
                </div>

              </div>
              <div class="modal-footer">
                <div id="buttons-pedido">
                  
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
