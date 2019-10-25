<?php
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from usuarios ";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Usuario</th>
<th>Nombre</th>
<th>Password</th>
<th>Rol</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='info'>";
	echo "<td>".$row['id_user']."</td>";
	echo "<td>".$row['user']."</td>";
	echo "<td>".$row['pass']."</td>";
	echo "<td>".$row['rol']."</td>";	
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>