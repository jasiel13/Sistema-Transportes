<?php
$reporte=$_POST["opcion"];
switch ($reporte) 
{
	case 1:
	$reporte="tabla_calculonom.php";
	break;
case 2:
	$reporte="tabla_paketesenviados.php";
	break;
case 3:
	$reporte="tabla_maspaketes.php";
	break;
case 4:
	$reporte="tabla_menospaketes.php";
	break;
case 5:
	$reporte="tabla_masmanejado.php";
	break;
case 6:
	$reporte="tabla_menosmanejado.php";
	break;	
	default:
		$reporte="error.";
		break;
}
$contenido=file_get_contents("http://localhost/trans/scripts/".$reporte);
 echo $contenido; 
 ?>
