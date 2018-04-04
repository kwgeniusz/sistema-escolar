<?php


class modeloConfiguracion {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
    
        function listarConfiguracion()
    {
      $sql = "SELECT * FROM configuracion ";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
     function modificarConfiguracion($director,$cedula_director,$cargar_notas)
    {
      $sql = "UPDATE configuracion SET director='$director',cedula_director='$cedula_director',cargar_notas='$cargar_notas'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
     function renovarAnoEscolar($ano_actual)
    {
      $sql = "UPDATE configuracion SET ano_escolar='$ano_actual'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

}

?>
