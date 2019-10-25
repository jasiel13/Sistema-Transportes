<?php
$c=intval($_GET['c']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from camion where matricula=$c";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

while ($row=mysqli_fetch_array($resultado))
{
	echo'<label for="mo" class="col-sm-2 control-label">Modelo</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="mod1" name="mod1" placeholder="Modelo" value="'.$row['modelo'].'">
  </div>';

  echo '<label for="t" class="col-sm-2 control-label">Tipo</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="tip1" name="tip1" placeholder="Tipo" value="'.$row['tipo'].'">
  </div>';
	
	echo '<label for="p" class="col-sm-2 control-label">Potencia</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="pot1" name="pot1" placeholder="Potencia" value="'.$row['potencia'].'">
  </div>';
}

mysqli_close($con);
?>