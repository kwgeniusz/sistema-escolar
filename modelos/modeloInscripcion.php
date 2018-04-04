<?php


class modeloInscripcion {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
 //------------------ME LISTA LA MATRICULA DE ALUMNOS DE UN AULA X----------------------------------------------   
         function listarInscripcionesAula($id_aula,$ano_escolar)
    {
      $sql = "SELECT historico.nota_final,inscripcion.id_inscripcion,inscripcion.cedula_es,estudiante.cedula_r,estudiante.nombre_es,estudiante.apellido_es,inscripcion.escolaridad
      FROM inscripcion
      INNER JOIN estudiante ON inscripcion.cedula_es = estudiante.cedula_es
      INNER JOIN historico  ON inscripcion.id_inscripcion = historico.id_inscripcion
      WHERE inscripcion.id_aula ='$id_aula' AND inscripcion.ano_escolar='$ano_escolar'";;
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
//ESTAS VAN JUNTAS( REALIZA LA INCLUSION DE UN ALUMNO AL AULA, LUEGO CONSULTA EL ID DE ESA INSCRIPCION, PARA INSERTARLO EN LA TABLA HISTORICO 
//Y ABRIR EL HISTORICO DEL ESTUDIANTE )----------------------------------------------------------------
     function insertarInscripcion($id_aula,$cedula_es,$escolaridad,$ano_escolar)
    {
      $sql = "INSERT INTO inscripcion (id_aula,cedula_es,escolaridad,ano_escolar) VALUES ('$id_aula','$cedula_es',UPPER('$escolaridad'),'$ano_escolar')";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
      function buscarInscripcionReciente($cedula_es,$ano_escolar)
    {
      $sql = "SELECT id_inscripcion FROM inscripcion WHERE cedula_es ='$cedula_es' AND ano_escolar='$ano_escolar'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
     function insertarHistorico($id_inscripcion)
    {
      $sql = "INSERT INTO historico (id_inscripcion) VALUES ('$id_inscripcion')";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
 //----------------------------------------------------------------  
        function borrarInscripcion($cedula_es) 
    {
    $sql = "DELETE * FROM inscripcion      
               WHERE cedula_es = '$cedula_es'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      
    }
//------------------ESTA VERIFICA SI YA UN ALUMNO ESTA INSCRITO EN UN AÑO ESCOLAR----------------------------------------------  
         function verificarInscripcion($cedula_es,$ano_escolar)
    {
      $sql = "SELECT * FROM inscripcion WHERE cedula_es ='$cedula_es' AND ano_escolar='$ano_escolar'";;
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
//------------------USADO PARA CONTAR EL NUMERO DE INSCRITOS EN UN AULA----------------------------------------------    
       function contarInscripciones($id_aula,$ano_escolar)
    {
      $sql = "SELECT COUNT(*) As Total 
              FROM inscripcion
              WHERE id_aula ='$id_aula' and ano_escolar='$ano_escolar'";;
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

  

}

?>
