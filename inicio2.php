<?php
  session_start();  

  if ( isset($_SESSION["usuario"]))
  { //Comprovar si las sessiones existen
      if ($_SESSION["rol"] == "registrador") 
      {
        
      } 
      else {
        header("location:index.php");
      }  
  }  
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name ="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<title>Examen 1</title>
	</head>
  <script type="text/javascript">
    
    
  </script>

	<body>
<!--inicio de navbar-->
<nav class="navbar navbar-default" style="background-color: #A9E2F3;">
  <div class="container-fluid">

    <div class="navbar-header">  
    
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    <a class="navbar-brand" href="#"><h4>Transportes Frontera</h4></a>      
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
          <!--DROPDOWN1-->
          <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <?php echo "<h4>Bienvenido ".$_SESSION['usuario']."</h4>";?>    
      </a>
          <ul class="dropdown-menu">
          <li><?php echo"<a align='center' href='logout.php'>Cerrar sesion</a>";?></li>
          <li role="separator" class="divider"></li>                   
          </ul>        
      </ul>    
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--CIERRE DE NAVBAR-->

<div>
  <H1 align="center">HOLA ! Registrador</H1>
</div>

<!--PANEL DE OPCIONES-->
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading"><h4 align="center">PANEL DE ACCESO</h4></div>
            <div class="panel-body" id="color">
          
            <div>
            <h4 align="center"><a href="transportes_frontera.php">Pagina de inicio</a></h4>
            <br>
            </div>



            </div>
          </div>
      </div> 
    </div> 
 </div> 
 <!--CIERRE DE PANEL DE OPCIONES--> 
</body>
</html>