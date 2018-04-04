<?php

$est_nuevo2 = "index.php?cnt=Registros&act=borrar_cargaEstudiantil2";
?>


<?php include("inc/config/menu.php");
       include("inc/config/varios.php");?>
<center>
<BR>

<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >
<table border=0 align=center >

<H2>Este es el Estudiante que Desea Eliminar?</h2>

    <tr>
    <td> Cedula:<input type="hidden" value="<?php echo $cedula_r; ?>" name="cedula_r">
                <input type="hidden" value="<?php echo $cedula_es; ?>" name="cedula_es">
    <td ><?php echo $cedula_es;?>
         
    <tr>
    <td >Nombres :
    <td ><?php echo $nombre_es;?>
    <tr>
    <td >Apellidos:
    <td ><?php echo $apellido_es ;?>
 
   <tr>
   <td>Sexo: 
	 <td><?php 
	 if($sexo == 'F')
	 $result = "FEMENINO";
	 else
	 $result = "MASCULINO";
	 echo $result ;?>
   
    <tr>
    <td >Fecha de Nacimiento: 
    <td ><?php echo $fecha_nacimiento ;?>
    
    <tr>
    <td >Lugar de Nacimiento: 
    <td ><?php echo $lugar_nacimiento ;?>
     
 </table>

<BR>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Registros&act=cargaEstudiantil&id=<?php echo $cedula_r;?>'">NO</button>
 <button class="boton" type="submit">SI</button>

        
</form>   
</center>




 