<?php

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = "select sum(salario) as Nomina from chofer";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>NOMINA</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='success'>";
	echo "<td>".$row['Nomina']."</td>";
	
}
echo "</table>";
mysqli_close($con);
?>