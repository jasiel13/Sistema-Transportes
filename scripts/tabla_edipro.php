<?php
$d=intval($_GET['d']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from provincia where id_provincia=$d";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

while ($row=mysqli_fetch_array($resultado))
{
	echo '
	<label for="no" class="col-sm-2 control-label">Nombre</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Nombre Provincia" value="'.$row['nombre_pro'].'">
  </div>';
}

mysqli_close($con);
?>