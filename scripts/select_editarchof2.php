<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";

echo "<select id='editar_chof2' class='form-control'>";
echo '<option value="">Seleccionar chofer...</option>';

$selector="select id_chofer, nombre, ap_pat, ap_mat from chofer";

$consulta=mysqli_query($con, $selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_chofer'].'">'.$row['nombre']." ".$row['ap_pat']." ".$row['ap_mat'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>

