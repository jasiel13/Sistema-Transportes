<?php
$mat=$_POST['b'];
$modelo=$_POST['mod1'];
$tipo=$_POST['tip1'];
$potencia=$_POST['pot1'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE camion SET modelo = '$modelo', tipo = '$tipo', potencia = '$potencia' WHERE matricula  = ' " . $mat. " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2="SELECT  * FROM camion WHERE matricula  = ' " . $mat . " ' ";
$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Matricula</th>
<th>Modelo</th>
<th>Tipo</th>
<th>Potencia</th>
</tr>";

while ($row=mysqli_fetch_array($result))
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











