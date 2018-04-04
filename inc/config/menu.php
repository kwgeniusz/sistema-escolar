
<?php if($nivel_usuario == 1){ ?>
  <ul class="menu">
    <li><a href="<?php echo $inscripcion;?>" >Inscripcion</a> 
   
    <li><a href="<?php echo $registros;?>" >Registros</a> 
    
    <li><a href="<?php echo $aulas;?>" >Aulas</a> 
    
    <li><a href="#" >Reportes</a> 
      <ul >
        <li><a href="<?php echo $nominaRepresentantes;?>" >Nomina de Representantes</a> 
        <li><a href="<?php echo $matriculaEstudiantes;?>" >Matricula de Alumnos</a> 
        <li><a class="border" href="<?php echo $rendimientoEstudiantil;?>" >Rendimiento Estudiantil </a>  
      </ul>
    
    <li><a href="<?php echo $configuracion;?>"> Configuracion</a>
    
    <li><a href="<?php echo $usuarios;?>" > Usuarios</a> 

    <li><a href="inc/doc/manual1.pdf">Manual de Usuario</a></li>     
       
    <li><a href="<?php echo $salir;?>" >Cerrar Sesion</a>
    
  </ul> 
  
 <?php 
 } 
 elseif($nivel_usuario == 2){
 ?>
  <ul class="menu">
    
    <li><a href="<?php echo $aulas;?>" >Cargar Notas</a>
    
    <li><a href="inc/doc/manual2.pdf">Manual de Usuario</a></li>  
              
    <li><a href="<?php echo $salir;?>" >Cerrar Sesion</a>
    
  </ul> 
 
 <?php
 }
 elseif($nivel_usuario == 3){
 ?>
 <ul class="menu">
    
    <li><a href="<?php echo $registros;?>" >Registros de Informacion</a> 
    
    <li><a href="<?php echo $aulas;?>" >Consulta Notas</a> 
    
     <li><a href="#" >Reportes</a> 
      <ul >
        <li><a href="<?php echo $nominaRepresentantes;?>" >Nomina de Representantes</a> 
        <li><a href="<?php echo $matriculaEstudiantes;?>" >Matricula de Alumnos</a> 
        <li><a class="border" href="<?php echo $rendimientoEstudiantil;?>" >Rendimiento Estudiantil </a>  
      </ul>
      
       <li><a href="inc/doc/manual3.pdf">Manual de Usuario</a></li>   
          
    <li><a href="<?php echo $salir;?>" >Cerrar Sesion</a>
    
  </ul> 
 <?php
 }
 ?>