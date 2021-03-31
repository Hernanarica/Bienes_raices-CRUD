<?php


require_once 'app.php';

/**
 * @param string $name
 * @param bool $inicio
 */
function includeTemplate(string $name, bool $inicio = false)
{
   include TEMPLATES_URL . "/{$name}.php";
}