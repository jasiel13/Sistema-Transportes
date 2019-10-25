<?php
$b=intval($_GET['b']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from chofer where id_chofer=$b";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

while ($row=mysqli_fetch_array($resultado))
{
  echo' 
  <label for="ch" class="col-sm-2 control-label">Nombre</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="nom1" name="nom1" placeholder="Nombre" value="'.$row['nombre'].'">
  </div>  ';

echo '<label for="ap" class="col-sm-2 control-label">Apellido paterno</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="ap1" name="ap1" placeholder="Apellido Paterno" value="'.$row['ap_pat'].'">
  </div>';

echo '<label for="ap" class="col-sm-2 control-label">Apellido materno</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="ap2" name="ap2" placeholder="Apellido Materno" value="'.$row['ap_mat'].'">
  </div>
  <br>
  <br>
  <br>';

echo '<label for="t" class="col-sm-2 control-label">Telefono</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="tel1" name="tel1" placeholder="Telefono" value="'.$row['telefono'].'">
  </div>';

  echo '<label for="dir" class="col-sm-2 control-label">Direccion</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="dir1" name="dir1" placeholder="Direccion" value="'.$row['direccion'].'">
  </div>';

  echo '<label for="sal" class="col-sm-2 control-label">Salario</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="sal1" name="sal1" placeholder="Salario" value="'.$row['salario'].'">
  </div>
  <br>
  <br>
  <br>';

  echo '<label for="ciu" class="col-sm-2 control-label">Ciudad</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="ci1" name="ci1" placeholder="Ciudad" value="'.$row['ciudad'].'">
  </div>';
}

mysqli_close($con);
?>