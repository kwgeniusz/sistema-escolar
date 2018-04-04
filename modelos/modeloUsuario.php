<?php


class modeloUsuario{


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
    
     function verificarLogin($usuario,$contra)
    {
    $sql = "SELECT * FROM usuario WHERE login = '$usuario' and pass = '$contra'"; 
    $resultSet = mysql_query($sql,$this->idConn); 
    return $resultSet;
            
   }
        function listarUsuarios()
    {
      $sql = "SELECT * FROM usuario ";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

      function obtenerDatos($usuario)
      {	 
      $sql = "SELECT * FROM usuario
		 WHERE login = '$usuario'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }
    function insertarUsuario($usuario,$pass,$nombreApellido,$privilegios)
    {
      $sql = "INSERT INTO usuario (login,pass,usr_nombre,usr_nivel) VALUES ('$usuario',MD5('$pass'),'$nombreApellido','$privilegios')";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
      function eliminarUsuario($usuario) 
    {
    $sql = "DELETE FROM usuario      
               WHERE login= '$usuario'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      
    }

    function modificarUsuario($usuario,$nombreApellido,$privilegios)
    {
   $sql = "UPDATE usuario SET usr_nombre='$nombreApellido',usr_nivel='$privilegios'
               WHERE login = '$usuario'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
    }
    
        function cambiarContrasena($usuario,$pass)
    {
   $sql = "UPDATE usuario SET pass='$pass'
               WHERE login = '$usuario'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
    }
}

?>
