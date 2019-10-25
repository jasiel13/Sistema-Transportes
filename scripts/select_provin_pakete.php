<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='provin' class='form-control' onchange='elige_provin()'>";
echo '<option value="">Seleccionar provincia...</option>';

$selector3="select id_provincia, nombre_pro from provincia";

$consulta=mysqli_query($con, $selector3) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_provincia'].'">'.$row['nombre_pro'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>