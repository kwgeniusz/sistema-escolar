<?php


include("inc/config/menu.php");

?>
<center>
<BR>
<h3>
<u>REPRESENTANTE: </u> <?php echo "$nombre_r $apellido_r";?><BR>
<u>CEDULA: </u> <?php echo "$cedula_r";?>
<br><br>
  
<hr>
CARGA ESTUDIANTIL
</H3>

<div id="datatable">
 <table border=1 align=center>
   <tr>
      <th><?php echo "$nombre_r $apellido_r ";?></th><th>CEDULA ESTUDIANTIL</th><th>NOMBRE</th><th>APELLIDO</th><th>FECHA DE NACIMIENTO</th><th>LUGAR DE NACIMIENTO</th>
   </tr>        
   
   <?php 

   foreach($item as $row) {

   ?>

        <tr align=center>
          <td width=100><?php echo $row['vinculo_r']." DE:" ?></td>
          <td width=100><?php echo $row['cedula_es'] ?></td>
		      <td width=190><?php echo $row['nombre_es'] ?></td>
		      <td width=190><?php echo $row['apellido_es'] ?></td>
		      <td width=200><?php echo $row['fecha_nacimiento'] ?></td>
		      <td width=200><?php echo $row['lugar_nacimiento'] ?></td>
		      
<?php
       }
 ?> 
</table>
</div>
<br>
<button class="boton" type="button" OnClick="location='index.php?cnt=Registros&act=Inicio'">Regresar</button>

</center>

