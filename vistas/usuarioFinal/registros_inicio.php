<?php

$CargaEstudiantil ="index.php?cnt=Registros&act=CargaEstudiantil&id=";

?>


<?php include("inc/config/menu.php");?>
<center>
<BR><br>
<h2>Consulte su Informacion.</H2>

<div id="datatable">
 <table border=1 align=center>
   <tr>
    <th>CEDULA</th><th>NOMBRE</th><th>APELLIDO</th><th>DIRECCION</th><th>TELEFONO</th><th>CARGA ESTUDIANTIL</th>
   </tr>        
   
   <?php 

   foreach($item as $row) {

   ?>

       <tr align=center>
          <td width=100><?php echo $row['cedula_r'] ?></td>
		      <td width=190><?php echo $row['nombre_r'] ?></td>
		      <td width=190><?php echo $row['apellido_r'] ?></td>
		      <td width=190><?php echo $row['direccion'] ?></td>
		      <td width=100><?php echo $row['telefono'] ?></td>
		      
		       <td width=70> <a title="Carga Estudiantil" href=<?php echo $CargaEstudiantil.$row['cedula_r']; ?>  >
            <img src="inc/img/estudiante.png" width=22 height=22 border=0></a> </td>
            
       </tr> 
   <?php
   }
   ?>

</table>
</div>
<br>
         <button class="boton" type="button" OnClick="location='index.php?cnt=Inicio&act=go'">Regresar</button>
     
</center>

