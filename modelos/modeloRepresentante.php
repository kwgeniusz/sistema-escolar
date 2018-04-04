<?php


class modeloRepresentante {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }

        function listarRepresentante()
    {
      $sql = "SELECT * FROM representante ORDER BY cedula_r ASC";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

     function insertarRepresentante($cedula_r,$nombre_r,$apellido_r,$estado_civil,$direccion,$telefono)
    {
      $sql = "INSERT INTO representante (cedula_r,nombre_r,apellido_r,estado_civil,direccion,telefono) VALUES ('$cedula_r',UPPER('$nombre_r'),UPPER('$apellido_r'),'$estado_civil',UPPER('$direccion'),'$telefono')";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
      function obtenerDatos($cedula_r)
      {	 
      $sql = "SELECT * FROM representante 
		 WHERE cedula_r = $cedula_r";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }

      function borrarRepresentante($cedula_r) 
    {
    $sql = "DELETE FROM representante      
               WHERE cedula_r = '$cedula_r'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      
    }
    
      function modificarRepresentante($cedula_r,$nombre_r,$apellido_r,$estado_civil,$direccion,$telefono) 
    {
   $sql = "UPDATE representante SET nombre_r=UPPER('$nombre_r'),apellido_r=UPPER('$apellido_r'),estado_civil='$estado_civil',direccion=UPPER('$direccion'),telefono='$telefono'
               WHERE cedula_r = '$cedula_r'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
    }
    
    function verCargaEstudiantil($cedula_r)
    {
      $sql = "SELECT representante.cedula_r,representante.nombre_r,representante.apellido_r,vinculo_r,cedula_es,nombre_es,apellido_es,sexo,fecha_nacimiento,
                     lugar_nacimiento
              FROM estudiante
              INNER JOIN representante
              ON estudiante.cedula_r = representante.cedula_r
              WHERE representante.cedula_r ='$cedula_r'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }


}

?>
