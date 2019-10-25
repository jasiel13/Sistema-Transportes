<?php

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = "select nombre,ap_pat,ap_mat, count(*)as total_de_paquetes 
from chofer
inner join paquete on chofer.id_chofer= paquete.id_chofer 
group by chofer.id_chofer order by total_de_paquetes desc limit 1";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>NOMBRE</th>
<th>APELLIDO PATERNO</th>
<th>APELLIDO MATERNO</th>
<th>MAS PAQUETES ENVIADOS</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='danger'>";	
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['ap_pat']."</td>";
	echo "<td>".$row['ap_mat']."</td>";
	echo "<td>".$row['total_de_paquetes']."</td>";
		echo "</tr>";
	
}
echo "</table>";
mysqli_close($con);
?>