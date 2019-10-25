<?php
$chofer = $_POST['chof'];
$porcentaje=$_POST['porcen'];

$con=mysqli_connect("localhost","root","","transportes") or die (mysqli_error());

//OBTIENE EL SALARIO DEL COHFER DE LA BASE DE DATOS
$query="select salario from chofer where id_chofer= '". $chofer."'";
$result=mysqli_query($con, $query) or die (mysqli_error());
$row=mysqli_fetch_array($result);

//OPERACION PARA EL PORCENTAJE
$salarioBD=$row['salario'];
$nuevosalario=$salarioBD*(($porcentaje/100)+1);
 
//$insertar = " UPDATE chofer SET salario = salario * .$porcentaje   + salario WHERE id_Chofer  = ' " . $chofer . " ' ";
$insertar = " UPDATE chofer SET salario = '$nuevosalario' WHERE id_chofer  = ' " . $chofer . " ' ";
mysqli_query($con,$insertar) or die ("Problemas al insertar".mysqli_error());


$resultado = mysqli_query ($con, $insertar);
// verificamos que no haya error
	if (!$resultado)
	{
	   echo "La consulta SQL contiene errores." . mysqli_error();
	   exit();
	}
	else {

		$NewConsulta = " SELECT * FROM chofer WHERE id_chofer  = ' " . $chofer . " ' ";

		$Newresultado = mysqli_query ($con, $NewConsulta);

		if (!$Newresultado)
		{
		   echo "La consulta SQL contiene errores." . mysqli_error();
		   exit();
		}

		else {

			while ($row = mysqli_fetch_array($Newresultado))
			{
            echo "<li class='list-group-item'>" . "ID :  " . $row['id_chofer']. "</li> 
                  <li class='list-group-item'>" . "Nombre :  " . $row['nombre']. "</li> 
              	  <li class='list-group-item'>" . "Apellido Paterno : " .$row['ap_pat'] . "</li>
              	  <li class='list-group-item'>" . "Apellido Materno : " . $row['ap_mat'] . "</li>               
                  <li class='list-group-item'>" . "Salario : " . $row['salario'] . "</li>";                 
                }
		       }
              }
              
?>

