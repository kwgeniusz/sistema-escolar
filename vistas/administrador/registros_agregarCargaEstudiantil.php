<?php

$est_nuevo2 = "index.php?cnt=Registros&act=agregarCargaEstudiantil2";

?>


<?php
    include("inc/config/menu.php");
    include("inc/config/varios.php");

    ?>
  <link rel="stylesheet" type="text/css" media="all" href="js/jscalendar/skins/aqua/theme.css"/>
  <!-- librería principal del calendario --> 
  <script type="text/javascript" src="js/jscalendar/calendar.js"></script> 
 <!-- librería para cargar el lenguaje deseado --> 
  <script type="text/javascript" src="js/jscalendar/lang/calendar-es.js"></script> 
  <!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código --> 
  <script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script> 
   
       
<center>
<BR>
<h3>
<u>REPRESENTANTE: </u> <?php echo "$nombre_r $apellido_r";?><BR>
<u>CEDULA: </u> <?php echo "$cedula_r";?></h3>


<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >
<table border=0 align=center>
     <input type="hidden" name="cedula_r" value="<?php echo $cedula_r;?>"> 
     <input type="hidden" name="apellido_r" value="<?php echo $apellido_r;?>"> 
     <input type="hidden" name="nombre_r" value="<?php echo $nombre_r;?>"> 
   <tr>
   <td>Vinculo del representante con el Estudiante: 
	 <td><select name="vinculo_r" size="1" style="width:160px;background-color:white;" >
       <?php
                for ($i=0;$i<=4;$i++) {

                    $clave = $vinculo[$i][0];  // La clave
                    $texto = $vinculo[$i][1];  // El texto  
                    if($vinculo_r == $clave) {
                      echo "<option value = $clave selected> $texto</option>";
                    } else {       
                      echo "<option value = $clave>$texto</option>";
                    }
                 }
       ?>
    </select> 
        <?php
        if($errorVinculo != "") {
             echo "</br> <label class=rojo>$errorVinculo </label>";}
       ?>
    </td> 
 </table>
 <hr>
<table border=0 align=center>
    <tr>
      <td> Cedula:
    <td > <select name="nacionalidad" style="width:40px;background-color:white;" >
       <?php
                for ($i=0;$i<=1;$i++) {

                    $clave = $oNacionalidad[$i][0];  // La clave
                    $texto = $oNacionalidad[$i][1];  // El texto  
                    if($nacionalidad== $clave) {
                      echo "<option value = $clave selected> $texto</option>";
                    } else {       
                      echo "<option value = $clave>$texto</option>";
                    }
                 }
       ?>
    </select> 
   <input placeholder="Ej:00000000" type="text" name="cedula_es" size="20" maxlength="11" value="<?php echo $cedula_es;?>" /> <font color=red>*</font>
          <?php if($errorCedula != "") {
             echo "</br> <label class=rojo>$errorCedula </label>";
       }
      ?>
    <tr>
    <td >Nombres :
    <td ><input type="text" name="nombre_es" size=35 onkeyup="this.value=this.value.toUpperCase()" maxlength="40" value="<?php echo $nombre_es;?>"  />  <font color=red>*</font>
             <?php if($errorNombre != "") {
             echo "</br> <label class=rojo>$errorNombre </label>";
       }
      ?>
    <tr>
    <td >Apellidos:
    <td ><input type="text" name="apellido_es" size=35 onkeyup="this.value=this.value.toUpperCase()"  maxlength="40" value="<?php echo $apellido_es;?>"  /> <font color=red>*</font>
            <?php if($errorApellido != "") {
             echo "</br> <label class=rojo>$errorApellido </label>";
       }
      ?>
 
   <tr>
   <td>Sexo 
	 <td><select name="sexo" size="1" style="width:160px;background-color:white;" >
       <?php
                for ($i=0;$i<=2;$i++) {

                    $clave = $sexoe[$i][0];  // La clave
                    $texto = $sexoe[$i][1];  // El texto  
                    if($sexo == $clave) {
                      echo "<option value = $clave selected> $texto</option>";
                    } else {       
                      echo "<option value = $clave>$texto</option>";
                    }
                 }
       ?>
    </select>  <font color=red>*</font>
               <?php
                 if($errorSexo != "") {
             echo "</br> <label class=rojo>$errorSexo</label>";}
             ?>
    </td> 
   
    <tr>
    <td >Fecha de Nacimiento:
    <td ><input placeholder="00/00/0000" type="text" name="fecha_nacimiento" id="fecha_n" readonly="readonly"  size=35 maxlength=10 value="<?php echo $fecha_nacimiento;?>" />  <font color=red>*</font>
            <?php if($errorFechaNacimiento != "") {
             echo "</br> <label class=rojo>$errorFechaNacimiento </label>";
       }
      ?>
      
<!-- script que define y configura el calendario--> 
<script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "fecha_n",     // id del campo de texto 
     ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto
      button     :    "fecha_n"     // el id del botón que lanzará el calendario
 }); 
</script>  
         <tr>
    <td >Lugar de Nacimiento: 
    <td ><input  type="text" name="lugar_nacimiento" onkeyup="this.value=this.value.toUpperCase()" size=35  maxlength="40" value="<?php echo $lugar_nacimiento;?>" />  <font color=red>*</font>
            <?php if($errorLugarNacimiento != "") {
             echo "</br> <label class=rojo>$errorLugarNacimiento </label>";
       }
      ?>
     
 </table>

<BR>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Registros&act=cargaEstudiantil&id=<?php echo $cedula_r;?>'">Regresar</button>
 <button class="boton" type="submit">Aceptar </button>
 <br><br>
 
  <u>Nota: Los Campos Marcados con  <font color=red>(*)</font> son Obligatorios.</u>
        
</form>   
</center>




 