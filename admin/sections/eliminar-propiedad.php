<?php
require_once '../dataBase/dataBase.php';
$db = connectionDB();
$id = filter_var($_GET[ 'id' ], FILTER_VALIDATE_INT);

// Traemos la propiedad solo para borrar su imagen
$queryTraer  = "SELECT imagen FROM propiedades WHERE id_propiedades = '$id'";
$resTraer    = mysqli_query($db, $queryTraer);
$propiedad   = mysqli_fetch_assoc($resTraer);
$deleteImage = '../test-images/' . $propiedad[ 'imagen' ];
unlink($deleteImage);

// Ejecutamos la query para borrar su imagen
$query = "DELETE FROM propiedades WHERE id_propiedades = '$id'";
$res   = mysqli_query($db, $query);

if ($res) {
   header('location: index.php?s=panel&resultado=3');
} else {
   header('location: index.php?s=panel&resultado=4');
}

mysqli_close($db);