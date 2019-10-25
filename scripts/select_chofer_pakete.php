<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='ch' class='form-control' onchange='elige_provin()'>";
echo '<option value="">Seleccionar chofer...</option>';

$selector8="select id_chofer, nombre, ap_pat, ap_mat from chofer";

$consulta=mysqli_query($con, $selector8) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_chofer'].'">'.$row['nombre']." ".$row['ap_pat']." ".$row['ap_mat'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>
