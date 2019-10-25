<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query5="delete from paquete where codigo= '".$_POST["id"]."' ";
//error_log($query1);
$resultado=mysqli_query($con, $query5) or die (mysqli_error());

echo "Registro Borrado";
mysqli_close($con);
?>

