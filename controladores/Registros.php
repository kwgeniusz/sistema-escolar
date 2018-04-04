<?php



class Registros {

/**____________________INICIO______________________________ **/
  public function Inicio() {
  require "classes/classVista.php";
  require "modelos/modeloRepresentante.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";

  $oConsulta = new modeloRepresentante($idConn);
  $rs = $oConsulta->listarRepresentante();

  // transformar resultado en arreglo asociativo

  $item =array();
  while ($rows = mysql_fetch_array($rs)) 
   {
          $item[]  = $rows;
   }

    // parametros para la vista 
     // parametros para la vista 
        $datos["titulo"] = $nombre_nav_aplicacion ;
        $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Registros del Sistema -<br> Representantes";
   session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
 
    $datos["item"] = $item;        

  // SAlida de la vista
  $oSalida = new Vista("registros_inicio.php",$datos); 
  }
  
  

/**____________________MODIFICAR REPRESENTANTE__________________________________ **/
  public function modificar_r() {

   require "classes/classVista.php";
   require "modelos/modeloRepresentante.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Registros del Sistema -<br> Modificar Representante";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $datos["errorNombre"] = "";
    $datos["errorApellido"] = "";
    $datos["errorDireccion"] = "";
    $datos["errorTelefono"] = "";
  
        $cedula_r =$_GET['id'];
    
    $oConsulta = new modeloRepresentante($idConn);
    $rs = $oConsulta-> obtenerDatos($cedula_r);

    while ($rows = mysql_fetch_array($rs)) 
     {
           $nombre_r    = $rows["nombre_r"];
           $apellido_r  = $rows["apellido_r"];
           $estado_civil  = $rows["estado_civil"];
           $direccion   = $rows["direccion"];
           $telefono   = $rows["telefono"];
     }
 
    $datos["cedula_r"] = $cedula_r;
    $datos["nombre_r"] =  $nombre_r ;
    $datos["apellido_r"] =  $apellido_r ;
    $datos["estado_civil"] =  $estado_civil ;
    $datos["direccion"] =  $direccion ;
    $datos["telefono"] = $telefono  ;
   

  // SAlida de la vista
  $oSalida = new Vista("registros_modificarRepresentante.php",$datos); 
  }
  
  
   public function modificar_r2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloRepresentante.php";
  require "db/dbConnect.php";

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Registros del Sistema -<br> Modificar Representante";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
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
         $oConsulta = new modeloRepresentante($idConn);
         $oConsulta->modificarRepresentante($cedula_r,$nombre_r,$apellido_r,$estado_civil,$direccion,$telefono);
               
         // SAlida de la vista
         echo '<script type="text/javascript"> alert("DATOS MODIFICADOS CORRECTAMENTE.");
                                 window.location.href="index.php?cnt=Registros&act=Inicio"; </script>';
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
    
         $datos["errorNombre"]   = $errorNombre;
         $datos["errorApellido"] = $errorApellido;
         $datos["errorDireccion"]  = $errorDireccion; 
         $datos["errorTelefono"]  = $errorTelefono;         
            
         
        $oSalida = new Vista("registros_modificarRepresentante.php",$datos);
      }
      
      
  }


/**____________________BORRAR REPRESENTANTE__________________________________ **/

    public function borrar_r() {

   require "classes/classVista.php";
   require "modelos/modeloRepresentante.php";
   require "inc/config/valores_generales.php";
   require "db/dbConnect.php";
 
    // parametros para la vista 
        $datos["titulo"] = $nombre_nav_aplicacion ;
        $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Registros del Sistema -<br> Borrar Representante";
          session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $cedula_r =$_GET['id'];
 
    $representante = new modeloRepresentante($idConn);
    $rs = $representante-> obtenerDatos($cedula_r);

    while ($rows = mysql_fetch_array($rs)) 
     {

           $cedula_r    = $rows["cedula_r"];
           $nombre_r    = $rows["nombre_r"];
           $apellido_r  = $rows["apellido_r"];
           $estado_civil =$rows["estado_civil"];
           $direccion   = $rows["direccion"];
           $telefono    = $rows["telefono"];

     }
 
    $datos["cedula_r"]   = $cedula_r;
    $datos["nombre_r"]   = $nombre_r;
    $datos["apellido_r"] = $apellido_r;
    $datos["estado_civil"]=$estado_civil;
    $datos["direccion"]  = $direccion;
    $datos["telefono"]   = $telefono;


  // SAlida de la vista
  $oSalida = new Vista("registros_borrarRepresentante.php",$datos); 
  }
  
  public function borrar_r2() {
  
   require "modelos/modeloRepresentante.php";
   require "db/dbConnect.php";
  
      $cedula_r = $_POST['cedula_r'];
    
      $oborrar = new modeloRepresentante($idConn);
      $oborrar->borrarRepresentante($cedula_r);
      
       echo '<script type="text/javascript"> alert("REPRESENTANTE ELIMINADO EXITOSAMENTE");
                                 window.location.href="index.php?cnt=Registros&act=Inicio"; </script>';


  }
  
