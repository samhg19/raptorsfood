
        <div class="content-wrapper">
          <div class="content">
            <div class="container-fluid">


              <div class="container-fluid mb-2"> <br> </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="card">
                    <div class="card-header text-center">
                      <b>Mis productos</b>
                    </div>
                    <div class="card-body text-center">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <div id="table-productos">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header text-center">
                      <b>Alta nuevo producto</b>
                    </div>
                    <div class="card-body">
                      <form class="new-product text-center">
                        <div class="form-group">
                          <span>Nombre</span>
                          <input type="text" class="form-control mt-1" id="name">
                        </div>
                        <div class="form-group">
                          <span>Descripción</span>
                          <input type="text" class="form-control mt-1" id="desc">
                        </div>
                        <div class="form-group">
                          <span>Precio</span>
                          <input type="number" class="form-control mt-1" id="precio">
                        </div>
                        <div class="form-group">
                          <span>Categoria</span>
                          <select class="form-control" id="categoria">
                            <option value="1">Bebidas</option>
                            <option value="2">Comida</option>
                            <option value="3">Dulces</option>
                            <option value="4">Frituras</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block">
                            Crear
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header text-center">
                      <b>Cambiar existencia</b>
                    </div>
                    <div class="card-body">
                      <form class="update-product text-center">
                        <div class="form-group">
                          <span>Producto</span>
                          <select class="form-control" id="select-product">
                          </select>
                        </div>
                        <div class="form-group">
                          <span>Status</span>
                          <select class="form-control" id="status">
                            <option value="0">Agotado</option>
                            <option value="1">En existencia</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block">
                            Actualizar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
