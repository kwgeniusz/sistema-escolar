<?php


class modeloAula {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
    
        function listarAulas()
    {
      $sql = "SELECT * FROM aula ORDER BY id_aula ASC";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

        function obtenerEstatus($id_aula)
      {	 
      $sql = "SELECT estado FROM aula 
		 WHERE id_aula = '$id_aula'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }

       function cambiarEstatus($id_aula)
      {	 
      $sql = "UPDATE aula SET estado ='LLENA' WHERE id_aula = '$id_aula'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;		 	 
      } 
        
        function resetEstatus()
      {	 
      $sql = "UPDATE aula SET estado = 'DISPONIBLE'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;	 	 
      }
      
      function obtenerId($grado,$seccion)
      {	 
      $sql = "SELECT id_aula FROM aula 
		 WHERE grado = '$grado' AND seccion = '$seccion'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }


}

?>
