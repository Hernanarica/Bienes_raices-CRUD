<?php

function connectionDB(): mysqli
{
   $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

   if (!$db) {
      echo "Error al intentar conectarse con la base de datos.";
      exit;
   }

   return $db;
}

