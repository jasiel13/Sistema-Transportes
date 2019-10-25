<?php
session_start();
//$roles= $_POST['rol'];
include_once "conexion.php";
//usuario es tu variable lo que viene dentro del post es del placeholder las variables son las que se usan en la consulta
$query="select user, rol  from usuarios where user=:usuario AND pass=:password";
$consulta=$conexion->prepare($query);
//usuario es tu variable lo que viene dentro del post es del placeholder las variables son las que se usan en la consulta
$consulta->bindParam(':usuario',$_POST['user']);
$consulta->bindParam(':password',$_POST['pass']);
//$consulta->bindParam(':roles',$_POST['rol']);

$consulta->execute();

$data=$consulta->fetch();
if($consulta->rowCount()>0)
{
	//el nombre dentro del session puede ser cualquiera
	$_SESSION["usuario"]=$data['user'];
	$_SESSION["rol"]=$data['rol'];

	echo"ok";
}
else
{
	echo "error";
}

$conexion=null;
?>