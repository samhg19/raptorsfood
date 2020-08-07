<div class="container">
	<div class="register-box">
		<form id="register-form">
			<input type="hidden" value="<?= base_url( ) ?>" id="url">
			<div class="row">
				<div class="col-sm-6 form-group">
					<label class="text-right">Matricula:</label>
					<div>
						<input type="text" class="form-control" placeholder="Tu matricula" name="matricula" id="matricula">
					</div>
				</div>
				<div class="col-sm-6 form-group">
					<label class="text-right">Nombre completo:</label>
					<div>
						<input type="text" class="form-control" placeholder="Tu nombre" name="password" id="name">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 form-group">
					<label class="text-right">Correo:</label>
					<div>
						<input type="email" class="form-control" placeholder="example@mail.com" name="matricula" id="email">
					</div>
				</div>
				<div class="col-sm-6 form-group">
					<label class="text-right">Carrera:</label>
					<div>
						<select class="custom-select" id="carrera">
							<option value="1">Carrera 1</option>
							<option value="2">Carrera 3</option>
							<option value="3">Carrera 3</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 form-group">
					<label class="text-right">Contraseña:</label>
					<div>
						<input type="password" class="form-control" placeholder="Passowrd dificil de adivinar" name="matricula" id="password">
					</div>
				</div>
				<div class="col-sm-6 form-group">
					<label class="text-right">Repite tu contraseña:</label>
					<div>
						<input type="password" class="form-control" placeholder="Passowrd dificil de adivinar" name="password" id="rPassword">
					</div>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<input class="btn btn-success btn-block" type="submit" value="¡Registrame!">
				</div>
				<div class="col-sm-2"></div>
			</div>
		</form>
	</div>
</div>
