<?php
//$q=intval($_GET['q']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from provincia";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Provincia</th>
<th>Nombre</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='warning'>";
	echo "<td>".$row['id_provincia']."</td>";
	echo "<td>".$row['nombre_pro']."</td>";	
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>