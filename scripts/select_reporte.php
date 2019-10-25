<?php
$con=mysqli_connect("localhost","root","","transportes") 
or die(mysqli_error());

echo "<form>";
echo "<select id='reporte' class='form-control' onchange='enviar()'>";
echo '<option value="">Seleccionar Reporte...</option>';
echo '<option value ="1">Calculo de Nomina</option>';
echo '<option value ="2">Paquetes enviados por provincia</option>';
echo '<option value ="3">Chofer entrego mas paquetes</option>';
echo '<option value ="4">Chofer entrego menos paquetes</option>';
echo '<option value ="5">Camion mas manejado</option>';
echo '<option value ="6">Camion menos manejado</option>';

echo "</select>";
echo "</form>";
mysqli_close($con);

?>

