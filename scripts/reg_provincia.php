<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$nombre=$_POST['nom_pro'];

$insertar="INSERT INTO provincia (nombre_pro) VALUES ('$nombre')";

mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());

echo "Registro Exitoso";

mysqli_close($con);

?>