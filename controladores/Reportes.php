<?php



class Reportes {

  public function nominaRepresentantes() {
  
  require "classes/classVista.php";
  require "modelos/modeloReporte.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";
    
     $oConsulta = new modeloReporte($idConn);
     $rs = $oConsulta->periodosDisponibles();
     

        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
     {
                $item[]  = $rows;
     }
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Reportes -<br>'Nomina de Representantes'";
    session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 
      
    $datos["ano_escolar"] = "";
    $datos["item"] = $item;
    
  // SAlida de la vista
  $oSalida = new Vista("reportes_nominaRepresentantes.php",$datos); 
  }

/**____________________IMPRIMIR NOMINA DE REPRESENTANTES POR AÑO ESCOLAR Y AULA.______________________________ **/
  public function nominaRepresentantes2() {
  
    require "db/dbConnect.php";
    require "modelos/modeloReporte.php";
    require "modelos/modeloAula.php";
    require "lib/dompdf/dompdf_config.inc.php";

       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }

       $cuenta_registros=0;
       
   if ($grado =="PREESCOLAR" AND $seccion == "C") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
     if ($grado =="PREESCOLAR" AND $seccion == "D") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
     $oConsulta = new modeloAula($idConn);
     $rs1 = $oConsulta->obtenerId($grado,$seccion);
     
      while ($rows = mysql_fetch_array($rs1)){ 
                  $id_aula  = $rows['id_aula'];
                  }
     $oConsulta = new modeloReporte($idConn);
     $rs2 = $oConsulta->nominaRepresentante($id_aula,$ano_escolar);  
     
      while ($rows = mysql_fetch_array($rs2)) {
                  $item[]  = $rows;
                  $cuenta_registros = $cuenta_registros +1;
                  }
 
    /* Validacion  */ 
    if ($cuenta_registros == 0) {
        echo "<script type='text/javascript'> alert('NO EXISTE REPORTES PARA \"$grado - $seccion\" EN EL PERIODO ESCOLAR: \"$ano_escolar\"'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
    }    
   else
    {

  $acum = 0;
  
    
$html="<html>
<head>
<style>

html{ 
   font-family: arial;
   font-size:14px;
   }
   
 img {
 width:11%;
 margin-left:3%;
 position:absolute;
 
 }
 
 table {
 margin: 0 auto;
 border-collapse: collapse; 
 font-size:12px;
 width:95%;
  }
   
</style>
</head>

<body>

<img src='inc/img/logo.jpg'>

<center><h4><b>
REPUBLICA BOLIVARIANA DE  VENEZUELA<br>
MINISTERIO DEL PODER POPULAR PARA LA  EDUCACI&Oacute;N<br>             
SECRETAR&Iacute;A REGIONAL DE EDUCACION<br>
ESCUELA PRIMARIA BOLIVARIANA \"ANDRES ELOY BLANCO\"<br>
SAN FERNANDO EDO-APURE  
</b></h4></center>

<b>N&oacute;mina De Representantes: A&ntilde;o Escolar: <u>\"$ano_escolar\"</u>  Grado: <u>\"$grado\"</u>  Secci&oacute;n: <u>\"$seccion\"</u>  Docente:__________________</b>
<br><br>
</b>
<table border='1' >

<tr>
<th>N*
<th>C.I
<th>NOMBRE Y APELLIDO
<th>ESTADO CIVIL
<th>TELEFONO
<th>VINCULO CON EL NI&Ntilde;O
<th colspan=2 >REPRESENTADO
<th>CEDULA ESCOLAR
</tr>";

    foreach($item as $filas)
   {
     $acum = $acum +1;
     
     $numero       = $acum;
     $cedula_r     = $filas['cedula_r'];
     $nombre_r     = $filas['nombre_r'];
     $apellido_r   = $filas['apellido_r'];
     $estado_civil = $filas['estado_civil'];
     $telefono     = $filas['telefono'];
     $vinculo_r    = $filas['vinculo_r'];
     $cedula_es    = $filas['cedula_es'];
     $nombre_es    = $filas['nombre_es'];
     $apellido_es  = $filas['apellido_es'];
    
 $html.="<tr>
  <td align='center'>$numero
  <td align='center'>$cedula_r
  <td align='center'>$nombre_r $apellido_r
  <td align='center'>$estado_civil
  <td align='center'>$telefono
  <td align='center'>$vinculo_r
  <td align='center'>$apellido_es 
  <td align='center'>$nombre_es
  <td align='center'>$cedula_es "; 
  
  }

  $html.="</table>
  <br>
  </body>
  </html>";

$html= utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->set_paper("A4", "landscape");
$dompdf->load_html($html);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("Nomina de Representantes.pdf") ;

  }
 } 
