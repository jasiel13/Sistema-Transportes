<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
//echo "<label for='id_chofer' class='col-sm-1 control-label'>ID_chofer</label>";
echo "<select id='chofert' class='form-control'>";
echo '<option value="">Seleccionar chofer...</option>';

$selector3="select id_chofer, nombre, ap_pat, ap_mat from chofer";

$consulta=mysqli_query($con, $selector3) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_chofer'].'">'.$row['nombre']." ".$row['ap_pat']." ".$row['ap_mat'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>

