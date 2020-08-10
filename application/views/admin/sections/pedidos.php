
        <div class="content-wrapper">
          <div class="content">
            <div class="container-fluid">

              <div class="container-fluid mb-1"> <br> </div>

              <div class="row">
                <div class="card w-100 ">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Ultimos pedidos</h3>

                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 text-center">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Fecha - Hora</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="#">OR9842</a></td>
                            <td><span class="badge badge-success">Recogido</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR1848</a></td>
                            <td><span class="badge badge-dark">Hecho</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR7429</a></td>
                            <td><span class="badge badge-danger">Pendiente</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR7429</a></td>
                            <td><span class="badge badge-info">Realizando</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR1848</a></td>
                            <td><span class="badge badge-dark">Hecho</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR7429</a></td>
                            <td><span class="badge badge-danger">Pendiente</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR9842</a></td>
                            <td><span class="badge badge-success">Recogido</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="#">OR9842</a></td>
                            <td><span class="badge badge-success">Recogido</span></td>
                            <td>
                              <span> --/--/---- --:-- -:- </span>
                            </td>
                            <td>
                              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pedido-details">
                                Ver detalles
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
                        <td>OR9842</td>
                      </tr>
                      <tr>
                        <th scope="row">Dueño</th>
                        <td>Nombre de la persona</td>
                      </tr>
                      <tr>
                        <th scope="row">Status</th>
                        <td>status</td>
                      </tr>
                      <tr>
                        <th scope="row">Total</th>
                        <td>$---.--</td>
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
                    <tbody>
                      <tr>
                        <td>Producto 1</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td>Producto 2</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <td>Producto 3</td>
                        <td>5</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info">Abrir chat</button>
                <button type="button" class="btn btn-success">Realizar</button>
                <button type="button" class="btn btn-dark">Hecho</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
