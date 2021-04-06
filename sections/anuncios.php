<?php
require_once 'dataBase/database.php';
$db = connectionDB();

// Traemos las propiedades
$queryPropiedades = "SELECT * FROM propiedades";
$resPropiedades   = mysqli_query($db, $queryPropiedades);
$propiedades      = [];

while ($item = mysqli_fetch_assoc($resPropiedades)) {
   $propiedades[] = $item;
}
?>
	<main class="contenedor seccion">
		<h2>Casas y Depas en Venta</h2>
		<div class="contenedor-anuncios">
         <?php foreach ($propiedades as $propiedad): ?>
				<div class="anuncio">
					<img loading="lazy" src="test-images/<?php echo $propiedad[ 'imagen' ]; ?>" alt="anuncio">
					<div class="contenido-anuncio">
						<h3><?php echo $propiedad[ 'titulo' ]; ?></h3>
						<p><?php echo $propiedad[ 'descripcion' ]; ?></p>
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
						<a href="index.php?s=anuncio&id=<?php echo $propiedad[ 'id_propiedades' ]; ?>" class="boton-amarillo-block">
							Ver Propiedad
						</a>
					</div>
				</div>
         <?php endforeach; ?>
		</div> <!--.contenedor-anuncios-->
	</main>
<?php
mysqli_close($db);
?>