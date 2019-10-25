<?php
$chofer = $_POST['cho'];
$fecha1=$_POST['Fecha1'];
$fecha2=$_POST['Fecha2'];

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

$query = " select cam.matricula, cam.modelo, cam.tipo, cam.potencia, con.fecha from camion cam
inner join conduce con on cam.matricula=con.matricula
inner join chofer ch on ch.id_chofer=con.id_chofer
where ch.id_chofer = ' " . $chofer . " '
and fecha 
between ' " . $fecha1 . " ' and ' " . $fecha2 . " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Matricula</th>
<th>Modelo</th>
<th>Tipo</th>
<th>Potencia</th>
<th>Fecha</th>
</tr>";

while ($row=mysqli_fetch_array($resultado))
{
	echo "<tr class='info'>";
	echo "<td>".$row['matricula']."</td>";
	echo "<td>".$row['modelo']."</td>";
	echo "<td>".$row['tipo']."</td>";
	echo "<td>".$row['potencia']."</td>";
	echo "<td>".$row['fecha']."</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);             
?>

