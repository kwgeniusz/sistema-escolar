<?php

$est_nuevo2 = "index.php?cnt=Configuracion&act=modificar_configuracion";


 include("inc/config/menu.php");
   ?>
       
  <link rel="stylesheet" type="text/css" media="all" href="js/jscalendar/skins/aqua/theme.css" title="win2k-cold-1" />
  <!-- librería principal del calendario --> 
  <script type="text/javascript" src="js/jscalendar/calendar.js"></script> 
 <!-- librería para cargar el lenguaje deseado --> 
  <script type="text/javascript" src="js/jscalendar/lang/calendar-es.js"></script> 
  <!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código --> 
  <script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script> 
      
<center>
<BR>
<h2>Establesca Los Parametros De Configuracion</H2>

<form name="form" action=<?php echo $est_nuevo2; ?> method="post"  >

<table border=1 align=center cellpadding ="10">
    <tr>
    <td> A&ntilde;o Escolar:
    <td ><?php echo $ano_escolar;?>
    <input type=hidden name="ano_escolar" maxlength="30" value="<?php echo $ano_escolar;?>">
    <tr>
    <td >Director(a) :
    <td ><input type="text" name="director" size=20 onkeyup="this.value=this.value.toUpperCase()" maxlength="40" value="<?php echo $director;?>"/> <font color=red>*</font>
  <?php
        if($errorDirector != "") {
             echo "</br> <label class=rojo>$errorDirector </label>";}
       ?>
    <tr>
    <td >Cedula del Director:
    <td ><input type="text" name="cedula_director" size=20  maxlength="8" value="<?php echo $cedula_director;?>"/> <font color=red>*</font>
  <?php
        if($errorCedula != "") {
             echo "</br> <label class=rojo>$errorCedula </label>";}
       ?>
  </table>  
  
<br>
 <button class="boton" type="button" OnClick="location='index.php?cnt=Inicio&act=GO'">Regresar</button>
 <button class="boton" type="submit" >Aceptar</button>
<br>
<hr>
<br>
 <input type=hidden name="cargar_notas" value="<?php echo $cargar_notas;?>">
  <table  border=1 cellpadding ="10">
    <td align=center colspan="2">Carga de Notas:<tr>
    
    <?php if($cargar_notas == 0 ){?>
    <td align=center><button class="verde" type="submit" name="cargar_notas" value="1">HABILITAR</button>
  
        <?php }?>
    <?php if($cargar_notas == 1 ){?>
    <td align=center><button class="rojo" type="submit" name="cargar_notas" value="0" >DESHABILITAR</button>

    <?php }?>
    </table>
    
<br><br>

 <button class="boton" type="button" onclick="setActiveStyleSheet('estilo1', 1);
                    {pwb_2}return false;">Tema 1</button>
  <button class="boton" type="button" onclick="setActiveStyleSheet('estilo2', 1);
                    {pwb_2}return false;">Tema 2</button>
                                       


</form>   
</center>




 