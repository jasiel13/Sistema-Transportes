<?php
$id=$_POST['us'];
$usuario=$_POST['use'];
$password=$_POST['pas'];
$rol=$_POST['rol'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE usuarios SET user = '$usuario', pass = '$password', rol = '$rol' WHERE id_user  = ' " . $id . " ' ";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2="SELECT  * FROM usuarios WHERE id_user  = ' " . $id . " ' ";
$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Usuario</th>
<th>Nombre</th>
<th>Password</th>
<th>Rol</th>
</tr>";

while ($row=mysqli_fetch_array($result))
{
	echo "<tr class='success'>";
	echo "<td>".$row['id_user']."</td>";
	echo "<td>".$row['user']."</td>";
	echo "<td>".$row['pass']."</td>";
	echo "<td>".$row['rol']."</td>";	
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>











