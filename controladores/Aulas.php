<?php



class Aulas {

/**____________________INICIO______________________________ **/
/* --------------LISTA TODAS LAS AULAS Y MUESTRA LA MATRICULA DE ALUMNOS...------------*/  
    public function inicio() {

   require "classes/classVista.php";
   require "modelos/modeloConfiguracion.php";
   require "modelos/modeloInscripcion.php";
   require "modelos/modeloAula.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
    $oConsulta = new modeloConfiguracion($idConn);
    $rs = $oConsulta->listarConfiguracion();
    
    while ($rows = mysql_fetch_array($rs)) 
       {
           $ano_escolar = $rows['ano_escolar'];
       }
       
         $oConsulta1 = new modeloAula($idConn);
    $rs = $oConsulta1->listarAulas();
    
        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
     {
                $item[]  = $rows;
     }
    /* --------------AQUI SACO EL ID DE LAS AULAS Y EL ESTADO (DISPONIBLE O LLENA).------------*/  
     foreach($item as $row) {

           if($row['id_aula'] <= '1D' ) {
              $primero[] = $row['id_aula'];
              $estado_primero[] = $row['estado'];
           }
            if($row['id_aula'] >'1D' and $row['id_aula'] <= '2D' ) {
              $segundo[] = $row['id_aula'];
                 $estado_segundo[] = $row['estado'];
           }
           if($row['id_aula'] >'2D' and $row['id_aula'] <= '3D' ) {
              $tercero[] = $row['id_aula'];
                 $estado_tercero[] = $row['estado'];
           }
            if($row['id_aula'] >'3D' and $row['id_aula'] <= '4D' ) {
              $cuarto[] = $row['id_aula'];
                 $estado_cuarto[] = $row['estado'];
           }
             if($row['id_aula'] >'4D' and $row['id_aula'] <= '5D' ) {
              $quinto[] = $row['id_aula'];
                 $estado_quinto[] = $row['estado'];
           }
             if($row['id_aula'] >'5D' and $row['id_aula'] <= '6D' ) {
              $sexto[] = $row['id_aula'];
                 $estado_sexto[] = $row['estado'];
           } 
            if($row['id_aula'] >'6D' and $row['id_aula'] <= 'P2' ) {
              $preescolar[] = $row['id_aula'];
                 $estado_preescolar[] = $row['estado'];
           } 
     }
     
     /* --------------AQUI SACO LA CANTIDAD DE ALUMNOS QUE AHI EN LAS AULAS.------------*/      
$oConsulta2 = new modeloInscripcion($idConn);
      /* --------------PREESCOLAR.------------*/   
    for($i=0;$i<=1;$i++){    
    $rs = $oConsulta2->contarInscripciones($preescolar[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_preescolar[] = $rows['Total'];
  }  
     /* --------------PRIMER GRADO.------------*/  
     for($i=0;$i<=3;$i++){
   $rs = $oConsulta2->contarInscripciones($primero[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_primero[] = $rows['Total'];
}
     /* --------------SEGUNDO GRADO.------------*/  
      for($i=0;$i<=3;$i++){        
            $rs = $oConsulta2->contarInscripciones($segundo[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_segundo[] = $rows['Total'];
  }      
       /* --------------TERCER GRADO.------------*/   
     for($i=0;$i<=3;$i++){       
         $rs = $oConsulta2->contarInscripciones($tercero[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_tercero[] = $rows['Total'];
  }  
       /* --------------CUARTO GRADO.------------*/   
     for($i=0;$i<=3;$i++){    
          $rs = $oConsulta2->contarInscripciones($cuarto[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_cuarto[] = $rows['Total'];
    }       
       /* --------------QUINTO GRADO.------------*/   
    for($i=0;$i<=3;$i++){     
    $rs = $oConsulta2->contarInscripciones($quinto[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_quinto[] = $rows['Total'];
   }        
      /* --------------SEXTO GRADO.------------*/   
     for($i=0;$i<=3;$i++){   
    $rs = $oConsulta2->contarInscripciones($sexto[$i],$ano_escolar);
      while ($rows = mysql_fetch_array($rs)) 
           $matricula_sexto[] = $rows['Total'];
   }
/* -----------------------------LLEVA EL CONTROL DEL ESTATUS DEL AULA (LLENA) "TENGO QUE TRATAR DE QE LA COMPARACION NO SEA ESA PARA QUE NO HAGA UNA INSERCION CADA VEZ QUE ENTRO A ESTA FUNCION"--------------------------------*/      
    
    for($i=0;$i<=1;$i++){ 
 if($estado_preescolar[$i] == 'DISPONIBLE'){   
   if($matricula_preescolar[$i] == 30){
       $oConsulta1->cambiarEstatus($preescolar[$i]);
       $estado_preescolar[$i] = 'LLENA';
     }
   }    
 }     
   for($i=0;$i<=3;$i++){
 if($estado_primero[$i] == 'DISPONIBLE'){     
   if($matricula_primero[$i] == 30){
       $oConsulta1->cambiarEstatus($primero[$i]);  
      $estado_primero[$i] = 'LLENA';
     }
   }  
 if($estado_segundo[$i] == 'DISPONIBLE'){       
   if($matricula_segundo[$i] == 30){
       $oConsulta1->cambiarEstatus($segundo[$i]);
      $estado_segundo[$i] = 'LLENA';
     }
   }  
 if($estado_tercero[$i] == 'DISPONIBLE'){     
   if($matricula_tercero[$i] == 30){
       $oConsulta1->cambiarEstatus($tercero[$i]);
     $estado_tercero[$i] = 'LLENA';
     }
   }
 if($estado_cuarto[$i] == 'DISPONIBLE'){       
   if($matricula_cuarto[$i] == 30){
       $oConsulta1->cambiarEstatus($cuarto[$i]);
      $estado_cuarto[$i] = 'LLENA';
     }
   }
 if($estado_quinto[$i] == 'DISPONIBLE'){       
   if($matricula_quinto[$i] == 30){
       $oConsulta1->cambiarEstatus($quinto[$i]);
      $estado_quinto[$i] = 'LLENA';
     }
  }
 if($estado_sexto[$i] == 'DISPONIBLE'){       
   if($matricula_sexto[$i] == 30){
       $oConsulta1->cambiarEstatus($sexto[$i]);
       $estado_sexto[$i] = 'LLENA';
     }
   }  
             
 }                          
    // parametros para la vista 
      $datos["titulo"] = $nombre_nav_aplicacion ;
      $datos["titulo1"] = $titulo_aplicacion;
      $datos["titulo2"] = "- Aulas - <br>'Lista de Aulas'";
      session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
      $datos["ano_escolar"] = $ano_escolar;     
        
      $datos["preescolar"] = $preescolar;    
      $datos["estado_preescolar"] = $estado_preescolar;
      $datos["matricula_preescolar"] = $matricula_preescolar;
      
      $datos["primero"] = $primero;
      $datos["estado_primero"] = $estado_primero;
      $datos["matricula_primero"] = $matricula_primero;
      
      $datos["segundo"] = $segundo;
      $datos["estado_segundo"] = $estado_segundo;
      $datos["matricula_segundo"] = $matricula_segundo;
            
      $datos["tercero"] = $tercero;
      $datos["estado_tercero"] = $estado_tercero;
      $datos["matricula_tercero"] = $matricula_tercero;
      
      $datos["cuarto"] = $cuarto; 
      $datos["estado_cuarto"] = $estado_cuarto;
      $datos["matricula_cuarto"] = $matricula_cuarto; 
       
      $datos["quinto"] = $quinto;
      $datos["estado_quinto"] = $estado_quinto;
      $datos["matricula_quinto"] = $matricula_quinto;
      
      $datos["sexto"] = $sexto;    
      $datos["estado_sexto"] = $estado_sexto;
      $datos["matricula_sexto"] = $matricula_sexto;
      
  // SAlida de la vista
  
  $oSalida = new Vista("aulas_inicio.php",$datos); 
  }

 /* --------------LISTAR ESTUDIANTES POR AULA ESCOGIDA-----------*/  
  public function listarEstudiantesPorAula() {
  
   require "classes/classVista.php";
   require "modelos/modeloAula.php";
   require "modelos/modeloConfiguracion.php";
   require "modelos/modeloInscripcion.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
     $id_aula = $_GET['id'];
     
    $oConsulta = new modeloConfiguracion($idConn);
    $rs = $oConsulta->listarConfiguracion();
    
    while ($rows = mysql_fetch_array($rs)) 
       {
           $ano_escolar = $rows['ano_escolar'];
           $vCargarNotas = $rows['cargar_notas'];
       } 
       
       $oConsulta = new modeloAula($idConn);
   $rs = $oConsulta->obtenerEstatus($id_aula);
   
     while ($rows = mysql_fetch_array($rs)) 
       {
           $estado_aula = $rows['estado'];
       }    
       
   $oConsulta = new modeloInscripcion($idConn);
   $rs = $oConsulta->listarInscripcionesAula($id_aula,$ano_escolar);
  
      $item =array();
     while ($rows = mysql_fetch_array($rs)) 
      {
          $item[]  = $rows;
      }
   
    // parametros para la vista 
    $datos["titulo"] = $nombre_nav_aplicacion ;
    $datos["titulo1"] = $titulo_aplicacion;
    $datos["titulo2"] = "- Aulas - <br>'Matricula de Estudiantes Por Aula'";
      session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $datos["v"] = "";  
    $datos["id_aula"] = $id_aula; 
    $datos["estado_aula"] = $estado_aula;   
    
    $datos["vCargarNotas"] = $vCargarNotas; 
    $datos["ano_escolar"] = $ano_escolar;
    
    $datos["item"] = $item;  
     
     
   $oSalida = new Vista("aulas_listarEstudiantes.php",$datos); 

  }
/**____________________AGREGA UN ESTUDIANTE A UN AULA.______________________________ **/
   public function agregarEstudiante() {
  
   require "classes/classVista.php";
   require "modelos/modeloEstudiante.php";
   require "modelos/modeloConfiguracion.php";
   require "modelos/modeloInscripcion.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
     $id_aula = $_GET['id'];
 
    $oConsulta = new modeloConfiguracion($idConn);
    $rs = $oConsulta->listarConfiguracion();
    
        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
       {
           $ano_escolar = $rows['ano_escolar'];
       }
       
     $oConsulta = new modeloEstudiante($idConn);
    $rs = $oConsulta->listarEstudianteSinAula();
    
        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
       {
           $item[] = $rows;
       }
   
    // parametros para la vista 
    $datos["titulo"] = $nombre_nav_aplicacion ;
    $datos["titulo1"] = $titulo_aplicacion;
    $datos["titulo2"] = "- Aulas - <br>'Asignar Estudiante'";
      session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $datos["errorCedula"] = "";
    $datos["errorEscolaridad"] = "";   
    
    $datos["v"] = "";
    $datos["cedula_es"] = "";
    $datos["escolaridad"] = "";   
    
    $datos["ano_escolar"] = $ano_escolar;
    $datos["id_aula"] = $id_aula;  
    
     $datos["item"] = $item;  
     
   $oSalida = new Vista("aulas_agregarEstudiante.php",$datos); 

  }
  /* --------------PASO 2------------*/
  public function agregarEstudiante2() {
  
   require "classes/classVista.php";
   require "modelos/modeloEstudiante.php";
   require "modelos/modeloConfiguracion.php";
   require "modelos/modeloInscripcion.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
     $id_aula = $_GET['id'];
 
    $oConsulta = new modeloConfiguracion($idConn);
    $rs = $oConsulta->listarConfiguracion();
    
        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
       {
           $ano_escolar = $rows['ano_escolar'];
       }
       
         $oConsulta = new modeloEstudiante($idConn);
    $rs = $oConsulta->listarEstudianteSinAula();
    
        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
       {
           $item[] = $rows;
       }
   
    // parametros para la vista 
    $datos["titulo"] = $nombre_nav_aplicacion ;
    $datos["titulo1"] = $titulo_aplicacion;
    $datos["titulo2"] = "- Aulas - <br>'Asignar Estudiante'";
      session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
        
       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
    
    $errorCedula = "";
    $errorEscolaridad = "";
    
      $errorV = 0;
    	$cedula_verificacion = 0;

    	$oConsulta= new modeloInscripcion($idConn);
    	
    	if($cedula_es != 0)
   {
      $result = $oConsulta->verificarInscripcion($cedula_es,$ano_escolar);
       
          while($reg= mysql_fetch_array($result))
           {
               $cedula_verificacion = $reg['cedula_es'];
           }
   }
   
	/* Validacion de cedula de estudiante  */

     if ($cedula_verificacion > 0) {
       $errorV = 1;
       $errorCedula = "Ya Este Estudiante Esta Inscrito En Un Aula";
    } 

    /* Validacion de nombre */ 
    if ($escolaridad == "" OR $escolaridad== " ") {
       $errorV = 1;
       $errorEscolaridad = "Este Campo no Puede Estar Vacio";
    } 

   
//PRIMER IF
      if ($errorV == 0)
    { 
      $oConsulta->insertarInscripcion($id_aula,$cedula_es,$escolaridad,$ano_escolar);
      
      $rs = $oConsulta->buscarInscripcionReciente($cedula_es,$ano_escolar);    
       
        while ($rows = mysql_fetch_array($rs)){ 
           $id_inscripcion = $rows['id_inscripcion'];}

      $oConsulta-> insertarHistorico($id_inscripcion);
    ?> 
                <script type="text/javascript"> 
                 <!-----FUNCION PARA RECARGAR LA PAGINA PRINCIPAL----------->
                   parent.opener.location = 'index.php?cnt=Aulas&act=listarEstudiantesPorAula&id=<?php echo $id_aula;?>';
                   t = setTimeout("self.close()",8000);
                   window.close()
                 </script>  
    <?php  
     }
//ELSE DEL PRIMER IF
   else
      {
    $datos["cedula_es"] = $cedula_es;
    $datos["escolaridad"] = $escolaridad;
    
    $datos["errorCedula"] = $errorCedula;
    $datos["errorEscolaridad"] = $errorEscolaridad;  
    
    $datos["ano_escolar"] = $ano_escolar;
    $datos["id_aula"] = $id_aula;    
    
    $datos["item"] = $item;    
     
   $oSalida = new Vista("aulas_agregarEstudiante.php",$datos); 

     }
  }
 /* --------------CARGAR NOTA DE UN ESTUDIANTE, POR AULA-------------*/  
  public function cargarNota() {
  
   require "classes/classVista.php";
   require "modelos/modeloConfiguracion.php";
   require "modelos/modeloHistorico.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
     $id_inscripcion = $_GET['id_inscripcion'];
 
    $oConsulta = new modeloConfiguracion($idConn);
    $rs = $oConsulta->listarConfiguracion();
    
    while ($rows = mysql_fetch_array($rs)) 
       {
           $ano_escolar = $rows['ano_escolar'];
       }
       
   $oConsulta = new modeloHistorico($idConn);
   $rs = $oConsulta->obtenerNota($id_inscripcion);
  
  $item =array();
  while ($rows = mysql_fetch_array($rs)) 
   {
          $nota  = $rows['nota_final'];
   }
        
   $rs = $oConsulta->mostrarEstudiantePorInscripcion($id_inscripcion);
  
  $item =array();
  while ($rows = mysql_fetch_array($rs)) 
   {
          $item[]  = $rows;
   }
   
  
    // parametros para la vista 
    $datos["titulo"] = $nombre_nav_aplicacion ;
    $datos["titulo1"] = $titulo_aplicacion;
    $datos["titulo2"] = "- Aulas - <br>'Cargar Notas'";
      session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
    
    $datos["ano_escolar"] = $ano_escolar;

    $datos["item"] = $item;
     $datos["nota"] = $nota;  
     
   $oSalida = new Vista("aulas_cargarNota.php",$datos); 
  }

 public function cargarNota2() {
  
   require "classes/classVista.php";
   require "modelos/modeloHistorico.php";
   require "db/dbConnect.php";
   require "inc/config/valores_generales.php";
 
     $id_aula = $_GET['id_aula'];
     $id_inscripcion = $_GET['id_inscripcion'];
     $nota = $_POST['nota'];
     
   $oConsulta = new modeloHistorico($idConn);
   $rs = $oConsulta->insertarNotaEstudiante($id_inscripcion,$nota);
  
               
         // SAlida de la vista
         echo "<script type='text/javascript'> alert('NOTA CARGADA CORRECTAMENTE.');
                                 window.location.href='index.php?cnt=Aulas&act=listarEstudiantesPorAula&id=$id_aula'; </script>";
  }


}
?>
