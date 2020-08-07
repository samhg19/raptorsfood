
            <div class="menu animate__animated">

              <div class="card">
                <div class="row">
                  <div class="col-6">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Mi carrito</li>
                    </ul>
                  </div>
                  <div class="col-6 text-right">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <a href="#" class="cart-button">
                          <i class="fas fa-shopping-cart"></i>
                          <span class="cart-items">0</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="menu-start">

                <div class="options">
                  <div class="row">
                    <div class="col-1"></div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-wine-bottle"></i>
                          <p>Bebidas</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-drumstick-bite"></i>
                          <p>Comida</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-1"></div>
                  </div>

                  <div class="row">
                    <div class="col-1"></div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-candy-cane"></i>
                          <p>Dulces</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-cookie-bite"></i>
                          <p>Frituras</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-1"></div>
                  </div>

                  <div class="row">
                    <div class="col-1"></div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-apple-alt"></i>
                          <p>P. Sanos</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="card option">
                        <div class="card-body">
                          <i class="fas fa-3x fa-utensils"></i>
                          <p>Menú del dia</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-1"></div>
                  </div>
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
                        <a href="#">
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
                        <a href="#">
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

            </div>
