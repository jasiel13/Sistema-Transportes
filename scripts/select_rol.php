<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='rol' class='form-control'>";
echo '<option value="">Rol de Usuario...</option>';

$selector="select id_user, rol from usuarios";

$consulta=mysqli_query($con, $selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value="'.$row['id_user'].'">'.$row['rol'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>
