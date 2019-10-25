<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='chof' class='form-control' onchange='muestraDatos(this.value)'>";
echo '<option value="">Seleccionar chofer...</option>';

$selector6="select id_chofer, nombre, ap_pat, ap_mat from chofer";

$consulta=mysqli_query($con, $selector6) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_chofer'].'">'.$row['nombre']." ".$row['ap_pat']." ".$row['ap_mat']." ".$row['salario'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>
