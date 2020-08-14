
            <div class="historial d-none animate__animated">
              <div class="container-fluid mb-2"> <br> </div>

              <div class="card">
                <div class="card-header text-center bg-light">
                  Mis pedidos
                </div>
              </div>

              <div id="history-pedidos">

              </div>

              <div class="modal fade" id="pedidoDetails" tabindex="-1" aria-labelledby="pedidoDetailsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="pedidoDetailsLabel">Detalles del pedido</h5>
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

                      <div id="qr-image-modal">
                        <div class="row">
                          <div class="col-12">
                            <p class="text-center">
                              <b>Codigo QR</b>
                            </p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <p class="text-center">
                              <img src="" alt="Codigo QR del pedido" class="img-fluid" id="qr-image">
                            </p>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="container-fluid mt-5"> <br> </div>

            </div>
