

<?php include("inc/config/menu.php");?>

<br>
<b><u>- Periodo Escolar:</u> <?php echo $ano_escolar.".";?></b>

<center>
<h2><u>Estudiantes Inscritos en:</U> "<?php echo $id_aula;?>".</H2>

<br><br>

<?php

 foreach($item as $row)
     $v  = $row['cedula_es'];  
if($v == "")
{

?>
<center>
<h3 class=rojo> AULA VACIA. </h3>
<center>
<?php
}
else{
?>
<div id="datatable">
 <table border=1 align=center>
   <tr>
        <th>REPRESENTANTE</th><th>CEDULA ESCOLAR</th><th>NOMBRE</th><th>APELLIDO</th><th>NOTA </th>
   </tr>        
   
   <?php 

   foreach($item as $row) {
          
   ?>
       <tr align=center>
       		<td width=150><?php echo $row['cedula_r'] ?></td>
		      <td width=150><?php echo $row['cedula_es'] ?></td>
		      <td width=190><?php echo $row['nombre_es'] ?></td>
		      <td width=190><?php echo $row['apellido_es'] ?></td>
		      <?php if($row['nota_final'] =="") { ?>
		      <td width=190><label class=rojo> NO HAY NOTA CARGADA </label></td>   
		      <?php } else{ ?>
		      <td width=190><?php echo $row['nota_final'] ?></td>
		     <?php
		     }      
    }
}
    ?>

</table>
</div>
<br>
         <button class="boton" type="button" OnClick="location='index.php?cnt=Aulas&act=inicio'">Regresar</button>
     
</center>