/**____________________Ver Estudiantes a Cargo del REPRESENTANTE__________________________________ **/
 
    public function CargaEstudiantil() {

   require "classes/classVista.php";
   require "modelos/modeloRepresentante.php";
   require "inc/config/valores_generales.php";
   require "db/dbConnect.php";

 
    // parametros para la vista 
        $datos["titulo"] = $nombre_nav_aplicacion ;
        $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Registros del Sistema -<br> Carga Estudiantil";
          session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
     $c = 0;
     $cedula_r =$_GET['id'];
 
    $oConsulta = new modeloRepresentante($idConn);
    $rs = $oConsulta-> verCargaEstudiantil($cedula_r);
    
    $item =array();
    while ($rows = mysql_fetch_array($rs)) 
     {
           $cedula_r = $rows['cedula_r'];
           $nombre_r = $rows['nombre_r'];
           $apellido_r = $rows['apellido_r'];
           $item[]  = $rows;  
           $c = $c +1;
     }

       if($c == 0)
       {
         echo '<script type="text/javascript"> alert("NO POSEE CARGA ESTUDIANTIL - ELIMINE ESTE REPRESENTANTE.");
                       window.location.href="index.php?cnt=Registros&act=Inicio"; </script>';
       }
       

          $datos["cedula_r"] = $cedula_r; 
          $datos["nombre_r"] = $nombre_r; 
          $datos["apellido_r"] = $apellido_r;
          $datos["item"] = $item; 

                  
  // SAlida de la vista
  $oSalida = new Vista("registros_cargaEstudiantil.php",$datos); 
  }
	
 /**____________________MODIFICAR CARGA ESTUDIANTIL__________________________________ **/
  public function modificar_cargaEstudiantil() {

   require "classes/classVista.php";
   require "modelos/modeloEstudiante.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Registros del Sistema -<br> Modificar Estudiante";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $datos["errorNombre"] = "";
    $datos["errorApellido"] = "";
    $datos["errorSexo"] = "";
    $datos["errorFechaNacimiento"] = "";
    $datos["errorLugarNacimiento"] = "";
  
        $cedula_es =$_GET['id'];
    
    $oConsulta = new modeloEstudiante($idConn);
    $rs = $oConsulta-> obtenerDatos($cedula_es);

    while ($rows = mysql_fetch_array($rs)) 
     {
           $cedula_r    = $rows["cedula_r"];
           $cedula_es    = $rows["cedula_es"];
           $nombre_es    = $rows["nombre_es"];
           $apellido_es  = $rows["apellido_es"];
           $sexo           = $rows["sexo"];
           $fecha_nacimiento   = $rows["fecha_nacimiento"];
           $lugar_nacimiento  = $rows["lugar_nacimiento"];
     }
     
    $datos["cedula_r"] = $cedula_r;
    $datos["cedula_es"] = $cedula_es;
    $datos["nombre_es"] =  $nombre_es ;
    $datos["apellido_es"] =  $apellido_es ;
    $datos["sexo"] =  $sexo ;
    $datos["fecha_nacimiento"] =  $fecha_nacimiento;
    $datos["lugar_nacimiento"] =  $lugar_nacimiento;
    
  // SAlida de la vista
  $oSalida = new Vista("registros_modificarCargaEstudiantil.php",$datos); 
  }
  
  
   public function modificar_cargaEstudiantil2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloEstudiante.php";
  require "db/dbConnect.php";

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Registros del Sistema -<br> Modificar Estudiante";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
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
         $oConsulta = new modeloEstudiante($idConn);
         $oConsulta->modificarEstudiante($cedula_es,$nombre_es,$apellido_es,$sexo,$fecha_nacimiento,$lugar_nacimiento);
               
         // SAlida de la vista
         echo '<script type="text/javascript"> alert("DATOS MODIFICADOS CORRECTAMENTE.");
                                 window.location.href="index.php?cnt=Registros&act=cargaEstudiantil&id='.$cedula_r.'"; </script>';
     }
