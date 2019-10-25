<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";

echo "<select id='b' class='form-control' onchange='muestraDatos3(this.value)'>";
echo '<option value="">Seleccionar camion...</option>';

$selector="select matricula, modelo, tipo, potencia from camion";

$consulta=mysqli_query($con, $selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['matricula'].'">'.$row['modelo']." ".$row['tipo']." ".$row['potencia'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>