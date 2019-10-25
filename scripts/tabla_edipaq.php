<?php
$e=intval($_GET['e']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());

$query= "

select codigo,descripcion,destinatario,dir_destinatario,ch.nombre,pr.nombre_pro from chofer ch
inner join paquete p on p.id_chofer=ch.id_chofer 
inner join provincia pr on pr.id_provincia=p.id_provincia
where codigo =$e
";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

while ($row=mysqli_fetch_array($resultado))
{
	echo '<label for="des" class="col-sm-2 control-label">Descripcion</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="des1" name="des1" placeholder="Descripcion" value="'.$row['descripcion'].'">
  </div>';

  echo '<label for="dest" class="col-sm-2 control-label">Destinatario</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="dest1" name="dest1" placeholder="Destinatario" value="'.$row['destinatario'].'">
  </div>';

  echo '<label for="dir" class="col-sm-2 control-label">Dir_Destinatario</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="di1" name="di1" placeholder="Dir_Destinatario" value="'.$row['dir_destinatario'].'">
  </div>';
	
}

mysqli_close($con);
?>