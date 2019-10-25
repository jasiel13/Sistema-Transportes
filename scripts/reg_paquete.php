<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$desc=$_POST['Descripcion'];
$dest=$_POST['Destinatario'];
$dir_des=$_POST['dir_destinatario'];
$chofer=$_POST['chofert'];
$provincia=$_POST['provincia'];

$insertar="INSERT INTO paquete ( descripcion, destinatario, dir_destinatario, id_chofer, id_provincia) VALUES 
('$desc','$dest', '$dir_des', '$chofer', '$provincia')";

mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());

echo "Registro Exitoso";

mysqli_close($con);

?>

