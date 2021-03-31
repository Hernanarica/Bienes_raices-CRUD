<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienes Raíces</title>
	<link rel="stylesheet" href="build/css/app.css">
</head>
<body>

<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
	<div class="contenedor contenido-header">
		<div class="barra">
			<a href="index.php">
				<img src="build/img/logo.svg" alt="Logotipo de Bienes Raices">
			</a>

			<div class="mobile-menu">
				<img src="build/img/barras.svg" alt="icono menu responsive">
			</div>

			<div class="derecha">
				<img class="dark-mode-boton" src="build/img/dark-mode.svg">
				<nav class="navegacion">
					<a href="../../sections/nosotros.php">Nosotros</a>
					<a href="../../sections/anuncios.php">Anuncios</a>
					<a href="../../sections/blog.php">Blog</a>
					<a href="../../sections/contacto.php">Contacto</a>
				</nav>
			</div>
		</div>
	</div>
</header>