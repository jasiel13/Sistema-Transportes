<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query2="delete from camion where matricula= '".$_POST["id"]."' ";
//error_log($query1);
$resultado=mysqli_query($con, $query2) or die (mysqli_error());

echo "Registro Borrado";
mysqli_close($con);
?>

