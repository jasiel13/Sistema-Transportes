<?php
include('conexion.php');

echo "<form>";

echo "<select id='a' class='form-control' onchange='muestraDatos2(this.value)'>";
echo '<option value="">Seleccionar Nota...</option>';

$selector="select nota from notascredito";

$consulta=mysql_query($selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['nota'].'"></option>';	
}
echo "</select>";
echo "</form>";
?>