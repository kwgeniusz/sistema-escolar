<?php

$login2 = "index.php?cnt=Login&act=verificacion";

?>


<hr>
<hr>
<hr>
<BR><BR><BR>
<center>
<form action=<?php echo $login2; ?> method="post">


 <table border=0 align=center>
  
  <tr>
    <td >Usuario : </td>
    <td ><input type="text" name="usuario" size=15   maxlength=15 />
    <td rowspan=2 > <img src="inc/img/llave1.png" width=40 height=40> </td>
    
  <tr>
    <td >Contrase&ntilde;a : </td>
    <td ><input type="password" name="contra" size=15  maxlength=15 />
   
   <tr>
    <td align="center" colspan=3> <?php if($errorInicio != "") {
               echo "</br> <label class=rojo>$errorInicio </label> "; }?>
     
 </table>

<br>

<table border=0 align=center>
   <tr>
    <td><button type="submit" class=boton>Ingresar</button>
</table>

</form>




 