<?php

function connectionDB()
{
   $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

   if ($db) {
      echo ':)';
   } else {
      echo ':(';
   }
}

connectionDB();

