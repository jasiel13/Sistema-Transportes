<?php
$f=intval($_GET['f']);


$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query=" select ch.id_chofer,ch.nombre,ch.ap_pat,ch.ap_mat,cam.matricula, con.fecha from camion cam
inner join conduce con on cam.matricula=con.matricula
inner join chofer ch on ch.id_chofer=con.id_chofer
where ch.id_chofer=$f";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

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
mysqli_close($con);
?>