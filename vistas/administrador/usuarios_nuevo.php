<?php

$est_nuevo2 = "index.php?cnt=Usuarios&act=nuevo_usuario2";
?>


<?php include("inc/config/menu.php");
       include("inc/config/varios.php");?>
<center>
<BR>
<h3>Llene El formulario Con los Datos Solicitados:</H3>

<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >
<table border=0 align=center>

    <tr>
    <td>Usuario:
    <td ><input width="200px" placeholder="Ingrese Su Nombre de Usuario" type="text" name="usuario" size="40" maxlength="40" value="<?php echo $usuario;?>" /> <font color=red>*</font>
          <?php if($errorUsuario != "") {
             echo "</br> <label class=rojo>$errorUsuario </label>";
       }
      ?>
    <tr>
    <td >Contrase&ntilde;a:
    <td ><input type="password" placeholder="Este Campo Es Sencible a Mayusculas" name="pass" size=40  maxlength="40" value="<?php echo $pass;?>"  />  <font color=red>*</font>
             <?php if($errorPass != "") {
             echo "</br> <label class=rojo>$errorPass </label>";
       }
      ?>
    <tr>
    <td >Nombre y Apellido:
    <td ><input type="text" placeholder="Ingrese Su Nombre y Apellido Real" name="nombreApellido" size=45  maxlength="45" value="<?php echo $nombreApellido;?>"  /> <font color=red>*</font>
            <?php if($errorNombreApellido != "") {
             echo "</br> <label class=rojo>$errorNombreApellido </label>";
       }
      ?>
 
   <tr>
   <td>Privilegios: 
	 <td><select name="privilegios" size="1" style="width:160px;background-color:white;" >
	 <?php
	   if($privilegios == 1) {
       echo " <OPTION VALUE='1' selected>Administrador</OPTION>";
              } else {       
       echo " <OPTION VALUE='1'>Administrador</OPTION> ";
         } 
      if($privilegios == 2) {
       echo " <OPTION VALUE='2' selected>Docente</OPTION> ";
              } else {       
       echo " <OPTION VALUE='2'>Docente</OPTION>";
         } 
        if($privilegios == 3) {
       echo " <OPTION VALUE='3' selected>Usuario de Consultas</OPTION> ";
              } else {       
       echo " <OPTION VALUE='3'>Usuario de Consultas</OPTION>";
         }                   
   ?>

    </select> 
    </td> 

 </table>

<BR>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Usuarios&act=inicio'">Regresar</button>
 <button class="boton" type="submit">Aceptar </button>
 <br><br>
 
  <u>Nota: Los Campos Marcados con  <font color=red>(*)</font> son Obligatorios.</u>
        
</form>   
</center>




 