<?php
$u=intval($_GET['u']);

$con=mysqli_connect("localhost","root","","transportes") or die(mysqli_error());
$query="select * from usuarios where id_user=$u";
$resultado=mysqli_query($con, $query) or die (mysqli_error());

while ($row=mysqli_fetch_array($resultado))
{


  echo '
  <label for="use" class="col-sm-2 control-label">Usuario Nuevo</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="use" name="use" placeholder="Nuevo Usuario" value="'.$row['user'].'">
  </div>'; 

echo '
  <label for="pas" class="col-sm-2 control-label">Password Nuevo</label>
  <div class="col-sm-2">
  <input type="text" class="form-control" id="pas" name="pas" placeholder="Nuevo Password" value="'.$row['pass'].'">
  </div>';

  echo '<label for="rol" class="col-sm-1 control-label">Rol</label>
  <div class="col-sm-2">
        <select id="rol" class="form-control">
        <option value="">Seleccionar rol...</option> 
        <option value="administrador">Administrador</option> 
        <option value="registrador">Registrador</option>
        <option value="invitado">Invitado</option>  
      </select> 
  </div>';	
}
mysqli_close($con);
?>