/**____________________NATRICULA DE ESTUDIANTES POR AULA Y AÑO ESCOLAR.______________________________ **/
  public function matriculaEstudiantes() {
  
  require "classes/classVista.php";
  require "modelos/modeloReporte.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";
    
     $oConsulta = new modeloReporte($idConn);
     $rs = $oConsulta->periodosDisponibles();
     

        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
     {
                $item[]  = $rows;
     }
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Reportes -<br>'Matricula de Estudiantes'";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 

    $datos["ano_escolar"] = "";
    $datos["item"] = $item;
    

  // SAlida de la vista
  $oSalida = new Vista("reportes_matriculaEstudiantes.php",$datos); 
  }
  
  public function matriculaEstudiantes2() {
  
    require "db/dbConnect.php";
    require "modelos/modeloReporte.php";
    require "modelos/modeloAula.php";
    require "lib/dompdf/dompdf_config.inc.php";
    require "inc/funciones/fecha.php";

       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
       
       $cuenta_registros=0;
       
              
   if ($grado =="PREESCOLAR" AND $seccion == "C") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
     if ($grado =="PREESCOLAR" AND $seccion == "D") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
       
     $oConsulta = new modeloAula($idConn);
     $rs1 = $oConsulta->obtenerId($grado,$seccion);
     
      while ($rows = mysql_fetch_array($rs1)){ 
                  $id_aula  = $rows['id_aula'];
                  }
     $oConsulta = new modeloReporte($idConn);
     $rs2 = $oConsulta->matriculaEstudiantes($id_aula,$ano_escolar);  
     
      while ($rows = mysql_fetch_array($rs2)) {
                  $item[]  = $rows;
                  $cuenta_registros = $cuenta_registros +1;
                  }
 
    /* Validacion  */ 
    if ($cuenta_registros == 0) {
    echo "<script type='text/javascript'> alert('NO EXISTE MATRICULA ESTUDIANTIL PARA \"$grado - $seccion\" EN EL PERIODO ESCOLAR: \"$ano_escolar\"'); window.location.href='index.php?cnt=Reportes&act=matriculaEstudiantes';</script>";   
    }
        
   else{
   
    
     require "modelos/modeloConfiguracion.php";
      $oConsulta = new modeloConfiguracion($idConn);
     $rs1 = $oConsulta->listarConfiguracion();
     
      while ($rows = mysql_fetch_array($rs1)){ 
                   $director  = $rows['director'];
                   $cedula_director  = $rows['cedula_director'];
                  }

    $acum = 0;
  
$html="<html>
<head>
<style>

   html{ 
   font-family: arial;
   font-size:12px;
   }
   
 img {
 width:44%;
 height:20%;
 position:absolute;
 }
 
 table.datos {
 margin: 0 auto;
 border-collapse: collapse; 
 font-size:10px;
  width:100%;
  } 
  
   table.tabla1 {
 border-collapse: collapse; 
 font-size:10px;


  } 
     table.tabla2 {
 border-collapse: collapse; 
 font-size:10px;
  } 
 
  
 p.margenIzquierdo{
 margin-left:45%;
 }
 
  p.izquierda{
 text-align:right;
 }
 
  p.justificado1{
 text-align:justify;
 }
   
</style>
</head>

<body>

<img src='inc/img/ministerio.jpg' >



<p class=margenIzquierdo><b>
MATRICULA INICIAL (Preescolar, I y II Etapa Educaci&oacute;n B&aacute;sica)<BR>
I. A&ntilde;o Escolar:_________________________<u>$ano_escolar</u>__________<BR>
Mes y A&ntilde;o de la Matr&iacute;cula:_______<u>$mes_nombre $year</u>_____ <BR>
Tipo de Matr&iacute;cula: CONVENCIONAL (___)NO CONVENCIONAL(___) <BR> 
</p></u>


<b>II. Datos del Plantel:</u><br>	

<p class=justificadoa1>																						
<b>C&oacute;d. DEA:</b>________<u>OD07140407</u>__________  <b>Nombre:</b>________<u>E.P.B. Andr&eacute;s Eloy Blanco</u>________	<b>Dtto.Esc.:</b>_______<u>07</u>___________					
<b>Direcci&oacute;n:</b>__________________<u>Barrio Jos&eacute; Antonio P&aacute;ez</u>__________________ 	<b>Tel&eacute;fono:</b>____________<u>0247 - 3423121</u>______________								
<b>Municipio:</b>_________<u>San Fernando</u>__________	<b>Entidad Federal:</b>___________<u>Apure</u>____________			<b>Zona Educativa:</b>____<u>Apure</u>_______					
</p>

<p>
<b>III. Identificaci&oacute;n del Curso: Plan de Estudio:</b>__________________<u>Educaci&oacute;n Primaria</u>_____________	<b>COD:	</b>________<u>20000</u>________						
<b>Grado:</b><u>$grado</u>     <b>Secci&oacute;n:</b><u>$seccion</u>		  <b>N&uacute;mero de Alumnos de la Secci&oacute;n:</b><u>$cuenta_registros</u>	<b>Numero de Alumnos de esta p&aacute;g:</b><u>$cuenta_registros</u>
<br><br>
<b>IV. Datos de Identificaci&oacute;n del Alumno:</b>																										

<table class='datos' border='1' >
<tr>
<th>N*
<th>CEDULA ESCOLAR
<th>APELLIDOS
<th>NOMBRE
<th>SEXO
<th>FECHA DE NACIMIENTO
<th>ESCOLARIDAD

</tr>";

   foreach($item as $filas)
   {
     $acum = $acum +1;
     
     $numero        = $acum;
     $cedula_es     = $filas['cedula_es'];
     $nombre_es     = $filas['nombre_es'];
     $apellido_es   = $filas['apellido_es'];
     $sexo          = $filas['sexo'];
     $fecha_nacimiento = $filas['fecha_nacimiento'];
     $escolaridad   = $filas['escolaridad'];
  
 $html.="<tr>
  <td align='center'>$numero
  <td align='center'>$cedula_es
  <td align='center'>$apellido_es
  <td align='center'>$nombre_es
  <td align='center'>$sexo
  <td align='center'>$fecha_nacimiento
  <td align='center'>$escolaridad 
  </tr>"; 
  
  }

  $html.="</table>
  <BR>
 V. Observaciones:_____________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________																						
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________	
 <br><br>
 <table align=left class='tabla1' border='1' width ='45%'> 
<tr>
  <th colspan='2' ><b>Fecha de Remision</b></th>
<tr>
  <td><b>Director(a):</b>
  <td class=sello rowspan='7' align=center > SELLO DEL PLANTEL
<tr>
  <td>Apellidos y Nombres:
<tr>
  <td align=center>$director
<tr>
  <td >Numero de C.I:
<tr>
  <td align=center>$cedula_director
<tr>
  <td>Firma:
<tr>
  <td align=center>___________________
  </table>
  
  
   <table align=right class='tabla2' border='1' width ='50%'>
<tr>
  <th colspan='2' ><b>Fecha de Recepcion</b></th>
<tr>
  <td><b>Funcionario Receptor:</b>
  <td class=sello rowspan='7' align=center> SELLO DEL PLANTEL
<tr>
  <td>Apellidos y Nombres:
<tr>
  <td align=center>________________________
<tr>
  <td>Numero de C.I:
<tr>
  <td align=center>_______________________
<tr>
  <td>Firma:
<tr>
  <td align=center>________________________
  </table>
  </body>
  </html>";

$html= utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->set_paper("A4", "portrait");
$dompdf->load_html($html);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("Matricula De Alumnos.pdf") ;

  }
 } 
  
  /**____________________IMPRIMIR RENDIMIENTO DE TODOS LOS ESTUDIANTES POR AÑO ESCOLAR Y AULA.______________________________ **/
  public function rendimientoEstudiantil() {
  
  require "classes/classVista.php";
  require "modelos/modeloReporte.php";
  require "db/dbConnect.php";
  require "inc/config/valores_generales.php";
    
     $oConsulta = new modeloReporte($idConn);
     $rs = $oConsulta->periodosDisponibles();
     

        $item =array();
    while ($rows = mysql_fetch_array($rs)) 
     {
                $item[]  = $rows;
     }
  
    // parametros para la vista 
     $datos["titulo"] = $nombre_nav_aplicacion ;
     $datos["titulo1"] = $titulo_aplicacion;
     $datos["titulo2"] = "- Reportes -<br>'Rendimiento Estudiantil'";
       session_start();
      $datos['nombre_usuario'] = $_SESSION["nombreSesion"];
      $datos['nivel_usuario']  = $_SESSION["nivelSesion"] ; 

    $datos["ano_escolar"] = "";
    $datos["item"] = $item;
    

  // SAlida de la vista
  $oSalida = new Vista("reportes_rendimientoEstudiantil.php",$datos); 
  }
  
 public function rendimientoEstudiantil2() {
 
    require "db/dbConnect.php";
    require "modelos/modeloReporte.php";
    require "modelos/modeloAula.php";
    require "lib/dompdf/dompdf_config.inc.php";
    require "inc/funciones/fecha.php";

       // LECTURA DE DATOS DEL FORMULARIO
    foreach ($_POST as $clave => $valor) {
      $$clave = $valor;
      $datos[$clave] = $valor;
    }
       
       $cuenta_registros=0;
                            
   if ($grado =="PREESCOLAR" AND $seccion == "C") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
     if ($grado =="PREESCOLAR" AND $seccion == "D") {
        echo "<script type='text/javascript'> alert('- NO EXISTE ESTA SECCION DE $grado -'); window.location.href='index.php?cnt=Reportes&act=nominaRepresentantes';</script>";   
   }
       
     $oConsulta = new modeloAula($idConn);
     $rs1 = $oConsulta->obtenerId($grado,$seccion);
     
      while ($rows = mysql_fetch_array($rs1)){ 
                  $id_aula  = $rows['id_aula'];
                  }
       $oConsulta = new modeloReporte($idConn);
       $rs2 = $oConsulta->rendimientoEstudiantil($id_aula,$ano_escolar);
        
      while ($rows = mysql_fetch_array($rs2)) {
                  $item[]  = $rows;
                  $cuenta_registros = $cuenta_registros +1;
                  }
 
    /* Validacion  */ 
    if ($cuenta_registros == 0) {

    echo "<script type='text/javascript'> alert('NO EXISTE ESTE TIPO DE REPORTE PARA \"$grado - $seccion - \" EN EL PERIODO ESCOLAR: \"$ano_escolar\"'); window.location.href='index.php?cnt=Reportes&act=rendimientoEstudiantil';</script>";   
       }
        
   else{
   
     require "modelos/modeloConfiguracion.php";
      $oConsulta = new modeloConfiguracion($idConn);
     $rs = $oConsulta->listarConfiguracion();
     
      while ($rows = mysql_fetch_array($rs)){ 
                   $director  = $rows['director'];
                   $cedula_director  = $rows['cedula_director'];
                  }
             $acum = 0;

$html="<html>
<head>
<style>

   html{ 
   font-family: arial;
   font-size:12px;
   }
   
 img {
 width:44%;
 height:20%;
 position:absolute;
 }
 
 table.datos {
 margin: 0 auto;
 border-collapse: collapse; 
 font-size:10px;
  width:100%;
  } 
  
   table.tabla1 {
 border-collapse: collapse; 
 font-size:10px;


  } 
     table.tabla2 {
 border-collapse: collapse; 
 font-size:10px;
  } 
 
  
 p.margenIzquierdo{
 margin-left:45%;
  text-align:center;
 }
 
  p.izquierda{
 text-align:right;
 }
 
  p.justificado1{
 text-align:justify;
 }
   
</style>
</head>

<body>

<img src='inc/img/ministerio.jpg' >



<p class=margenIzquierdo>
<u><b>RESUMEN FINAL DEL RENDIMIENTO ESTUDIANTIL</b></u><br>
(Educaci&oacute;n Inicial, Primaria)<BR>
C&oacute;digo del Formato: RR-DEA-06-04<BR>
<b>I. Plan de Estudio:</b>__<u>Educacion Primaria</u>__<BR> COD:<u>21000</u>
A&ntilde;o Escolar:___<u>$ano_escolar</u>__  Mes y A&ntilde;o de la Evaluaci&oacute;n:__<u>$mes_nombre $year</u>__ <BR>

</p></u>


<b>II. Datos del Plantel:</u><br>	

<p class=justificadoa1>																						
<b>C&oacute;d. DEA:</b>________<u>OD07140407</u>__________  <b>Nombre:</b>________<u>E.P.B. Andr&eacute;s Eloy Blanco</u>________	<b>Dtto.Esc.:</b>_______<u>07</u>___________					
<b>Direcci&oacute;n:</b>__________________<u>Barrio Jos&eacute; Antonio P&aacute;ez</u>__________________ 	<b>Tel&eacute;fono:</b>____________<u>0247 - 3423121</u>______________								
<b>Municipio:</b>_________<u>San Fernando</u>__________	<b>Entidad Federal:</b>___________<u>Apure</u>____________			<b>Zona Educativa:</b>____<u>Apure</u>_______					
</p>

<p>
<b>III. Identificaci&oacute;n del Curso:</b><br>				
<b>Nivel o Grado:</b>____<u>$grado</u>____    <b>Secci&oacute;n:</b>___<u>$seccion</u>___		  <b>N&uacute;mero de Alumnos de la Secci&oacute;n:</b>____<u>$cuenta_registros</u>____	<b>Numero de Alumnos de esta p&aacute;g:</b>____<u>$cuenta_registros</u>____
<br><br>
<b>IV. Resumen Final del Rendimiento:</b>																										

<table class='datos' border='1' >
<tr>
<th rowspan=3 >N*
<th rowspan=3>CEDULA ESCOLAR
<th rowspan=3>LUGAR DE NACIMIENTO
<th rowspan=3>FECHA DE NACIMIENTO
<th colspan=10>RESULTADOS DE LA EVALUACION
</tr>
<tr>
 <td  align='center' colspan=4>PREESCOLAR
 <td  align='center' colspan=6>E. PRIMARIA
 </tr>
 <tr>
 <td  align='center'>PN
 <td  align='center'>PB
 <td  align='center'>RN
 <td  align='center'>PE
 <td  align='center'>A
 <td  align='center'>B
 <td  align='center'>C
 <td  align='center'>D
 <td  align='center'>E
 <td  align='center'>F
</tr>";

   foreach($item as $filas)
   {
     $acum = $acum +1;
     
     $numero        = $acum;
     $cedula_es     = $filas['cedula_es'];
     $fecha_nacimiento =$filas['fecha_nacimiento'];
     $lugar_nacimiento =$filas['lugar_nacimiento'];
     $nota          = $filas['nota_final'];
     
      $nombre_es     = $filas['nombre_es'];
      $apellido_es   = $filas['apellido_es'];
      $sexo          = $filas['sexo'];


  
 $html.=" <tr>
  <td align='center'>$numero
  <td align='center'>$cedula_es
  <td align='center'>$lugar_nacimiento
  <td align='center'>$fecha_nacimiento";

   if($nota == 'PN'){
   $html.=" <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

     }
  
      if($nota == 'PB'){
  $html.="  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

  }
  
    if($nota == 'RN'){
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

    }
  
     if($nota == 'PE'){
   $html.=" <td align='center'> -
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

   }
  
     if($nota == 'A'){
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

   }
  
    if($nota == 'B'){
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

   }
  
    if($nota == 'C'){
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - ";

    }
  
   if($nota == 'D'){
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - 
  <td align='center'> - ";

  }
  
    if($nota == 'E'){
  $html.="  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X 
  <td align='center'> - ";

    }
   if($nota == 'F'){
 
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> X";

    }
       if($nota == ''){
 
   $html.=" <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> - 
  <td align='center'> -";

    }
  }

  $html.="</table>
  <br><br>
  <table class='datos' border='1' >
<tr>
<th>CEDULA ESCOLAR
<th>APELLIDOS
<th>NOMBRES
<th>SEXO
</tr>";
 foreach($item as $filas)
   {
     $cedula_es     = $filas['cedula_es'];
      $nombre_es     = $filas['nombre_es'];
      $apellido_es   = $filas['apellido_es'];
      $sexo          = $filas['sexo'];

 $html.=" <tr>
  <td align='center'>$cedula_es
  <td align='center'>$apellido_es
  <td align='center'>$nombre_es
  <td align='center'>$sexo
  </tr>";
  }
  
 $html.="
 <tr>
 <td colspan=2 rowspan=2 align=center>Apellidos y Nombres del Docente<BR><br>___________________________________
 <td rowspan=2 align=center>Numero de C.I<br><br>___________________________________
 <td  rowspan=2 align=center>Firma<br><br>___________________________________
 <tr>

 </table>
  <BR>
 V. Observaciones:____________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________																						
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________
 _______________________________________________________________________________________________________________________	
 <br><br>
 <table align=left class='tabla1' border='1' width ='45%'> 
<tr>
  <th colspan='2' ><b>Fecha de Remision</b></th>
<tr>
  <td><b>Director(a):</b>
  <td class=sello rowspan='7' align=center > SELLO DEL PLANTEL
<tr>
  <td>Apellidos y Nombres:
<tr>
  <td align=center>$director
<tr>
  <td >Numero de C.I:
<tr>
  <td align=center>$cedula_director
<tr>
  <td>Firma:
<tr>
  <td align=center>___________________
  </table>
  
  
   <table align=right class='tabla2' border='1' width ='50%'>
<tr>
  <th colspan='2' ><b>Fecha de Recepcion</b></th>
<tr>
  <td><b>Funcionario Receptor:</b>
  <td class=sello rowspan='7' align=center> SELLO DEL PLANTEL
<tr>
  <td>Apellidos y Nombres:
<tr>
  <td align=center>________________________
<tr>
  <td>Numero de C.I:
<tr>
  <td align=center>_______________________
<tr>
  <td>Firma:
<tr>
  <td align=center>________________________
  </table>
  </body>
  </html>";

$html= utf8_decode($html);
$dompdf=new DOMPDF();
$dompdf->set_paper("A4", "portrait");
$dompdf->load_html($html);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("Rendimiento Estudiantil.pdf") ;

  }
  
}

}
?>
