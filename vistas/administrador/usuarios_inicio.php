<?php


$modificar ="index.php?cnt=Usuarios&act=modificar_usuario&id=";
$borrar  ="index.php?cnt=Usuarios&act=eliminar_usuario&id=";
?>


<?php include("inc/config/menu.php");?>
<center>
<BR><br>
<h2>Lista de Usuarios.</H2>

<div id="datatable">
 <table border=1 align=center>
   <tr>
    <th>USUARIO</th><th>PRIVILEGIOS</th><th>MODIFICAR</th><th>ELIMINAR</th>
   </tr>        
   
   <?php 

   foreach($item as $row) {

   ?>

       <tr align=center>
          <td width=300><?php echo $row['usr_nombre'] ?></td>
		      <td width=30><?php echo $row['usr_nivel'] ?></td>
		      
		      <td width=30> <a title="Modificar" href=<?php echo $modificar.$row['login']; ?>  >
            <img src="inc/img/edit.png" width=22 height=22 border=0></a> </td>

         <td width=30> <a title="Borrar" href=<?php echo $borrar.$row['login']; ?>  >
            <img src="inc/img/delete.gif" width=22 height=22 border=0></a> </td>
       </tr> 
   <?php
   }
   ?>

</table>
</div>
<br>

         <button class="boton" type="button" OnClick="location='index.php?cnt=Inicio&act=go'">Regresar</button>
     <button class="boton" type="button" OnClick="location='index.php?cnt=Usuarios&act=nuevo_usuario'">Agregar Usuario</button>    
</center>

