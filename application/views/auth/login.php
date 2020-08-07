    <div class="container">
      <div class="login-box">
        <form id="login-form">
          <input type="hidden" value="<?= base_url( ) ?>" id="url">
          <div class="form-group">
            <div class="col row">
              <label class="col-md-4 text-right">Matricula:</label>
              <div class="col-md-8">
                <input type="text" class="form-control" placeholder="" name="matricula" id="matricula">
      				</div>
      			</div>
      		 </div>
      		 <div class="form-group">
      		 	<div class="col row">
      		    <label class="col-md-4 text-right">Password:</label>
              <div class="col-md-8">
        			  <input type="password" class="form-control" placeholder="" name="password" id="password">
        		  </div>
      			</div>
      			<div class="row mt-2">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <input class="btn btn-success btn-block" type="submit" value="Enviar">
              </div>
              <div class="col-sm-4"></div>
            </div>
          </div>
    	  </form>
      </div>
    </div>
