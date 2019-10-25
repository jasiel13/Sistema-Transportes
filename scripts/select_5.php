<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());
echo "<form>";

echo "<select id='e' class='form-control' onchange='muestraDatos5(this.value)'>";
echo '<option value="">Seleccionar conduce...</option>';

$selector=" select ch.id_chofer,ch.nombre,ch.ap_pat,ch.ap_mat,con.fecha from camion cam
inner join conduce con on cam.matricula=con.matricula
inner join chofer ch on ch.id_chofer=con.id_chofer";

$consulta=mysqli_query($con, $selector) or die (mysqli_error());
while ($row=mysqli_fetch_array($consulta)) 
{
   echo '<option value= "'.$row['id_chofer'].'">'.$row['nombre']." ".$row['ap_pat']." ".$row['ap_mat']. " /                               ".$row['fecha'].'</option>';	
}
echo "</select>";
echo "</form>";
mysqli_close($con);

?>