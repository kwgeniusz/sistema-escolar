<?php



class Configuracion {

/**____________________LISTAR______________________________ **/
  public function Inicio() {
  
  require "classes/classVista.php";
  require "modelos/modeloConfiguracion.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";

  $oConsulta = new modeloConfiguracion($idConn);
  $rs = $oConsulta->listarConfiguracion();

  // transformar resultado en arreglo asociativo


  while ($rows = mysql_fetch_array($rs)) 
   {
           $ano_escolar     = $rows["ano_escolar"];
           $director        = $rows["director"];
           $cedula_director = $rows["cedula_director"];
           $cargar_notas = $rows["cargar_notas"];
   }

    // parametros para la vista 
     
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "Configuracion Del Sistema";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
       $datos["ano_escolar"]        = $ano_escolar ;
       $datos["director"]           =   $director  ;
       $datos["cedula_director"]    = $cedula_director; 
       $datos["cargar_notas"]        = $cargar_notas; 
       
       $datos["errorDirector"]    =  ""  ;
       $datos["errorCedula"]    = "";      

  // SAlida de la vista
  $oSalida = new Vista("configuracion_inicio.php",$datos); 
  }
  
  
/**____________________MODIFICAR ALGUNA CONFIGURACION__________________________________ **/
  public function modificar_configuracion() {
  
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "db/dbConnect.php";
  require "modelos/modeloConfiguracion.php";
  
   // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "Configuracion del Sistema";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
  
    $errorDirector = "";
    $errorCedula = "";  

       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
      $errorV = 0;
  
    /* Validacion de nombre */ 
    if ($director == "" OR $director == " ") {
       $errorV = 1;
       $errorDirector= "Campo Nombre y Apellido Vacio ";
    } 
         /* Validacion de TELEFONO */ 
    if ($cedula_director <= 0) {
       $errorV = 1;
       $errorCedula = "La Cedula Debe ser un Campo Numerico";
    } 
      if ($cedula_director == "") {
       $errorV = 1;
       $errorCedula = "Campo Cedula Vacio";
    } 
       
//PRIMER IF
      if ($errorV == 0)
    { 
      $oConsulta = new modeloConfiguracion($idConn);
      $oConsulta->  modificarConfiguracion($director,$cedula_director,$cargar_notas);
         // SAlida de la vista
         echo '<script type="text/javascript"> alert("CONFIGURACION APLICADA SATISFACTORIAMENTE.");
                                 window.location.href="index.php?cnt=Configuracion&act=Inicio"; </script>';
     }
//ELSE DEL PRIMER IF
   else
      {
       $datos["ano_escolar"]        = $ano_escolar;
       $datos["director"]           = $director  ;
       $datos["cedula_director"]    = $cedula_director;  
      
         $datos["errorDirector"]   = $errorDirector;
         $datos["errorCedula"]     = $errorCedula;
         
        $oSalida = new Vista("configuracion_inicio.php",$datos);
      }
      
 
   }
        
}
?>
