<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query4="delete from provincia where id_provincia= '".$_POST["id"]."' ";
//error_log($query1);
$resultado=mysqli_query($con, $query4) or die (mysqli_error());

echo "Registro Borrado";
mysqli_close($con);
?>

