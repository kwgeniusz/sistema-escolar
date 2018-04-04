<?php

$direccion= "index.php?cnt=Aulas&act=agregarEstudiante2&id=$id_aula";

include("inc/config/varios.php");


 foreach($item as $list)
     $v  = $list['cedula_es'];  
if($v == "")
{

?>
<center>
<br><br><br>
<h3 class=rojo> TODOS LOS ESTUDIANTES DEL SISTEMA ESTAN ASIGNADOS A SUS AULAS. </h3>
<h4> Ingrese mas Estudiantes a travez <br>de la Seccion "Inscripcion" del Menu.</h4>
<center>
<?php
}
else{
?>


<BR><BR>
<b><u>- Periodo Escolar:</u> <?php echo $ano_escolar.".";?></b>
<br>
<center>
<form action=<?php echo $direccion; ?> method="post">

<h2 class=rojo>Aula: <?php echo $id_aula;?>.</h2>

 <table border=0 align=center>
  
  <tr>
    <td >Estudiantes Sin Aula Asignada : </td>
    <td ><select name="cedula_es"  style="width:400px;background-color:white;"> 
    <?php
          foreach($item as $list){
           
            if($cedula_es == $list['cedula_es']) {
                        echo "<option value='".$list["cedula_es"]."'selected>".$list["cedula_es"].' - '.$list["nombre_es"].' '.$list["apellido_es"]."</option>"; 
                    } else {       
                        echo "<option value='".$list["cedula_es"]."'>".$list["cedula_es"].' - '.$list["nombre_es"].' '.$list["apellido_es"]."</option>"; 
                    }  
            }
      ?>
      </select>  
        <?php if($errorCedula != "") {
             echo "</br> <label class=rojo>$errorCedula </label>";
       }
      ?>
  <tr>
    <td >Escolaridad : </td>
    <td > <select name="escolaridad" style="width:50px;background-color:white;" >
       <?php
                for ($i=0;$i<=2;$i++) {

                    $clave = $oEscolaridad[$i][0];  // La clave
                    $texto = $oEscolaridad[$i][1];  // El texto  
                    if($escolaridad == $clave) {
                      echo "<option value = $clave selected> $texto</option>";
                    } else {       
                      echo "<option value = $clave>$texto</option>";
                    }
                 }
       ?>
    </select> 
          <?php if($errorEscolaridad!= "") {
             echo "</br> <label class=rojo>$errorEscolaridad</label>";
       }   
       ?>
 </table>

<br>
<table border=0 align=center>
   <tr>

    <td><Button class="boton" type="submit">Aceptar</button>
    
</table>

</form>
<?php
}
?>