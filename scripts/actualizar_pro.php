<?php
$id=$_POST['c'];
$nombre=$_POST['nombre1'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE provincia SET nombre_pro = '$nombre' WHERE id_provincia  = ' " . $id. " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2="SELECT  * FROM provincia WHERE id_provincia = ' " . $id . " ' ";
$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Provincia</th>
<th>Nombre</th>
</tr>";

while ($row=mysqli_fetch_array($result))
{
	echo "<tr class='warning'>";
	echo "<td>".$row['id_provincia']."</td>";
	echo "<td>".$row['nombre_pro']."</td>";	
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>











