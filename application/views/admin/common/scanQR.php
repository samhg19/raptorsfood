
      <div class="modal fade" id="scanqrModal" tabindex="-1" aria-labelledby="scanqrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="scanqrModalLabel">Entregar pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
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
                  <form class="text-center">
                    <div class="form-group">
                      <label>Ingresa el código</label>
                      <input type="text" class="form-control" id="pedidoTextInput" placeholder="Ejemplo. PR00001">
                    </div>
                  </form>
                </div>
              </div>
              <div class="row part-2 d-none">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btn-sm btn-block" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
