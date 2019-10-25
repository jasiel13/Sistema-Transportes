<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$modelo=$_POST['Modelo'];
$tipo=$_POST['Tipo'];
$potencia=$_POST['Potencia'];

$insertar="INSERT INTO camion(modelo,tipo,potencia) VALUES
('$modelo','$tipo','$potencia')";

mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());

echo "Registro Exitoso";

mysqli_close($con);

?>

