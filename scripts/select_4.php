<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";

echo "<select id='d' class='form-control' onchange='muestraDatos4(this.value)'>";
echo '<option value="">Seleccionar paquete...</option>';

$selector="select codigo, descripcion, destinatario from paquete";

$consulta=mysqli_query($con, $selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['codigo'].'">'.$row['descripcion']."     /                         ".$row['destinatario'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>