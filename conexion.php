<?php
$cadena="mysql:host=localhost;dbname=transportes";
$user="root";
$pass="";
try
{
	$conexion=new PDO ($cadena,$user,$pass);
	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
	echo "falla de conexion".$e=getMessage();
}

?>
