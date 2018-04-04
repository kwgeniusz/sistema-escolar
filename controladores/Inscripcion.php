<?php



class Inscripcion {

/**____________________INICIO______________________________ **/
/**____________________NUEVO REPRESENTANTE (PASO 1)__________________________________ **/

  public function inicio() {
  
  require "classes/classVista.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";
  
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Inscripcion -<br>'Nuevo Representante'";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
     
    $datos["cedula_r"] = "";
    $datos["nombre_r"] = "";
    $datos["apellido_r"] = "";
    $datos["estado_civil"] = "";
    $datos["direccion"] = "";
    $datos["telefono"] = "";
    
    $datos["errorCedula"] = "";
    $datos["errorNombre"] = "";
    $datos["errorApellido"] = "";
    $datos["errorDireccion"] = "";
    $datos["errorTelefono"] = "";
    

  // SAlida de la vista
  $oSalida = new Vista("inscripcion_nuevoRepresentante.php",$datos); 
  }

 public function nuevoRepresentante2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloRepresentante.php";
  require "db/dbConnect.php";

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Inscripcion -<br>'Nuevo Representante'";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $errorCedula = "";
    $errorNombre = "";
    $errorApellido = "";   
    $errorDireccion = "";
    $errorTelefono = "";
      
       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
      $errorV = 0;
    	$cedula_verificacion = 0;
    	
    	$oConsulta = new modeloRepresentante($idConn);
    	
    	if($cedula_r != 0)
   {
      $result = $oConsulta->obtenerDatos($cedula_r);
       
          while($reg= mysql_fetch_array($result))
           {
               $cedula_verificacion = $reg['cedula_r'];
           }
   }
	/* Validacion de cedula  */
     if ($cedula_r <= 0) {
       $errorV = 1;
       $errorCedula = "La Cedula Debe ser un valor numerico";
    } 
       if ($cedula_r == "") {
       $errorV = 1;
       $errorCedula = "Campo Cedula Vacio";
    } 
     if ($cedula_verificacion > 0) {
       $errorV = 1;
       $errorCedula = "Ya existe Un Representante Con Esta Cedula En El Sistema";
    } 
    /* Validacion de nombre */ 
    if ($nombre_r == "" OR $nombre_r == " ") {
       $errorV = 1;
       $errorNombre = "Campo Nombre Vacio";
    } 
       /* Validacion de apellido*/ 
    if ($apellido_r == "" OR $apellido_r == " ") {
       $errorV = 1;
       $errorApellido = "Campo Apellido Vacio";
    } 
        /* Validacion de direccion */ 
    if ($direccion == "" OR $direccion == " ") {
       $errorV = 1;
       $errorDireccion= "Campo Direccion Vacio";
    } 
         /* Validacion de TELEFONO */ 
    if ($telefono <= 0) {
       $errorV = 1;
       $errorTelefono = "El Telefono Debe ser un Campo Numerico";
    } 
      if ($telefono == "") {
       $errorV = 1;
       $errorTelefono = "Campo Telefono Vacio";
    } 
   
//PRIMER IF
      if ($errorV == 0)
    { 
         $oConsulta->insertarRepresentante($cedula_r,$nombre_r,$apellido_r,$estado_civil,$direccion,$telefono);
               
         // SAlida de la vista
         echo "<script type='text/javascript'> alert('DATOS INSERTADOS CORRECTAMENTE.');
                                 window.location.href='index.php?cnt=Inscripcion&act=nuevoEstudiante&id=$cedula_r'; </script>";
     }
//ELSE DEL PRIMER IF
   else
      {
    $datos["cedula_r"]     = $cedula_r;
    $datos["nombre_r"]     = $nombre_r;
    $datos["apellido_r"]   = $apellido_r;
    $datos["estado_civil"] = $estado_civil;
    $datos["direccion"]    = $direccion;
    $datos["telefono"]     = $telefono;
    
         $datos["errorCedula"]   = $errorCedula;
         $datos["errorNombre"]   = $errorNombre;
         $datos["errorApellido"] = $errorApellido;
         $datos["errorDireccion"]  = $errorDireccion; 
         $datos["errorTelefono"]  = $errorTelefono;         
            
         
        $oSalida = new Vista("inscripcion_nuevoRepresentante.php",$datos);
      }
  
 }
 /* --------------PASO 2------------*/
   public function nuevoEstudiante() {

  require "classes/classVista.php";
  require "db/dbConnect.php";
  require "modelos/modeloRepresentante.php";
  require "inc/config/valores_generales.php";
  
  
    $cedula_r = $_GET['id'];
     
    $oConsulta = new modeloRepresentante($idConn);
      $rs = $oConsulta->obtenerDatos($cedula_r);
        while($rows = mysql_fetch_array($rs))
           {
               $nombre_r = $rows['nombre_r'];
               $apellido_r = $rows['apellido_r'];
           }
     
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Inscripcion -<br>'Nuevo Estudiante'";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
     
    $datos["cedula_r"]  = $cedula_r;
    $datos["nombre_r"]  = $nombre_r;
    $datos["apellido_r"]  = $apellido_r;
    $datos["vinculo_r"]   = ""; 
     
    $datos["nacionalidad"] = "";
    $datos["cedula_es"] = "";
    $datos["nombre_es"] = "";
    $datos["apellido_es"] = "";
    $datos["nacionalidad"] = "";
    $datos["sexo"] = "";
    $datos["fecha_nacimiento"] = "";
    $datos["lugar_nacimiento"] = "";
    
    $datos["errorVinculo"]   = "";
    $datos["errorCedula"] = "";
    $datos["errorApellido"] = "";
    $datos["errorNombre"] = "";
    $datos["errorSexo"] = "";
    $datos["errorFechaNacimiento"] = "";
    $datos["errorLugarNacimiento"] = "";
    
    
  // SAlida de la vista
  $oSalida = new Vista("inscripcion_nuevoEstudiante.php",$datos); 
  }

 public function nuevoEstudiante2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloRepresentante.php";
  require "modelos/modeloEstudiante.php";
  require "db/dbConnect.php";
  

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Inscripcion -<br>'Nuevo Estudiante'";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $errorVinculo ="";
    $errorCedula = "";
    $errorNombre = "";
    $errorApellido = "";   
    $errorSexo = "";
    $errorFechaNacimiento = "";
    $errorLugarNacimiento = "";
      
       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
    
      $errorV = 0;
      $nacionalidadCedula ="$nacionalidad"."$cedula_es";
    	$cedula_existente = 0;
    	
    	$oConsulta = new modeloEstudiante($idConn);
    	
     if(!empty($cedula_es)){
      $result = $oConsulta->verificarCedula($nacionalidadCedula);
       
          while($reg = mysql_fetch_array($result))
           {
               $cedula_existente = count($reg['cedula_es']);
           }
    }       
   
           /* Validacion de vinculo */ 
    if ($vinculo_r == "" OR $vinculo_r == " ") {
       $errorV = 1;
       $errorVinculo = "El Vinculo es Obligatorio";
    } 
	/* Validacion de cedula de estudiante  */
     if ($cedula_es <= 0) {
       $errorV = 1;
       $errorCedula = "La Cedula Debe ser un valor numerico";
    } 
       if ($cedula_es == "") {
       $errorV = 1;
       $errorCedula = "Campo Cedula Vacio";
    } 
     if ($cedula_existente > 0) {
       $errorV = 1;
       $errorCedula = "Ya Exista un estudiante con esta cedula en la base de datos";
    } 
    
    /* Validacion de nombre */ 
    if ($nombre_es == "" OR $nombre_es == " ") {
       $errorV = 1;
       $errorNombre = "Campo Nombre Vacio";
    } 
       /* Validacion de apellido*/ 
    if ($apellido_es == "" OR $apellido_es == " ") {
       $errorV = 1;
       $errorApellido = "Campo Apellido Vacio";
    } 
        /* Validacion de sexo*/ 
    if ($sexo == "" OR $sexo == " ") {
       $errorV = 1;
       $errorSexo = "Debe Elegir un Sexo";
    } 
        /* Validacion de fecha de nacimiento */ 
    if ($fecha_nacimiento == "" OR $fecha_nacimiento == " ") {
       $errorV = 1;
       $errorFechaNacimiento = "Campo Fecha Vacio";
    } 
    if ($fecha_nacimiento <= 0) {
       $errorV = 1;
       $errorFechaNacimiento = "la Fecha debe ser un valor numerico";
    } 
         /* Validacion de lugar de nacimiento*/ 
    if ($lugar_nacimiento == "" OR $lugar_nacimiento == " ") {
       $errorV = 1;
       $errorLugarNacimiento = "Campo lugar de nacimiento Vacio";
    } 
   
