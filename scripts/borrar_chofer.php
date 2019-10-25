<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query1="delete from chofer where id_chofer= '".$_POST["id"]."' ";
//error_log($query1);
$resultado=mysqli_query($con, $query1) or die (mysqli_error());

echo "Registro Borrado";
mysqli_close($con);
?>

