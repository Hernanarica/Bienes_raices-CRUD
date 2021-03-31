<?php
function DBconection()
{
   $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

   if ($db) {
      echo 'OK';
   } else {
      echo ':(';
   }
}