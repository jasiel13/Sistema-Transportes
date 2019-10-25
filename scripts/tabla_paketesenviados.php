<?php

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = "select nombre_pro,count(*) as total_paquetes 
from provincia
inner join paquete on provincia.id_provincia=paquete.id_provincia
group by nombre_pro";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>PROVINCIA</th>
<th>TOTAL DE PAQUETES</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='success'>";
	echo "<td>".$row['nombre_pro']."</td>";
	echo "<td>".$row['total_paquetes']."</td>";
	
}
echo "</table>";
mysqli_close($con);
?>