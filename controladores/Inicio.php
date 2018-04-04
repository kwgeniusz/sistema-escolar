<?php
/**

  */


class Inicio {


  //  INICIO  ///
  public function go() {
  
    require "inc/config/valores_generales.php";
    require "inc/funciones/fecha.php";
    require "modelos/modeloConfiguracion.php";
    require "modelos/modeloAula.php";
    require "db/dbConnect.php";
    require "classes/classVista.php"; 
    
    $year2 = $year + 1;

    $arreglo[0] = $year." ";
    $arreglo[1] = " ".$year2;
    
    $ano_actual = implode('-',$arreglo);
    
    $oConsulta1 = new modeloConfiguracion($idConn);
    $rs = $oConsulta1->listarConfiguracion();
    
    while ($rows = mysql_fetch_array($rs)) 
     {
                $ano_escolar  = $rows['ano_escolar'];
     }
   
   if($ano_escolar < $ano_actual)
    {
          $oConsulta1-> renovarAnoEscolar($ano_actual);
          $oConsulta2 = new modeloAula($idConn);
          $rs = $oConsulta2->resetEstatus();   
    }
 
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
  session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
     
    $datos["titulo2"] = "Inicio";

  // SAlida de la vista
  $oSalida = new Vista("inicio.php",$datos); 
  }

  
}
?>
