<?php
$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());
//id inputs
$nombre=$_POST['Nombre'];
$ap_pat=$_POST['ap_Pat'];
$ap_mat=$_POST['ap_Mat'];
$telefono=$_POST['Telefono'];
$direccion=$_POST['Direccion'];
$salario=$_POST['Salario'];
$ciudad=$_POST['Ciudad'];

$insertar="INSERT INTO chofer(nombre, ap_pat, ap_mat, telefono, direccion, salario, ciudad) VALUES
('$nombre','$ap_pat','$ap_mat','$telefono','$direccion','$salario','$ciudad')";

mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());

echo "Registro Exitoso";

mysqli_close($con);

?>