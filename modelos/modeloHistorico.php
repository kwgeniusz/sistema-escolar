<?php


class modeloHistorico {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }
 //------------------ME OBTIENE DATOS DE EL ESTUDIANTE DONDE SEA ESE ID INSCRIPCION----------------------------------------------   
         function MostrarEstudiantePorInscripcion($id_inscripcion)
    {
      $sql = "SELECT inscripcion.id_inscripcion,inscripcion.cedula_es,inscripcion.id_aula,estudiante.nombre_es,estudiante.apellido_es
      FROM inscripcion
      INNER JOIN estudiante ON inscripcion.cedula_es = estudiante.cedula_es
      WHERE inscripcion.id_inscripcion ='$id_inscripcion'";;
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
 //------------------INSERTA LA NOTA DE UN ESTUDIANTE POR LE ID DE LA INSCRIPCION---------------------------------------------   
 
     function insertarNotaEstudiante($id_inscripcion,$nota)
    {
      $sql = "UPDATE HISTORICO SET nota_final='$nota'   
               WHERE id_inscripcion = '$id_inscripcion'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
     function obtenerNota($id_inscripcion)
      {	 
      $sql = "SELECT nota_final FROM historico 
		 WHERE id_inscripcion = $id_inscripcion";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
      		 	 
      }

}

?>
