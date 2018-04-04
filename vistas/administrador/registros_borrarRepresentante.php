<?php

$est_nuevo2 = "index.php?cnt=Registros&act=borrar_r2";
?>


<?php include("inc/config/menu.php");
       include("inc/config/varios.php");?>
<center>
<BR>

<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >
<table border=0 align=center >

<H2>Este es el Representante que Desea Eliminar?</h2>
<h4 class=rojo>NOTA: Tambien Se Borraran Los Estudiantes Que Esten A Su Cargo.</H4>

    <tr>
    <td> Cedula:<input type="hidden" value="<?php echo $cedula_r; ?>" name="cedula_r">
    <td ><?php echo $cedula_r;?>
         
    <tr>
    <td >Nombres :
    <td ><?php echo $nombre_r;?>
    <tr>
    <td >Apellidos:
    <td ><?php echo $apellido_r ;?>
 
   <tr>
   <td>Estado Civil: 
	 <td><?php echo $estado_civil ;?>
   
    <tr>
    <td >Direccion: 
    <td ><?php echo $direccion ;?>
    
    <tr>
    <td >Telefono: 
    <td ><?php echo $telefono ;?>
     
 </table>

<BR>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Registros&act=Inicio'">NO</button>
 <button class="boton" type="submit">SI</button>

        
</form>   
</center>




 