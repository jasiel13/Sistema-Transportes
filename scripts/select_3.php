<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<br>";
echo "<select id='c' class='form-control' onchange='muestraDatos3(this.value)'>";
echo '<option value="">Seleccionar provincia...</option>';

$selector2="select id_provincia, nombre_pro from provincia";

$consulta=mysqli_query($con, $selector2) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_provincia'].'">'.$row['nombre_pro'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>

