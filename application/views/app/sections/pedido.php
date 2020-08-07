
            <div class="menu animate__animated">

              <div class="card d-none">
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
                          <span class="cart-items">0</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="menu-start d-none">

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
                        <div class="card option" onclick="setCategorie(<?= $categoria->id ?>)">
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
                        <div class="card option" onclick="setCategorie(<?= $categoria->id ?>)">
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
                    <p class="card-text">-> Es un demo, ¿Que esperabas?</p>
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
                        Categoria seleccionada
                      </div>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-6">
                          <span>Producto 1</span>
                        </div>
                        <div class="col-2">
                          <b>$--.--</b>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                          <button type="button" id="item_<?= 1 ?>" class="btn btn-success btn-sm">
                            Comprar
                          </button>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-6">
                          <span>Producto 2</span>
                        </div>
                        <div class="col-2">
                          <b>$--.--</b>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                          <button type="button" id="item_<?= 2 ?>" class="btn btn-success btn-sm">
                            Comprar
                          </button>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-6">
                          <span>Producto 3</span>
                        </div>
                        <div class="col-2">
                          <b>$--.--</b>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                          <button type="button" id="item_<?= 3 ?>" class="btn btn-success btn-sm">
                            Comprar
                          </button>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-6">
                          <span>Producto 4</span>
                        </div>
                        <div class="col-2">
                          <b>$--.--</b>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                          <button type="button" id="item_<?= 4 ?>" class="btn btn-success btn-sm">
                            Comprar
                          </button>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="menu-carrito d-none">

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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Producto 1</td>
                            <td class="text-center">1</td>
                            <td>$--.--</td>
                          </tr>
                          <tr>
                            <td>Producto 2</td>
                            <td class="text-center">3</td>
                            <td>$--.--</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2">Total</td>
                            <td>$---.--</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>

              </div>

              <div class="menu-pedido">
                <div class="container-fluid"> <br> </div>

                <div class="card mt-2">
                  <div class="card-header text-center">
                    <h5>¡Pedido realizado!</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                  <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>

              </div>

            </div>
