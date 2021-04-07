<?php

require_once 'dataBase/database.php';
$db = connectionDB();

$errores = [];

if ($_SERVER[ 'REQUEST_METHOD' ] === 'POST') {
   $email    = mysqli_real_escape_string($db, $_POST[ 'email' ]);
   $password = mysqli_real_escape_string($db, $_POST[ 'password' ]);

   if (!$email) {
      $errores[ 'email' ] = 'Debes ingresar el email.';
   }
   if (!$password) {
      $errores[ 'password' ] = 'Debes ingresar una contraseña.';
   }

   if (empty($errores)) {
      // Vemos si el usuario existe
      $queryEmail = "SELECT * FROM usuarios WHERE email = '$email'";

      $res = mysqli_query($db, $queryEmail);

      if ($res->num_rows) {
         // Verificamos la contraseña
         $usuario = mysqli_fetch_assoc($res);
         $auth    = password_verify($password, $usuario[ 'password' ]);

         if ($auth) {
            session_start();
            //Si puso credenciales correctas.
            $_SESSION[ 'usuario' ] = $usuario;
            $_SESSION[ 'login' ]   = true;

            header('location: admin');
         } else {
            $errores[ 'password-verify' ] = 'La contraseña no coincide';
         }
      } else {
         $errores[ 'usuario' ] = 'El usuario no existe';
      }
   }
}

?>
<main class="contenedor seccion contenido-centrado">
	<h1>Iniciar sesión</h1>
	<form method="post" class="formulario">
		<fieldset>
			<legend>Datos de registro</legend>
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="Ingresa tu email" id="email" autocomplete="off">
         <?php if (isset($errores[ 'email' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'email' ]; ?>
				</div>
         <?php endif; ?>
			<label for="password">Contraseña</label>
			<input type="password" name="password" placeholder="Ingresa tu contraseña" id="password" autocomplete="off">
         <?php if (isset($errores[ 'password' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'password' ]; ?>
				</div>
         <?php endif; ?>
         <?php if (isset($errores[ 'usuario' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'usuario' ]; ?>
				</div>
         <?php endif; ?>
         <?php if (isset($errores[ 'password-verify' ])): ?>
				<div class="msj-error">
					&#215; <?php echo $errores[ 'password-verify' ]; ?>
				</div>
         <?php endif; ?>
		</fieldset>
		<input type="submit" value="Registrar" class="boton boton-verde">
	</form>
</main>
