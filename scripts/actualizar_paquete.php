<?php
$id=$_POST['d'];
$desc=$_POST['des1'];
$dest=$_POST['dest1'];
$dir=$_POST['di1'];
$chofer=$_POST['editar_chof'];
$prov=$_POST['editar_pro'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE paquete SET descripcion = '$desc', destinatario = '$dest', dir_destinatario = '$dir' , id_chofer = '$chofer', 
id_provincia = '$prov' WHERE codigo  = ' " . $id. " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2="
select codigo,descripcion,destinatario,dir_destinatario,ch.nombre,pr.nombre_pro from chofer ch
inner join paquete p on p.id_chofer=ch.id_chofer 
inner join provincia pr on pr.id_provincia=p.id_provincia
where codigo  = ' " . $id . " ' ";

$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

while ($row=mysqli_fetch_array($result))
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











