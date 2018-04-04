<?php

$cargarNota1 ="index.php?cnt=Aulas&act=cargarNota&id_inscripcion=";



?>
<script type="text/javascript">
function new_window() 
{
window.open("index.php?cnt=Aulas&act=agregarEstudiante&id=<?php echo $id_aula;?>","Sistema de Control Estudiantil","toolbar=no,location=0,directories=no,status=no,menubar=0,scrollbars=yes,resizable=0,width=710,height=600,left=250,top=180");
}
</script>

<?php include("inc/config/menu.php");?>

<br>
<b><u>- Periodo Escolar:</u> <?php echo $ano_escolar.".";?></b>

<center>
<h2><u>Estudiantes Inscritos en:</U> "<?php echo $id_aula;?>".</H2>

<?php if($estado_aula =="DISPONIBLE"){?>
<button class="boton" type="button" OnClick="javascript:new_window()">Ingresar Estudiante a Aula</button>
<?php }?>
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
        <th>REPRESENTANTE</th><th>CEDULA ESCOLAR</th><th>NOMBRE</th><th>APELLIDO</th><?php if($vCargarNotas == 1) {?><th>CARGAR NOTA</th><?php }?>
   </tr>        
   
   <?php 

   foreach($item as $row) {
          
   ?>
       <tr align=center>
       		<td width=150><?php echo $row['cedula_r'] ?></td>
		      <td width=150><?php echo $row['cedula_es'] ?></td>
		      <td width=190><?php echo $row['nombre_es'] ?></td>
		      <td width=190><?php echo $row['apellido_es'] ?></td>
		      
<?php if($vCargarNotas == 1) {?>
		      <td width=100> <a title="NOTA='<?php echo $row['nota_final'] ?>'" href=<?php echo $cargarNota1.$row['id_inscripcion']; ?> >
            <img src="inc/img/notas.png" width=22 height=22 border=0></a> </td>

  
       </tr> 
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