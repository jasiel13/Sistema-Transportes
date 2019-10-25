<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
//echo "<label for='id_provincia' class='col-sm-1 control-label'>IDprovincia</label>";
echo "<br>";
echo "<select id='provincia' class='form-control'>";
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