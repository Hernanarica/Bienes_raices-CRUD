<?php
require_once 'dataBase/database.php';
$db = connectionDB();

// Nos aseguramos que sea un Número
$id = filter_var($_GET[ 'id' ], FILTER_VALIDATE_INT);

// Validamos el id sea un número
if (!$id) {
   header('location: index.php?s=panel');
}

// Traemos la propiedad según el Id que recibimos
$queryPropiedades = "SELECT * FROM propiedades WHERE id_propiedades = '$id'";
$resPropiedades   = mysqli_query($db, $queryPropiedades);
$propiedad        = mysqli_fetch_assoc($resPropiedades);

// Validamos el registro existe en la bases de datos.
// Accedemos a el como objeto ya que e sun mysqliObject
if (!$resPropiedades->num_rows) {
   header('location: index.php?s=anuncios');
}
?>
	<main class="contenedor seccion contenido-centrado">
		<h1><?php echo $propiedad[ 'titulo' ]; ?></h1>
		<img loading="lazy" src="test-images/<?php echo $propiedad[ 'imagen' ]; ?>" alt="imagen de la propiedad">
		<div class="resumen-propiedad">
			<p class="precio">$<?php echo $propiedad[ 'precio' ]; ?></p>
			<ul class="iconos-caracteristicas">
				<li>
					<img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
					<p><?php echo $propiedad[ 'wc' ]; ?></p>
				</li>
				<li>
					<img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
					<p><?php echo $propiedad[ 'estacionamiento' ]; ?></p>
				</li>
				<li>
					<img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
					<p><?php echo $propiedad[ 'habitaciones' ]; ?></p>
				</li>
			</ul>
			<p><?php echo $propiedad[ 'descripcion' ]; ?></p>
		</div>
	</main>
<?php
mysqli_close($db);
?>