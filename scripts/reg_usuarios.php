<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$rol=$_POST['rol'];

$insert="INSERT INTO usuarios(user, pass, rol) VALUES
('$usuario','$password','$rol')";

mysqli_query($con,$insert) or die ("!!!Usuario Ya Registrado, Utiliza Otro Nombre!!!");

echo "Registro Exitoso";

mysqli_close($con);
?>