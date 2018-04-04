<?php


class modeloReporte {


   private $idConn;
  
   function __construct($idConn)
    {
      $this->idConn = $idConn;
    }

  function periodosDisponibles()
    {
      $sql = "SELECT DISTINCT ano_escolar FROM `inscripcion`";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }


    function nominaRepresentante($id_aula,$ano_escolar)
    {
      $sql = "SELECT representante.cedula_r,representante.nombre_r,representante.apellido_r,representante.estado_civil,representante.telefono,vinculo_r,estudiante.cedula_es,nombre_es,apellido_es
              FROM estudiante
              INNER JOIN representante ON estudiante.cedula_r = representante.cedula_r
              INNER JOIN inscripcion ON estudiante.cedula_es = inscripcion.cedula_es
              WHERE inscripcion.id_aula ='$id_aula' AND inscripcion.ano_escolar='$ano_escolar'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
 
 function matriculaEstudiantes($id_aula,$ano_escolar)
    {
      $sql = "SELECT inscripcion.cedula_es,estudiante.nombre_es,estudiante.apellido_es,estudiante.sexo,estudiante.fecha_nacimiento,inscripcion.escolaridad
      FROM inscripcion
      INNER JOIN estudiante ON inscripcion.cedula_es = estudiante.cedula_es
      WHERE inscripcion.id_aula ='$id_aula' AND inscripcion.ano_escolar='$ano_escolar'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }
    
     function rendimientoEstudiantil($id_aula,$ano_escolar)
    {
      $sql = "SELECT inscripcion.cedula_es,estudiante.nombre_es,estudiante.apellido_es,estudiante.sexo,estudiante.lugar_nacimiento,estudiante.fecha_nacimiento,inscripcion.escolaridad,historico.nota_final
      FROM inscripcion
      INNER JOIN estudiante ON inscripcion.cedula_es = estudiante.cedula_es
      INNER JOIN historico ON inscripcion.id_inscripcion = historico.id_inscripcion
      WHERE inscripcion.id_aula ='$id_aula' AND inscripcion.ano_escolar='$ano_escolar'";
      $resultSet = mysql_query($sql,$this->idConn);
      return $resultSet;
    }

}

?>
