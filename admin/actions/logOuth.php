<?php
require_once '../../libraries/auth.php';

if (cerrarSeion()) {
   header('location: ../../index.php?s=login');
}
