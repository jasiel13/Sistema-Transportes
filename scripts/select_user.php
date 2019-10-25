<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='us' class='form-control' onchange='muestraDatos1(this.value)'>";
echo '<option value="">Seleccionar usuario...</option>';

$selector50="select id_user, user from usuarios";

$consulta=mysqli_query($con, $selector50) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta))
{
   echo '<option value="'.$row['id_user'].'">'.$row['user'].'</option>';
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>
