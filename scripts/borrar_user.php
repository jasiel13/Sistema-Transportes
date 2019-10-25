<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query="delete from usuarios where id_user= '".$_POST['id']."'";
//error_log($query);
$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "Registro Borrado";
mysqli_close($con);
?>

