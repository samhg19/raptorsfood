
            <div class="menu d-none animate__animated">

              <div class="container-fluid mb-2"> <br> </div>

              <div class="menu-float-carrito card">
                <div class="row">
                  <div class="col-6">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Mi carrito</li>
                    </ul>
                  </div>
                  <div class="col-6 text-right">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <a href="#" id="carrito" class="cart-button">
                          <i class="fas fa-shopping-cart"></i>
                          <span class="cart-items" id="carrito-count">0</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="menu-start">

                <div class="options">
                  <?php

                    $isRow = true;

                    foreach ($categorias as $categoria)
                    {
                      if ( $isRow )
                      {
                        $isRow = false;
                    ?>
                    <div class="row">
                      <div class="col-1"></div>
                      <div class="col-5">
                        <div class="card option" onclick="setCategory(<?= $categoria->id ?>)">
                          <div class="card-body">
                            <i class="fas fa-3x <?= $categoria->icon ?>"></i>
                            <p><?= $categoria->nombre ?></p>
                          </div>
                        </div>
                      </div>
                    <?php
                      }
                      else
                      {
                        $isRow = true;
                    ?>
                      <div class="col-5">
                        <div class="card option" onclick="setCategory(<?= $categoria->id ?>)">
                          <div class="card-body">
                            <i class="fas fa-3x <?= $categoria->icon ?>"></i>
                            <p><?= $categoria->nombre ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-1"></div>
                    </div>
                    <?php
                      }
                    }
                  ?>
                </div>

                <div class="card text-white bg-danger mb-3">
                  <div class="card-header">Avisos</div>
                  <div class="card-body">
                    <p class="card-text">-> No hay servicio por COVID-19</p>
                  </div>
                </div>
              </div>

              <div class="menu-items d-none">
                <div class="card">
                  <div class="card-header text-center bg-light">
                    <div class="row">
                      <div class="col-1">
                        <a href="#" class="menu-back">
                          <i class="fas fa-arrow-left"></i>
                        </a>
                      </div>
                      <div class="col-10">
                        <span id="pedido-categoria"> - </span>
                      </div>
                    </div>
                  </div>
                  <div id="pedido-productos">

                  </div>
                </div>
              </div>

              <div class="menu-carrito d-none">
                <div class="container-fluid"> <br> </div>

                <div class="card">
                  <div class="card-header text-center bg-light">
                    <div class="row">
                      <div class="col-1">
                        <a href="#" class="menu-back">
                          <i class="fas fa-arrow-left"></i>
                        </a>
                      </div>
                      <div class="col-10">
                        Mi carrito
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">total</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody id="carrito-products-body">

                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2">Total</td>
                            <td><span id="carrito-products-total">$---.--</span></td>
                            <td></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <button type="button" id="do-pedido" class="btn btn-success btn-block"> Realizar pedido </button>
                </div>

              </div>

              <div class="menu-pedido d-none">
                <div class="container-fluid"> <br> </div>

                <div class="card mt-2">
                  <div class="card-header text-center">
                    <h5>¡Pedido realizado!</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-1"></div>
                      <div class="col-10">
                        <div class="qr-image">
                          <img src="" alt="QR pedido" id="qr-pedido-image" class="img-fluid mb-3">
                        </div>
                      </div>
                      <div class="col-1"></div>
                    </div>
                    <p class="card-text text-center">Utiliza este código QR para recoger tu pedido</p>
                    <p class="card-text text-center">ó</p>
                    <p class="card-text text-center">utiliza el siguiente código</p>
                    <p class="card-text text-center"><span><b id="id-pedido"></b></span></p>
                  </div>
                  <div class="card-body text-center">
                    <a href="#" id="cerrar-compra" class="card-link">Cerrar</a>
                  </div>
                </div>

                <div class="container-fluid"> <br> </div>
              </div>

              <div class="modal fade" id="pedidoModal" tabindex="-1" role="dialog" aria-labelledby="pedidoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="pedidoModalLabel">¿Cuantas unidades?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="number" class="form-control" id="countPedido" value="1">
                        <small id="countPedidoHelp" class="form-text text-muted">Selecciona correctamente la cantidad que deseas comprar</small>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-success btn-sm" id="make-Pedido">Comprar</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
