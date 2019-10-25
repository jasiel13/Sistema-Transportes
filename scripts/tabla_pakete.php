<?php
$chofer = $_POST['ch'];
$provincia=$_POST['provin'];

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = "select pa.codigo,pa.descripcion,pa.destinatario,pa.dir_destinatario,ch.nombre,pr.nombre_pro 
from paquete pa 
inner join chofer ch on pa.id_chofer=ch.id_chofer
inner join provincia pr on pr.id_provincia=pa.id_provincia
where ch.id_chofer= ' " . $chofer . " '
and pr.id_provincia = ' " . $provincia . " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='success'>";
	echo "<td>".$row['codigo']."</td>";
	echo "<td>".$row['descripcion']."</td>";
	echo "<td>".$row['destinatario']."</td>";
	echo "<td>".$row['dir_destinatario']."</td>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['nombre_pro']."</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>