//PRIMER IF
      if ($errorV == 0)
    { 
          $cedula_es ="$nacionalidad"."$cedula_es";
         $oConsulta->insertarEstudiante($cedula_r,$vinculo_r,$cedula_es,$nombre_es,$apellido_es,$sexo,$fecha_nacimiento,$lugar_nacimiento);
      
         // SAlida de la vista
         
         echo '<script type="text/javascript"> 
         
         var resultado = confirm("DATOS INSERTADOS CORRECTAMENTE, DESEA HACER OTRA INSCRIPCION?");

       if(resultado === true)
         window.location.href="index.php?cnt=Inscripcion&act=inicio";   
       else
         window.location.href="index.php?cnt=Inicio&act=go"; 
               
               </script>';
     }
//ELSE DEL PRIMER IF
   else
      {
      
       $oConsulta = new modeloRepresentante($idConn);
       $rs = $oConsulta->listarRepresentante();
  
      $item =array();
          while ($rows = mysql_fetch_array($rs)) 
         {
           $item[]  = $rows;
         }
         
    $datos["cedula_r"]  = $cedula_r;
    $datos["nombre_r"]  = $nombre_r;
    $datos["apellido_r"]  = $apellido_r;
    $datos["vinculo_r"]        = $vinculo_r;  
   
    $datos["nacionalidad"]     = $nacionalidad;   
    $datos["cedula_es"]        = $cedula_es;
    $datos["nombre_es"]        = $nombre_es;
    $datos["apellido_es"]      = $apellido_es;
    $datos["sexo"]             = $sexo;
    $datos["fecha_nacimiento"] = $fecha_nacimiento;
    $datos["lugar_nacimiento"] = $lugar_nacimiento;

         $datos["errorVinculo"]   = $errorVinculo;
         $datos["errorCedula"]   = $errorCedula;
         $datos["errorNombre"]   = $errorNombre;
         $datos["errorApellido"] = $errorApellido;
         $datos["errorSexo"]     = $errorSexo;
         $datos["errorFechaNacimiento"]  = $errorFechaNacimiento; 
         $datos["errorLugarNacimiento"]  = $errorLugarNacimiento;         
               
          $datos["item"] = $item;   
         
        $oSalida = new Vista("inscripcion_nuevoEstudiante.php",$datos);
      }
  
 }
 
}

?>
