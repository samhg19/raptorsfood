
      <div class="modal fade" id="scanqrModal" tabindex="-1" aria-labelledby="scanqrModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="scanqrModalLabel">Entregar pedido</h5>
            </div>
            <div class="modal-body">
              <div class="row part-1">
                <div class="col-5 col-md-5 col-sm-5 options-container">
                  <label class="code-container">
                    <i class="fas fa-5x fa-qrcode"></i>
                    <input type=file
                          accept="image/*"
                          capture=environment
                          onChange="scanQR(this)"
                          tabindex=-1/>
                  </label>
                  <br>
                  Código QR
                </div>
                <div class="col-1 col-md-1 col-sm-1">
                  ó
                </div>
                <div class="col-6 col-md-6 col-sm-6">
                  <div class="form-group text-center">
                    <label>Ingresa el código</label>
                    <input type="text" class="form-control" id="pedidoTextInput" placeholder="Ejemplo. 152">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-2" onclick="search( )">Buscar</button>
                  </div>
                </div>
              </div>
              <div class="part-2 d-none">
                <div class="row">
                  <div class="col-12 text-center">
                    <h6>¡Pedido encontrado!</h6>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12 text-center">
                    <h3>El numero del pedido es <b># <span id="idPedido-modal"></span></b></h3>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-12 text-center">
                    <h5>Entrega el pedido a <span id="usuario-modal"></span></h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btn-sm btn-block" onclick="closeModal( )">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
