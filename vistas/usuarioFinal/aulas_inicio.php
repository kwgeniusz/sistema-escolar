
<?php 


include("inc/config/menu.php");
$listarEstAula ="index.php?cnt=Aulas&act=listarEstudiantesPorAula&id=";


?>
<br>
<b><u>- Periodo Escolar:</u> <?php echo $ano_escolar.".";?></b>


<center>
<H3> Consulte Notas de Estudiantes</h3>
<div id="aulas">
<!--AQUI COMIENZAA LA LISTA DE PREESCOLAR----------------------------------------------------------------------------------> 
 <label class="tituloAula">Preescolar</label><br><br>
 <?php 
for($i=0;$i<=1;$i++){
?>
		     <a class="<?php echo $estado_preescolar[$i];?>"  title="Matricula: <?php echo $matricula_preescolar[$i];?>" href=<?php echo $listarEstAula.$preescolar[$i]; ?> > <?php echo $preescolar[$i];}?> </a><br><br>


<!--AQUI COMIENZAA LA LISTA DE PRIMER GRADO ------------------------------------------->

<label class="tituloAula">Primer Grado</label><br><br>

 <?php 
for($i=0;$i<=3;$i++)
{
?>
	<a class="<?php echo $estado_primero[$i];?>" title="Matricula: <?php echo $matricula_primero[$i];?>" href=<?php echo $listarEstAula.$primero[$i]; ?> > <?php echo $primero[$i];}?></a><br><br>


<!--AQUI COMIENZAA LA LISTA DE SEGUNDO GRADO ------------------------------------------------>

<label class="tituloAula">Segundo Grado</label><br><br>
 <?php 
for($i=0;$i<=3;$i++){
?>
		   <a class="<?php echo $estado_segundo[$i];?>"  title="Matricula: <?php echo $matricula_segundo[$i];?>" href=<?php echo $listarEstAula.$segundo[$i]; ?> > <?php echo $segundo[$i];}?> </a><br><br> 


 <!--AQUI COMIENZAA LA LISTA DE TERCERO GRADO --------------------------------------------->
<label class="tituloAula">Tercer Grado</label><br><br>
 <?php 
for($i=0;$i<=3;$i++){
?>
		   <a class="<?php echo $estado_tercero[$i];?>"  title="Matricula: <?php echo $matricula_tercero[$i];?>" href=<?php echo $listarEstAula.$tercero[$i]; ?> > <?php echo $tercero[$i];}?> </a><br><br>

 
 <!--AQUI COMIENZAA LA LISTA DE CUARTO GRADO ---------------------------------------------------->
<label class="tituloAula">Cuarto Grado</label><br><br>
 <?php 
for($i=0;$i<=3;$i++){
?>
		  <a class="<?php echo $estado_cuarto[$i];?>"  title="Matricula: <?php echo $matricula_cuarto[$i];?>" href=<?php echo $listarEstAula.$cuarto[$i]; ?> > <?php echo $cuarto[$i];}?> </a><br><br> 
 
 
 <!--AQUI COMIENZAA LA LISTA DE QUINTO GRADO ------------------------------------------------------>
<label class="tituloAula">Quinto Grado</label><br><br>
 <?php 
for($i=0;$i<=3;$i++){
?>
		   <a class="<?php echo $estado_quinto[$i];?>"  title="Matricula: <?php echo $matricula_quinto[$i];?>" href=<?php echo $listarEstAula.$quinto[$i]; ?> > <?php echo $quinto[$i];}?> </a><br><br> 
		   
		   
<!--AQUI COMIENZAA LA LISTA DE SEXTO GRADO ----------------------------------------------------------------------------------> 
 <label class="tituloAula">Sexto Grado</label><br><br>
 <?php 
for($i=0;$i<=3;$i++){
?>
		     <a class="<?php echo $estado_sexto[$i];?>"  title="Matricula: <?php echo $matricula_sexto[$i];?>" href=<?php echo $listarEstAula.$sexto[$i]; ?> > <?php echo $sexto[$i];}?> </a><br><br>

</div>
 <br>
   <button class="boton" type="button" OnClick="location='index.php?cnt=Inicio&act=go'">Regresar</button>
 </center>
 
 
 