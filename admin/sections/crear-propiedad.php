<?php

require_once '../dataBase/database.php';
// Guardamos nuestra conexión en una variable
$db = connectionDB();

// Mensajes de errores
$errores = [];

// Traemos a nuestros vendedores de la base de datos
$queryVendedores = "SELECT * FROM vendedores";
$resVendedores   = mysqli_query($db, $queryVendedores);
$vendedores      = [];

// Recorremos nuestro objeto mysqli convertido en array para almacenar los valores de mi tabla
while ($vendedor = mysqli_fetch_assoc($resVendedores)) {
   $vendedores[] = $vendedor;
}

// Evaluamos si viene data por post
$vendedorId = null;
if ($_SERVER[ 'REQUEST_METHOD' ] === 'POST') {
   // Guardamos la data de POST en variables
   $titulo          = $_POST[ 'titulo' ];
   $precio          = $_POST[ 'precio' ];
   $descripcion     = $_POST[ 'descripcion' ];
   $habitaciones    = $_POST[ 'habitaciones' ];
   $wc              = $_POST[ 'wc' ];
   $estacionamiento = $_POST[ 'estacionamiento' ];
   $vendedorId      = $_POST[ 'vendedor' ];
   $creado          = date('Y/m/d');

   // Validamos esa data que viene de POST
   if (!$titulo) {
      $errores[ 'titulo' ] = 'Debes agregar un titulo';
   }
   if (!$precio) {
      $errores[ 'precio' ] = 'Debes agregar un precio';
   }
   if (!$descripcion) {
      $errores[ 'descripcion' ] = 'Debes agregar una descripción';
   }
   if (!$habitaciones) {
      $errores[ 'habitaciones' ] = 'Debes agregar al menos 1 habitación';
   }
   if (!$wc) {
      $errores[ 'wc' ] = 'Debes agregar al menos 1 baño';
   }
   if (!$estacionamiento) {
      $errores[ 'estacionamiento' ] = 'Debes agregar al menos 1 estacionamiento';
   }
   if (!$vendedorId) {
      $errores[ 'vendedor' ] = 'Debes elegir 1 vendedor';
   }

   // Si hay errores realizo y ejecuto la instrucción SQL.
   if (empty($errores)) {
      $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, fecha_creacion, fk_id_vendedores)
             	 values('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado' , '$vendedorId')";

      $res = mysqli_query($db, $query);

      // Redireccionamos si la instrucción SQL fue correcta
      if ($res) {
         header('location: index.php');
      }
   }
}
?>
<main class="contenedor sección">
	<h1>Crear</h1>
	<a href="index.php?s=panel" class="boton boton-verde">Volver</a>

	<form action="index.php?s=crear-propiedad" method="post" class="formulario">
		<fieldset>
			<legend>Información general</legend>
			<label for="titulo">Titulo</label>
			<input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo empty($_POST[ 'titulo' ]) ? '' : $_POST[ 'titulo' ]; ?>">
         <?php if (isset($errores[ 'titulo' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'titulo' ]; ?>
				</div>
         <?php endif; ?>
			<label for="precio">Precio</label>
			<input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo empty($_POST[ 'precio' ]) ? '' : $_POST[ 'precio' ]; ?>">
         <?php if (isset($errores[ 'precio' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'precio' ]; ?>
				</div>
         <?php endif; ?>
			<label for="imagen">Imagen</label>
			<input type="file" id="imagen" name="imagen" accept="image/jpeg, imager/png">
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion"><?php echo empty($_POST[ 'descripcion' ]) ? '' : $_POST[ 'descripcion' ]; ?></textarea>
         <?php if (isset($errores[ 'descripcion' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'descripcion' ]; ?>
				</div>
         <?php endif; ?>
		</fieldset>
		<fieldset>
			<legend>Información propiedad</legend>
			<label for="habitaciones">Habitaciones</label>
			<input type="number" id="habitaciones" name="habitaciones" placeholder="habitaciones propiedad" min="1" max="9" step="1"
			       value="<?php echo empty($_POST[ 'habitaciones' ]) ? '' : $_POST[ 'habitaciones' ]; ?>">
         <?php if (isset($errores[ 'habitaciones' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'habitaciones' ]; ?>
				</div>
         <?php endif; ?>
			<label for="wc">Baños</label>
			<input type="number" id="wc" name="wc" placeholder="baños propiedad" value="<?php echo empty($_POST[ 'wc' ]) ? '' : $_POST[ 'wc' ]; ?>">
         <?php if (isset($errores[ 'wc' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'wc' ]; ?>
				</div>
         <?php endif; ?>
			<label for="estacionamiento">Estacionamiento</label>
			<input type="number" id="estacionamiento" name="estacionamiento" placeholder="estacionamiento propiedad"
			       value="<?php echo empty($_POST[ 'estacionamiento' ]) ? '' : $_POST[ 'estacionamiento' ]; ?>">
         <?php if (isset($errores[ 'estacionamiento' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'estacionamiento' ]; ?>
				</div>
         <?php endif; ?>
		</fieldset>
		<fieldset>
			<legend>Vendedor</legend>
			<select name="vendedor">
				<option value="">--Seleccione--</option>
            <?php foreach ($vendedores as $vendedor): ?>
					<option <?php echo $vendedorId === $vendedor[ 'id_vendedores' ] ? 'selected' : ''; ?> value="<?php echo $vendedor[ 'id_vendedores' ] ?>">
                  <?php echo $vendedor[ 'nombre' ]; ?>
					</option>
            <?php endforeach; ?>
			</select>
         <?php if (isset($errores[ 'vendedor' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'vendedor' ]; ?>
				</div>
         <?php endif; ?>
		</fieldset>
		<input type="submit" value="Crear propiedad" class="boton boton-verde">
	</form>
</main>