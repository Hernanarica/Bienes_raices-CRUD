<main class="contenedor sección">
	<h1>Crear</h1>
	<a href="index.php?s=panel" class="boton boton-verde">Volver</a>

	<form action="" class="formulario">
		<fieldset>
			<legend>Información general</legend>
			<label for="titulo">Titulo</label>
			<input type="text" id="titulo" placeholder="Titulo propiedad">
			<label for="precio">Precio</label>
			<input type="number" id="precio" placeholder="Precio propiedad">
			<label for="imagen">Imagen</label>
			<input type="file" id="imagen" accept="image/jpeg, imager/png">
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion"></textarea>
		</fieldset>
		<fieldset>
			<legend>Información propiedad</legend>
			<label for="habitaciones">Habitaciones</label>
			<input type="number" id="habitaciones" placeholder="habitaciones propiedad" min="1" max="9" step="1">
			<label for="baños">Baños</label>
			<input type="number" id="baños" placeholder="baños propiedad">
			<label for="estacionamiento">Estacionamiento</label>
			<input type="number" id="estacionamiento" placeholder="estacionamiento propiedad">
		</fieldset>
		<fieldset>
			<legend>Vendedor</legend>
			<select>
				<option value="1">Juan</option>
				<option value="2">Karen</option>
			</select>
		</fieldset>
		<input type="submit" value="Crear propiedad" class="boton boton-verde">
	</form>
</main>