<?php
require_once 'dataBase/database.php';
$db = connectionDB();

// Traemos las propiedades
$queryPropiedades = "SELECT * FROM propiedades LIMIT 3";
$resPropiedades   = mysqli_query($db, $queryPropiedades);
$propiedades      = [];

while ($item = mysqli_fetch_assoc($resPropiedades)) {
   $propiedades[] = $item;
}
?>
	<main class="contenedor seccion">
		<h1>Más Sobre Nosotros</h1>
		<div class="iconos-nosotros">
			<div class="icono">
				<img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
				<h3>Seguridad</h3>
				<p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
			</div>
			<div class="icono">
				<img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
				<h3>Precio</h3>
				<p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
			</div>
			<div class="icono">
				<img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
				<h3>A Tiempo</h3>
				<p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
			</div>
		</div>
	</main>
	<section class="seccion contenedor">
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
		</div>
		<div class="alinear-derecha">
			<a href="anuncios.php" class="boton-verde">Ver Todas</a>
		</div>
	</section>
	<section class="imagen-contacto">
		<h2>Encuentra la casa de tus sueños</h2>
		<p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
		<a href="contacto.php" class="boton-amarillo">Contactános</a>
	</section>
	<div class="contenedor seccion seccion-inferior">
		<section class="blog">
			<h3>Nuestro Blog</h3>
			<article class="entrada-blog">
				<div class="imagen">
					<picture>
						<source srcset="build/img/blog1.webp" type="image/webp">
						<source srcset="build/img/blog1.jpg" type="image/jpeg">
						<img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
					</picture>
				</div>
				<div class="texto-entrada">
					<a href="entrada.php">
						<h4>Terraza en el techo de tu casa</h4>
						<p class="informacion-meta">Escrito el:
							<span>20/10/2021</span>
							por:
							<span>Admin</span>
						</p>
						<p>
							Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
						</p>
					</a>
				</div>
			</article>
			<article class="entrada-blog">
				<div class="imagen">
					<picture>
						<source srcset="build/img/blog2.webp" type="image/webp">
						<source srcset="build/img/blog2.jpg" type="image/jpeg">
						<img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
					</picture>
				</div>
				<div class="texto-entrada">
					<a href="entrada.php">
						<h4>Guía para la decoración de tu hogar</h4>
						<p class="informacion-meta">Escrito el:
							<span>20/10/2021</span>
							por:
							<span>Admin</span>
						</p>
						<p>
							Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
						</p>
					</a>
				</div>
			</article>
		</section>
		<section class="testimoniales">
			<h3>Testimoniales</h3>
			<div class="testimonial">
				<blockquote>
					El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
				</blockquote>
				<p>- Juan De la torre</p>
			</div>
		</section>
	</div>
<?php
mysqli_close($db);
?>