
<div id="pie">

<img class="logoPie"src="inc/img/pie.jpg" align="left">

 <table border=0 width="100%">
  <tr>
  <?php if($nombre_usuario ==""){?>
   <td> <marquee>Bienvenido, Ingrese la Informacion Requerida Para Acceder al Sistema</marquee>
 <?php }
 
    else{ ?>
    <td align=center width="50%"><u>- Usuario:</u> <?php echo $nombre_usuario.".";?> 
    <td align=center width="50%"><u>- Nivel de Usuario:</u> <?php echo $nivel_usuario.".";?>
    <?php } ?>
 </table>
 
</div>

</body>
</html> 
 