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

  <style type="text/css">
    #no
      { 
        width: 100px;
        height: 100px;
        display: block;
        border-radius: 50px;
        margin: 0 auto 10px;

      }
      
  </style>

<body>
<!--inicio de navbar-->
<nav class="navbar navbar-default" style="background-color: #CEF6F5;">
  <div class="container-fluid">

    <div class="navbar-header">  
    
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    <a class="navbar-brand" href="transportes_frontera.php">Transportes Frontera</a>      
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <!--DROPDOWN1-->
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          FECHAS,PAQUETES<span class="caret"></span></a>
          <ul class="dropdown-menu">          
          <li><a href="fecha_index.php">Rango de fechas</a></li>
           <li role="separator" class="divider"></li>
          <li><a href="modulo_paquete.php">Modulo de paquetes</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="modulo_reportes.php">Modulo de reportes</a></li>          
          </ul>        
      </ul>   
      
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--CIERRE DE NAVBAR-->

<h1 align="center">ERROR! Accesso Denegado</h1>
<!--PANEL DE OPCIONES-->
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading"><h4 align="center">Usuario No Permitido!!</h4></div>
            <div class="panel-body" id="color">
          
            <div>
             <img src="img/no_acceso.jpg" class="image-responsive" id="no">
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