<?php

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = "select modelo,tipo,potencia, count(*)as menos_manejado 
from camion
inner join conduce on camion.matricula= conduce.matricula 
group by camion.matricula order by menos_manejado limit 1
";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Modelo</th>
<th>Tipo</th>
<th>Potencia</th>
<th>CAMION MENOS MANEJADO</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='warning'>";	
	echo "<td>".$row['modelo']."</td>";
	echo "<td>".$row['tipo']."</td>";
	echo "<td>".$row['potencia']."</td>";
	echo "<td>".$row['menos_manejado']."</td>";	
	echo "</tr>";
	
}
echo "</table>";
mysqli_close($con);
?>