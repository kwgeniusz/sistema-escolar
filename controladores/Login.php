<?php
/**
  * Archivo   : Validacion.php
  * Type      : Controlador 
  * Function  : Controlador validacion
  *            
  */


class Login{

  //  INICIO  ///
  public function inicio() {
//------------------HAGO UNA COMPROBACION DEL AÑO ESCOLAR, Y PARA CAMBIAR EL ESTATUS DE AULAS A DISPONIBLES SI AHI UN CAMBIO DE AÑO.---------------------------------   
    require "inc/funciones/fecha.php";
    require "modelos/modeloConfiguracion.php";
    require "modelos/modeloAula.php";
    require "db/dbConnect.php";
   
    $year2 = $year + 1;

    $arreglo[0] = $year." ";
    $arreglo[1] = " ".$year2;
    
    $ano_actual = implode('-',$arreglo);
    
    $oConsulta1 = new modeloConfiguracion($idConn);
    $rs = $oConsulta1->listarConfiguracion();
    
    while ($rows = mysql_fetch_array($rs)) 
     {
                $ano_escolar  = $rows['ano_escolar'];
     }
   
   if($ano_escolar < $ano_actual)
    {
          $oConsulta1-> renovarAnoEscolar($ano_actual);
          $oConsulta2 = new modeloAula($idConn);
          $rs = $oConsulta2->resetEstatus();   
    }
//------------------COMIENZA EL INICIO DE LOGIN---------------------------------    
    require "classes/classVista.php";
     require "inc/config/valores_generales.php";
     
      session_start();
      session_destroy();
      
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "Inicio de Sesion";
     $datos["nombre_usuario"] = "";
     $datos["nivel_usuario"] = "";
     
     $datos["errorInicio"] = "";
     
  // SAlida de la vista
  $oSalida = new Vista("login.php",$datos); 
  }

//----------COMIENZA LA SEGUNDA FASE DEL LOGIN (VERIFICAR SI EL USUARIO EXISTE EN LA BASE DE DATOS Y SI SU CONTRASEÑA ES CORRECTA------------------------------------------------    
  function verificacion() {

     require "classes/classVista.php";
     require "modelos/modeloUsuario.php";
     require "inc/config/valores_generales.php";
     require "db/dbConnect.php";
         
          // start session
      session_start();
      $_SESSION["nombreSesion"]  = "";
      $_SESSION["nivelSesion"]   = "";
      session_destroy();
     
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "Inicio de Sesion";
     $datos["nombre_usuario"] = "";
     $datos["nivel_usuario"] = "";
     
     $datos["errorInicio"] = "";
    
    $nombre_usuario = "";
    $nivel_usuario = -1;
    $error = 0;

   // Read post parameters

   $usuario = $_POST['usuario'];
   $contra  = MD5($_POST['contra']);
   
  $objeto = new modeloUsuario($idConn);
  $rs = $objeto->verificarLogin($usuario,$contra);

   // Transform result set into associative array
   if (!empty($rs))
    {
      while ($rows = mysql_fetch_array($rs)) 
         {
          $login = $rows["login"];
          $nombre_usuario  = $rows["usr_nombre"];
          $nivel_usuario   = $rows["usr_nivel"]; 
         }
     }
    
   if ($nivel_usuario > 0 ) {
// start session
      session_start();
      $_SESSION["login"]  = $login;
      $_SESSION["nombreSesion"]  = $nombre_usuario;
      $_SESSION["nivelSesion"]   = $nivel_usuario;

   // parametros para la vista 
      $datos["titulo2"] = "Menu Principal"; 
      $datos['nombre_usuario'] = $nombre_usuario;
      $datos['nivel_usuario'] = $nivel_usuario;
   
  // SAlida de la vista
    $oSalida = new Vista("inicio.php",$datos); 

   } else {
   
      $datos['usuario'] = "";
      $datos['contra'] = "";
      
      if($usuario == "" or $contra == ""){
       $datos['errorInicio'] = "No Pueden Existir Campos vacios" ;
      }
      else{
      $datos['errorInicio'] = "Usuario o Contrase&ntildea incorrectos ";
       }
      
     $oSalida = new Vista('login.php',$datos) ;
   }

  }

}

?>
