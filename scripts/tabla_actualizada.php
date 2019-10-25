<?php
//$q=intval($_GET['q']);
$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select id_chofer,nombre, ap_pat, ap_mat, salario from chofer";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Chofer</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Salario</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='primary'>";
	echo "<td>".$row['id_chofer']."</td>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['ap_pat']."</td>";
	echo "<td>".$row['ap_mat']."</td>";	
	echo "<td>".$row['salario']."</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>