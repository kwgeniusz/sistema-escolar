<?php



class Usuarios {

/**____________________INICIO______________________________ **/
  public function Inicio() {
  require "classes/classVista.php";
  require "modelos/modeloUsuario.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";

  $oConsulta = new modeloUsuario($idConn);
  $rs = $oConsulta->listarUsuarios();

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
        $datos["titulo2"] = "- Usuarios -<br> Lista de Usuarios";
   session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
 
    $datos["item"] = $item;        

  // SAlida de la vista
  $oSalida = new Vista("usuarios_inicio.php",$datos); 
  }
  
/**____________________NUEVO USUARIO______________________________ **/ 
  public function nuevo_usuario() {
  
  require "classes/classVista.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";
  
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Usuarios -<br> Nuevo Usuario";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
     
    $datos["usuario"] = "";
    $datos["pass"] = "";
    $datos["nombreApellido"] = "";
    $datos["privilegios"] = "";
    
    $datos["errorUsuario"] = "";
    $datos["errorPass"] = "";
    $datos["errorNombreApellido"] = "";

    

  // SAlida de la vista
  $oSalida = new Vista("usuarios_nuevo.php",$datos); 
  }


 public function nuevo_usuario2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
  require "modelos/modeloUsuario.php";
  require "db/dbConnect.php";

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Usuarios -<br> Nuevo Usuario";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $errorUsuario = "";
    $errorPass = "";
    $errorNombreApellido = "";   
      
       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
      $errorV = 0;
    	$usuario_verificacion = 0;
    	
    	$oConsulta = new modeloUsuario($idConn);
    	
    	if($usuario != "")
   {
      $result = $oConsulta->obtenerDatos($usuario);
       
          while($reg= mysql_fetch_array($result))
           {
               $usuario_verificacion = $reg['usr_nivel'];
           }
   }
	/* Validacion de usuario  */
     if ($usuario == "") {
       $errorV = 1;
       $errorUsuario = "Este Campo No Puede Estar En Blanco";
    } 
    
       if ($usuario_verificacion > 0) {
       $errorV = 1;
       $errorUsuario = "Ya Existe Un Usuario Con Este Nick";
    } 
 	/* Validacion de usuario  */   
       if ($pass == "") {
       $errorV = 1;
       $errorPass= "Campo Contrase&ntilde;a Vacio";
    } 

    /* Validacion de nombre */ 
    if ($nombreApellido == "" OR $nombreApellido == " ") {
       $errorV = 1;
       $errorNombreApellido = "Campo Nombre y Apellido Vacio";
    } 
 
   
//PRIMER IF
      if ($errorV == 0)
    { 
                      $nombreApellido=ucwords($nombreApellido);
         $oConsulta->insertarUsuario($usuario,$pass,$nombreApellido,$privilegios);
               
         // SAlida de la vista
         echo "<script type='text/javascript'> alert('USUARIO CREADO.');
                                 window.location.href='index.php?cnt=Usuarios&act=inicio'; </script>";
     }
//ELSE DEL PRIMER IF
   else
      {
    $datos["usuario"]     = $usuario;
    $datos["pass"]        = $pass;
    $datos["nombreApellido"]   = $nombreApellido;
    
         $datos["errorUsuario"]   = $errorUsuario;
         $datos["errorPass"]      = $errorPass;
         $datos["errorNombreApellido"] = $errorNombreApellido;
     
        $oSalida = new Vista("usuarios_nuevo.php",$datos);
      }
  
 } 
  
  

