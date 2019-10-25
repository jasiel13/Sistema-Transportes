<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$chofer=$_POST['c'];
$matricula=$_POST['matricula'];
$fecha=$_POST['Fecha'];


$insertar="INSERT INTO conduce (id_chofer, matricula, fecha) VALUES 
('$chofer','$matricula','$fecha')";

mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());

echo "Registro Exitoso";

mysqli_close($con);

?>
