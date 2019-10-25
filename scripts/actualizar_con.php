<?php
$id=$_POST['e'];
//$chofer=$_POST['editar_chof2'];
$mat=$_POST['editar_mat'];
$fecha=$_POST['editar_fecha'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE conduce SET matricula = '$mat', fecha = '$fecha' WHERE id_chofer  = ' " . $id . " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2= " select ch.id_chofer,ch.nombre,ch.ap_pat,ch.ap_mat,cam.matricula, con.fecha from camion cam
inner join conduce con on cam.matricula=con.matricula
inner join chofer ch on ch.id_chofer=con.id_chofer
where ch.id_chofer= ' " . $id . " ' ";

$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Nombre</th>
<th>Apellido paterno</th>
<th>Apellido materno</th>
<th>Matricula</th>
<th>Fecha</th>
</tr>";

while ($row=mysqli_fetch_array($result))
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











