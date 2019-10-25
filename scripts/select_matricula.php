<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
//echo "<label for='matricula' class='col-sm-1 control-label'>Matricula</label>";
echo "<select id='matricula' class='form-control'>";
echo '<option value="">Seleccionar Matricula...</option>';

$selector4="select matricula, modelo from camion";

$consulta=mysqli_query($con, $selector4) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['matricula'].'">'.$row['modelo'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>