<?php

$est_nuevo2 = "index.php?cnt=Usuarios&act=eliminar_usuario2";
?>


<?php include("inc/config/menu.php");?>
<center>
<BR>

<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >
<table border=0 align=center >

<H2>Este es el Usuario que Desea Eliminar?</h2>

    <tr>
    <td> Usuario:<input type="hidden" value="<?php echo $usuario; ?>" name="usuario">
    <td ><?php echo $usuario;?>
         
    <tr>
    <td >Nombre y Apellido :
    <td ><?php echo $nombreApellido;?>
    
   <tr>
   <td>Privilegios: 
	 <td><?php 
	 if($privilegios == '1')
	 $result = "ADMINISTRADOR";
	 
	 elseif($privilegios == '2')
	 $result = "DOCENTE";
	 
	 elseif($privilegios == '3')
	 $result = "USUARIO DE CONSULTAS";
	 
	 echo $result ;?>
   
 </table>

<BR>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Usuarios&act=inicio'">NO</button>
 <button class="boton" type="submit">SI</button>

        
</form>   
</center>




 