<?php
//$q=intval($_GET['q']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from camion";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Matricula</th>
<th>Modelo</th>
<th>Tipo</th>
<th>Potencia</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>".$row['matricula']."</td>";
	echo "<td>".$row['modelo']."</td>";
	echo "<td>".$row['tipo']."</td>";
	echo "<td>".$row['potencia']."</td>";	
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

