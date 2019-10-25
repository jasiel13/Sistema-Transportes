<?php

$chofer = $_POST['ch'];
$provincia=$_POST['provin'];

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

if ($chofer>0 and $provincia>0) {
  $query="select pa.codigo,pa.descripcion,pa.destinatario,pa.dir_destinatario,ch.nombre,pr.nombre_pro 
from paquete pa 
inner join chofer ch on pa.id_chofer=ch.id_chofer
inner join provincia pr on pr.id_provincia=pa.id_provincia
where ch.id_chofer= ' " . $chofer . " '
and pr.id_provincia = ' " . $provincia . " ' ";

$resultado=mysqli_query($con,$query);

if (!$resultado) {

  echo "Problemas con la conexion" . mysqli_error();
  exit();

}
else
{
  echo
"<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

  while ($row=mysqli_fetch_array($resultado)) 
  {
    echo "<tr class='success'>";
    echo "<td>".$row['codigo']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['destinatario']."</td>";
    echo "<td>".$row['dir_destinatario']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['nombre_pro']."</td>";
    echo "</tr>";
    }
    echo "</table>";
    } 
  }

elseif ($chofer>0) {

  $query="select pa.codigo,pa.descripcion,pa.destinatario,pa.dir_destinatario,ch.nombre,pr.nombre_pro 
from paquete pa 
inner join chofer ch on pa.id_chofer=ch.id_chofer
inner join provincia pr on pr.id_provincia=pa.id_provincia
where ch.id_chofer= ' " . $chofer . " ' ";

$resultado2=mysqli_query($con,$query);

if (!$resultado2) {

  echo "Problemas con la conexion" . mysqli_error();
  exit();

}
else
{
  echo
"<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

  while ($row=mysqli_fetch_array($resultado2)) 
  {
    echo "<tr class='success'>";
    echo "<td>".$row['codigo']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['destinatario']."</td>";
    echo "<td>".$row['dir_destinatario']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['nombre_pro']."</td>";
    echo "</tr>";
    }
    echo "</table>";
    } 
  }

elseif ($provincia>0) {
  $query="select pa.codigo,pa.descripcion,pa.destinatario,pa.dir_destinatario,ch.nombre,pr.nombre_pro 
from paquete pa 
inner join chofer ch on pa.id_chofer=ch.id_chofer
inner join provincia pr on pr.id_provincia=pa.id_provincia
where pr.id_provincia = ' " . $provincia . " ' ";

$resultado3=mysqli_query($con,$query);

if (!$resultado3) {

  echo "Problemas con la conexion" . mysqli_error();
  exit();

}
else
{
  echo
"<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

   while ($row=mysqli_fetch_array($resultado3)) 
  {
    echo "<tr class='success'>";
    echo "<td>".$row['codigo']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['destinatario']."</td>";
    echo "<td>".$row['dir_destinatario']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['nombre_pro']."</td>";
    echo "</tr>";
    }
    echo "</table>";
    } 
  }

elseif ($chofer==0 and $provincia==0) {
  $query="select pa.codigo,pa.descripcion,pa.destinatario,pa.dir_destinatario,ch.nombre,pr.nombre_pro 
from paquete pa 
inner join chofer ch on pa.id_chofer=ch.id_chofer
inner join provincia pr on pr.id_provincia=pa.id_provincia ";

$resultado4=mysqli_query($con,$query);

if (!$resultado4) {

  echo "Problemas con la conexion" . mysqli_error();
  exit();

}
else
{ 

  echo
"<table border='4' class='table table-hover table-bordered table-condensed'>
<tr>
<th>Codigo</th>
<th>Descripcion</th>
<th>Destinatario</th>
<th>Dir_destinatario</th>
<th>Nombre</th>
<th>Nombre Provincia</th>
</tr>";

   while ($row=mysqli_fetch_array($resultado4)) 
  {
    echo "<tr class='success'>";
    echo "<td>".$row['codigo']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['destinatario']."</td>";
    echo "<td>".$row['dir_destinatario']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['nombre_pro']."</td>";
    echo "</tr>";
    }
    echo "</table>";
    } 
  }

mysqli_close($con);
?>