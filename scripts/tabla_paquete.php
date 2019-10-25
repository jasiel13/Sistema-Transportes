<?php
//$q=intval($_GET['q']);

$conexion=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= "

select codigo,descripcion,destinatario,dir_destinatario,ch.nombre,pr.nombre_pro from chofer ch
inner join paquete p on p.id_chofer=ch.id_chofer 
inner join provincia pr on pr.id_provincia=p.id_provincia
";

$resultado=mysqli_query($conexion, $query) or die (mysqli_error());

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
mysqli_close($conexion);
?>