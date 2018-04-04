<?php
 /**
  * Archvo   :  dbConnect.php
  * Funcion  :  Conexion a la base de datos 
  */

  $idConn = mysql_connect("localhost", "root","");
  mysql_select_db("escuela",$idConn);
?>
