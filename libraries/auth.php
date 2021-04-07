<?php
function isAuth()
{
   session_start();
   if (isset($_SESSION[ 'login' ])) {
      return true;
   } else {
      return false;
   }
}

function cerrarSeion()
{
   session_start();
   if (isset($_SESSION[ 'login' ])) {
      unset($_SESSION[ 'login' ]);
      return true;
   }
}