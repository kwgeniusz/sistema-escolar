<?php
//---------------MENU------------------//
//---------------.............USUARIO ADMINISTRADO..............-----------------//

if($nivel_usuario == 1){ 
//---------------MODULO INSCRIPCION------------------//
$inscripcion = "index.php?cnt=Inscripcion&act=Inicio";

//---------------MODULO BASE DE DATOS------------------//
$registros = "index.php?cnt=Registros&act=Inicio";

//---------------MODULO AULAS------------------//
$aulas = "index.php?cnt=Aulas&act=Inicio";

//---------------MODULO REPORTES------------------//
$nominaRepresentantes = "index.php?cnt=Reportes&act=nominaRepresentantes";
$matriculaEstudiantes = "index.php?cnt=Reportes&act=matriculaEstudiantes";
$rendimientoEstudiantil = "index.php?cnt=Reportes&act=rendimientoEstudiantil";

//---------------MODULO CONFIGURACION------------------//
$configuracion = "index.php?cnt=Configuracion&act=Inicio";

//---------------MODULO USUARIOS------------------//
$usuarios = "index.php?cnt=Usuarios&act=Inicio";

//---------------OTRO LINK------------------//
$salir= "index.php";
}

//---------------.................USUARIO DOCENTE.......................-----------------//
if($nivel_usuario == 2){ 

//---------------MODULO AULAS------------------//
$aulas = "index.php?cnt=Aulas&act=Inicio";

//---------------OTRO LINK------------------//
$salir= "index.php";
}

//---------------.................USUARIO CONSULTAS.......................-----------------//
if($nivel_usuario == 3){ 

//---------------MODULO BASE DE DATOS------------------//
$registros = "index.php?cnt=Registros&act=Inicio";

//---------------MODULO AULAS------------------//
$aulas = "index.php?cnt=Aulas&act=Inicio";

//---------------MODULO REPORTES------------------//
$nominaRepresentantes = "index.php?cnt=Reportes&act=nominaRepresentantes";
$matriculaEstudiantes = "index.php?cnt=Reportes&act=matriculaEstudiantes";
$rendimientoEstudiantil = "index.php?cnt=Reportes&act=rendimientoEstudiantil";

//---------------OTRO LINK------------------//
$salir= "index.php";
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<head>
  <title> <?php echo "$titulo"; ?>   </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" type="text/css" href="css/estilo1.css" title="estilo1" />
  <link rel="alternate stylesheet" type="text/css" href="css/estilo2.css" title="estilo2" />
  
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="shortcut icon" href="inc/img/colegio.png" type="image/x-icon" />
  
  <script type="text/javascript" src="js/styleswitcher.js"></script>
</head>
 
 <body>

<div id="cabeza">
<img class="logoCabeza" src="inc/img/logo.jpg" align="left">

  <br>
  <h2><?php echo "$titulo1"; ?></h2><br>
  <h3><?php echo "$titulo2"; ?></h3>

</div>
