<?php
$id=$_POST['a'];
$nom=$_POST['nom1'];
$ap1=$_POST['ap1'];a
$ap2=$_POST['ap2'];
$tel=$_POST['tel1'];
$dir=$_POST['dir1'];
$sal=$_POST['sal1'];
$ci=$_POST['ci1'];

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= " UPDATE chofer SET nombre = '$nom', ap_pat = '$ap1', ap_mat = '$ap2', telefono = '$tel', direccion = '$dir' , salario = '$sal' ,ciudad = '$ci' WHERE id_chofer  = ' " . $id . " ' ";

$resultado=mysqli_query($con, $query) or die (mysqli_error());

$query2="SELECT  * FROM chofer WHERE id_chofer  = ' " . $id . " ' ";
$result=mysqli_query($con, $query2) or die (mysqli_error());

echo "<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Id Chofer</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Teleono</th>
<th>Direccion</th>
<th>Salario</th>
<th>Ciudad</th>
</tr>";

while ($row=mysqli_fetch_array($result))
{
	echo "<tr class='danger'>";
	echo "<td>".$row['id_chofer']."</td>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['ap_pat']."</td>";
	echo "<td>".$row['ap_mat']."</td>";
	echo "<td>".$row['telefono']."</td>";
	echo "<td>".$row['direccion']."</td>";
	echo "<td>".$row['salario']."</td>";
	echo "<td>".$row['ciudad']."</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>











