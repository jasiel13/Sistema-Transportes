<?php
//$q=intval($_GET['q']);

$conexion=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= "
select nombre,ap_pat,ap_mat,cam.matricula,fecha from chofer ch
inner join conduce con on ch.id_chofer=con.id_chofer
inner join camion cam on cam.matricula=con.matricula";

$resultado=mysqli_query($conexion, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Nombre</th>
<th>Apellido paterno</th>
<th>Apellido materno</th>
<th>Matricula</th>
<th>Fecha</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='info'>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['ap_pat']."</td>";
	echo "<td>".$row['ap_mat']."</td>";
	echo "<td>".$row['matricula']."</td>";
	echo "<td>".$row['fecha']."</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($conexion);
?>