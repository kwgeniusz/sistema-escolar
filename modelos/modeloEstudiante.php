<?php


class modeloEstudiante {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
    
        function listarEstudiantes()
    {
      $sql = "SELECT * FROM estudiante ORDER BY cedula_es ASC";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
          function listarEstudianteSinAula()
    {
      $sql = "SELECT estudiante.cedula_es,estudiante.nombre_es,estudiante.apellido_es,inscripcion.id_inscripcion
              FROM estudiante
              LEFT OUTER JOIN inscripcion
              ON estudiante.cedula_es = inscripcion.cedula_es
              WHERE inscripcion.id_inscripcion is NULL";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
     function insertarEstudiante($cedula_r,$vinculo_r,$cedula_es,$nombre_es,$apellido_es,$sexo,$fecha_nacimiento,$lugar_nacimiento)
    {
      $sql = "INSERT INTO estudiante (cedula_r,vinculo_r,cedula_es,nombre_es,apellido_es,sexo,fecha_nacimiento,lugar_nacimiento) VALUES ('$cedula_r','$vinculo_r','$cedula_es',UPPER('$nombre_es'),UPPER('$apellido_es'),'$sexo','$fecha_nacimiento',UPPER('$lugar_nacimiento'))";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    

      function borrarEstudiante($cedula_es) 
    {
    $sql = "DELETE FROM estudiante      
               WHERE cedula_es = '$cedula_es'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      
    }
    
      function modificarEstudiante($cedula_es,$nombre_es,$apellido_es,$sexo,$fecha_nacimiento,$lugar_nacimiento) 
    {
   $sql = "UPDATE estudiante SET nombre_es=UPPER('$nombre_es'),apellido_es=UPPER('$apellido_es'),sexo='$sexo',fecha_nacimiento=UPPER('$fecha_nacimiento'),lugar_nacimiento=UPPER('$lugar_nacimiento')      
               WHERE cedula_es = '$cedula_es'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
    }

      function obtenerDatos($cedula_es)
      {	 
      $sql = "SELECT * FROM estudiante 
		 WHERE cedula_es = '$cedula_es'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }
          function verificarCedula($nacionalidadCedula)
      {	 
      $sql = "SELECT * FROM estudiante 
		 WHERE cedula_es = '$nacionalidadCedula'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }


}

?>
