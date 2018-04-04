<?php
/* Catálogo del mundial de futbol. Lista de equipos (país), lista de jugadores. */

// Leer controlador. Si no hay controlador definido,
// valor por defecto es Operacion.

if(! empty($_GET['cnt'])) {
     $controllerName = $_GET['cnt'];
} else {
     $controllerName = "Login";
}

$controllerPath = 'controladores/'. $controllerName . '.php';


// Leer la accion. Si no hay accion definida, tomar inicio.

 if(! empty($_GET['act'])) {
     $actionName = $_GET['act'];
 } else {
    $actionName = "inicio";
 }


// Incluir el archivo del controlador

 require $controllerPath;

// Crear el objeto y llamar la accion

$controller = new $controllerName;
$controller->$actionName();
?>
