<?php
	session_start();
     
        //echo "valor de la sesion".$_SESSION['rol'];

		if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol']))
		 {
		   header("location:index.php");
	      } 
	   else
	    {
		switch ($_SESSION['rol']) {

			case "administrador":
						header("location:inicio.php");
			break;
			case "registrador":
						header("location:inicio2.php");
			break;
			
			case "invitado":
	     				header("location:inicio3.php");
			break;			
			
			default:
				header("location:index.php");
				break;
		}
	}
?>