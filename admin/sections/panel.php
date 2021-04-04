<?php
require_once '../dataBase/dataBase.php';
$db = connectionDB();

$query = "SELECT * FROM propiedades";
$res   = mysqli_query($db, $query);

if ($res) {
   $propiedades = [];
   while ($propiedad = mysqli_fetch_assoc($res)) {
      $propiedades[] = $propiedad;
   }
}

$resultado = $_GET[ 'resultado' ] ?? null;
?>

	<main class="contenedor sección">
      <?php if (intval($resultado) === 1): ?>
			<p class="alerta exito">Propiedad creada correctamente</p>
      <?php endif; ?>
		<h1>Administrador de vienes raíces</h1>
		<a href="index.php?s=crear-propiedad" class="boton boton-verde">Crear propiedad</a>
		<table class="propiedades">
			<thead>
			<tr>
				<th>ID</th>
				<th>Titulo</th>
				<th>Imagen</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
			</thead>
			<tbody>
         <?php foreach ($propiedades as $propiedad): ?>
				<tr>
					<td><?php echo $propiedad[ 'id_propiedades' ]; ?></td>
					<td><?php echo $propiedad[ 'titulo' ]; ?></td>
					<td><img src="../test-images/<?php echo $propiedad[ 'imagen' ]; ?>" alt="imagen de casa" class="imagen-tabla"></td>
					<td><?php echo $propiedad[ 'precio' ]; ?>$</td>
					<td>
						<a href="index.php?s=eliminar-propiedad&<?php echo $propiedad[ 'id_propiedades' ]; ?>" class="boton-rojito-block">Eliminar</a>
						<a href="index.php?s=editar-propiedad&<?php echo $propiedad[ 'id_propiedades' ]; ?>" class="boton-amarillo-block">Actualizar</a>
					</td>
				</tr>
         <?php endforeach; ?>
			</tbody>
		</table>
	</main>
<?php
mysqli_close($db);
?>