//ELSE DEL PRIMER IF
   else
      {
    $datos["cedula_r"]      =  $cedula_r;
    $datos["cedula_es"]     = $cedula_es;
    $datos["nombre_es"]     = $nombre_es;
    $datos["apellido_es"]   = $apellido_es;
    $datos["sexo"] = $sexo;
    $datos["fecha_nacimiento"]    = $fecha_nacimiento;
    $datos["lugar_nacimiento"]     = $lugar_nacimiento;
    
    
         $datos["errorNombre"]   = $errorNombre;
         $datos["errorApellido"] = $errorApellido;
         $datos["errorSexo"]  = $errorSexo; 
         $datos["errorFechaNacimiento"]  = $errorFechaNacimiento;         
         $datos["errorLugarNacimiento"]  = $errorLugarNacimiento;   
         
        $oSalida = new Vista("registros_modificarCargaEstudiantil.php",$datos);
   }
  
      
 }


/**____________________BORRAR CARGA__________________________________ **/

    public function borrar_cargaEstudiantil() {

   require "classes/classVista.php";
   require "modelos/modeloEstudiante.php";
   require "inc/config/valores_generales.php";
   require "db/dbConnect.php";
 
    // parametros para la vista 
        $datos["titulo"] = $nombre_nav_aplicacion ;
        $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Registros del Sistema -<br> Borrar Estudiante";
          session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $cedula_es =$_GET['id'];
 
    $oConsulta = new modeloEstudiante($idConn);
    $rs = $oConsulta-> obtenerDatos($cedula_es);

    while ($rows = mysql_fetch_array($rs)) 
     {
           $cedula_r    = $rows["cedula_r"];
           $cedula_es    = $rows["cedula_es"];
           $nombre_es    = $rows["nombre_es"];
           $apellido_es  = $rows["apellido_es"];
           $sexo           = $rows["sexo"];
           $fecha_nacimiento   = $rows["fecha_nacimiento"];
           $lugar_nacimiento  = $rows["lugar_nacimiento"];
     }
     
    $datos["cedula_r"] = $cedula_r;
    $datos["cedula_es"] = $cedula_es;
    $datos["nombre_es"] =  $nombre_es ;
    $datos["apellido_es"] =  $apellido_es ;
    $datos["sexo"] =  $sexo ;
    $datos["fecha_nacimiento"] =  $fecha_nacimiento;
    $datos["lugar_nacimiento"] =  $lugar_nacimiento;
    
  // SAlida de la vista
  $oSalida = new Vista("registros_borrarCargaEstudiantil.php",$datos); 
  }
  
  public function borrar_cargaEstudiantil2() {
  
   require "modelos/modeloEstudiante.php";
   require "db/dbConnect.php";
 
      $cedula_r = $_POST['cedula_r'];
      $cedula_es = $_POST['cedula_es'];
    
      $oborrar = new modeloEstudiante($idConn);
      $oborrar->borrarEstudiante($cedula_es);
      
       echo '<script type="text/javascript"> alert("ESTUDIANTE ELIMINADO EXITOSAMENTE");
                                 window.location.href="index.php?cnt=Registros&act=cargaEstudiantil&id='.$cedula_r.'"; </script>';
  }
  
/**____________________NUEVA CARGA ESTUDIANTIL__________________________________ **/
  public function agregarCargaEstudiantil() {

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
     $datos["titulo2"] = "- Registros del Sistema -<br>'Agregar Carga Estudiantil'";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
     
    $datos["cedula_r"]  = $cedula_r;
    $datos["nombre_r"]  = $nombre_r;
    $datos["apellido_r"]  = $apellido_r;
    $datos["vinculo_r"]   = ""; 
     
     $datos["nacionalidad"]  = "";
    $datos["cedula_es"] = "";
    $datos["nombre_es"] = "";
    $datos["apellido_es"] = "";
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
  $oSalida = new Vista("registros_agregarCargaEstudiantil.php",$datos); 
  
}
    public function agregarCargaEstudiantil2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloRepresentante.php";
  require "modelos/modeloEstudiante.php";
  require "db/dbConnect.php";
  

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Registros del Sistema -<br>'Agregar Carga Estudiantil'";
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
     if ($cedula_existente > 0 ) {
       $errorV = 1;
       $errorCedula = "Ya Exista un Estudiante Con Esta Cedula En El Sistema";
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
              
       echo '<script type="text/javascript"> alert("SE AGREGO AL ESTUDIANTE SATISFACTORIAMENTE.");
                                 window.location.href="index.php?cnt=Registros&act=cargaEstudiantil&id='.$cedula_r.'"; </script>';
     }
//ELSE DEL PRIMER IF
   else
      {

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
               
         
        $oSalida = new Vista("registros_agregarCargaEstudiantil.php",$datos);
      }
  
 }



}
?>
