<?php

$reporte2 = "index.php?cnt=Reportes&act=matriculaEstudiantes2";
?>


<?php include("inc/config/menu.php");?>
       
       
<center>
<BR>
<h2>" Matricula de Estudiantes "</h2>
<h3>Seleccione los Parametros<br> Para la Generacion del Reporte</H3>

<form name="form" action=<?php echo $reporte2; ?> method="post"  >
<table border=0 align=center>
    <tr>
    <td>A&ntilde;o Escolar :
    <td ><select name="ano_escolar"  style="width:160px;background-color:white;"> 
    <?php
          foreach($item as $list){

            echo $list['ano_escolar'];
            if($ano_escolar== $list['ano_escolar']) {
                        echo "<option value='".$list["ano_escolar"]."'selected>".$list["ano_escolar"]."</option>"; 
                    } else {       
                        echo "<option value='".$list["ano_escolar"]."'>".$list["ano_escolar"]."</option>"; 
                    }  
            }
      ?>
      </select>  
   <tr>
   <td>Grado: 
	 <td><select name="grado" style="width:160px;background-color:white;" >
	 	   <OPTION VALUE='PREESCOLAR'>Preescolar</OPTION>
	     <OPTION VALUE='1ero'>Primer Grado</OPTION>
	     <OPTION VALUE='2do'>Segundo Grado</OPTION>
	     <OPTION VALUE='3ero'>Tercer Grado</OPTION>
	     <OPTION VALUE='4to'>Cuarto Grado</OPTION>
	     <OPTION VALUE='5to'>Quinto Grado</OPTION>
	     <OPTION VALUE='6to'>Sexto Grado</OPTION>    
      </select> 
    <tr>
    
       <td>Seccion: 
	 <td><select name="seccion" style="width:160px;background-color:white;" >
	       <OPTION VALUE='A'>A</OPTION>
	       <OPTION VALUE='B'>B</OPTION>
	       <OPTION VALUE='C'>C</OPTION>
	       <OPTION VALUE='D'>D</OPTION>      
      </select> 
    </td> 
 </table>
<BR>
 <button class="boton" type="submit">Imprimir </button>
 <br><br>

        
</form>   
</center>




 