/**____________________MODIFICAR USUARIO__________________________________ **/
  public function modificar_usuario() {

   require "classes/classVista.php";
   require "modelos/modeloUsuario.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
       $datos["titulo2"] = "- Usuarios -<br> Modificar Usuario";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $datos["errorPass"] = "";
    $datos["errorNombreApellido"] = "";
  
        $usuario=$_GET['id'];
    
    $oConsulta = new modeloUsuario($idConn);
    $rs = $oConsulta-> obtenerDatos($usuario);

    while ($rows = mysql_fetch_array($rs)) 
     {
           $usuario   = $rows["login"];
           $nombreApellido  = $rows["usr_nombre"];
           $privilegios  = $rows["usr_nivel"];

     }
 
    $datos["usuario"] = $usuario;
    $datos["nombreApellido"] =  $nombreApellido ;
    $datos["privilegios"] =  $privilegios ;


  // SAlida de la vista
  $oSalida = new Vista("usuarios_modificar.php",$datos); 
  }
  
  
   public function modificar_usuario2() {
 
  require "inc/config/valores_generales.php";
  require "classes/classVista.php";
   require "modelos/modeloUsuario.php";
  require "db/dbConnect.php";

      // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Usuarios -<br> Modificar Usuario";
        session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $errorNombreApellido= ""; 
      
       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
      $errorV = 0;
  
    /* Validacion de nombre y apellido */ 
    if ($nombreApellido == "" OR $nombreApellido == " ") {
       $errorV = 1;
       $errorNombreApellido = "No puede Estar Vacio";
    } 


   
//PRIMER IF
      if ($errorV == 0)
    { 
    
         $nombreApellido=ucwords($nombreApellido);
         $oConsulta = new modeloUsuario($idConn);
         $oConsulta->modificarUsuario($usuario,$nombreApellido,$privilegios);
         
         if($pass != ""){
           $pass = md5($pass);
         $oConsulta->cambiarContrasena($usuario,$pass);
               }
         // SAlida de la vista
         echo '<script type="text/javascript"> alert("DATOS MODIFICADOS CORRECTAMENTE.");
                                 window.location.href="index.php?cnt=Usuarios&act=Inicio"; </script>';
     }
//ELSE DEL PRIMER IF
   else
      {
    $datos["usuario"]     = $usuario;
    $datos["nombreApellido"] = $nombreApellido;
    $datos["privilegios"]   = $privilegios;

         $datos["errorNombreApellido"]   = $errorNombreApellido;     
         
        $oSalida = new Vista("usuarios_modificar.php",$datos);
      }
      
      
  }

/**____________________ELIMINAR USUARIO__________________________________ **/

    public function eliminar_usuario() {

   require "classes/classVista.php";
   require "modelos/modeloUsuario.php";
   require "inc/config/valores_generales.php";
   require "db/dbConnect.php";
 
    // parametros para la vista 
        $datos["titulo"] = $nombre_nav_aplicacion ;
        $datos["titulo1"] = $titulo_aplicacion;
        $datos["titulo2"] = "- Usuario -<br> Eliminar Usuario";
          session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
       
      $login =$_GET['id'];
      
       if($login == $_SESSION["login"]){
        echo '<script type="text/javascript"> alert("NO PUEDE BORRAR AL USUARIO CON LA SECCION ACTUAL.");
                                 window.location.href="index.php?cnt=Usuarios&act=Inicio"; </script>';
       }
         
    $representante = new modeloUsuario($idConn);
    $rs = $representante-> obtenerDatos($login);

    while ($rows = mysql_fetch_array($rs)) 
     {
           $usuario         = $rows["login"];
           $nombreApellido  = $rows["usr_nombre"];
           $privilegios     = $rows["usr_nivel"];
     }
 
    $datos["usuario"]   = $usuario;
    $datos["nombreApellido"] = $nombreApellido;
    $datos["privilegios"] = $privilegios;


  // SAlida de la vista
  $oSalida = new Vista("usuarios_eliminar.php",$datos); 
  }
  
  public function eliminar_usuario2() {
  
   require "modelos/modeloUsuario.php";
   require "db/dbConnect.php";
  
      $usuario = $_POST['usuario'];
    
      $oborrar = new modeloUsuario($idConn);
      $oborrar->eliminarUsuario($usuario);
      
       echo '<script type="text/javascript"> alert("USUARIO ELIMINADO.");
                                 window.location.href="index.php?cnt=Usuarios&act=Inicio"; </script>';


  }
  
}
?>
