<?php

 foreach($item as $row) {
  
    $cedula_es = $row['cedula_es'];
    $nombre_es =$row['nombre_es'];
    $apellido_es = $row['apellido_es'];
    
    $id_aula = $row['id_aula'];
    $id_inscripcion= $row['id_inscripcion'];
     
   }
   
$cargaNota2 ="index.php?cnt=Aulas&act=cargarNota2&id_aula=$id_aula&id_inscripcion=$id_inscripcion";

?>

<?php include("inc/config/menu.php");?>

<br>
<b><u>- Periodo Escolar:</u> <?php echo $ano_escolar.".";?></b>

<center>
<h3><u>Nombre Completo:</U> <?php echo $apellido_es." ".$nombre_es;?><BR>
    <u>Cedula Escolar:</U>  <?php echo $cedula_es;?> <br>
    <u>Estudiante De:</U>  <?php echo $id_aula;?> </H3>

<form name="form" action=<?php echo $cargaNota2; ?> method="post"  >
<div id="datatableNotas">
 <table border=1 align=center>
        <?php  
        
if($id_aula == "P1" or $id_aula == "P2"){

    echo"<tr>
       <th>PN</th><th>PB</th><th>RN</th><th>PE</th>
        <tr align=center> ";

    if($nota == "PN") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PN' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PN'> </TD>";
                    }
                    
    if($nota == "PB") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PB' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PB'> </TD>";
                    }
    
     if($nota == "RN") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE=RN' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='RN'> </TD>";
                    }
     
      if($nota == "PE") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PE' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='PE'> </TD>";
                    }                               
           }       
else {   
    
     echo" <tr>
           <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th>
           <tr align=center> ";
    
    if($nota == "A") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='A' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='A'> </TD>";
                    }
                    
    if($nota == "B") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='B' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='B'> </TD>";
                    }
                    
   if($nota == "C") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='C' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='C'> </TD>";
                    }
                    
   if($nota == "D") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='D' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='D'> </TD>";
                    }
                    
    if($nota == "E") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='E' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='E'> </TD>";
                    }
                    
    if($nota == "F") {
       echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='F' checked> </TD>";
              } else {       
         echo "<td height=50 width=50> <INPUT TYPE='radio' NAME='nota' VALUE='F'> </TD>";
                    }
  }
    ?>
    <tr>
    <td colspan="6" align=center>  <button class=boton TYPE='submit' NAME='nota' VALUE=''>Resetear Nota</button>
</table>

</div>
<br>
   <button class="boton" type="button" OnClick="location='index.php?cnt=Aulas&act=listarEstudiantesPorAula&id=<?php echo $id_aula;?>'">Regresar</button>
   <button class="boton" type="submit">Aceptar</button>
   
  </form> 
</center>