<?php
  session_start();  

  if ( isset($_SESSION["usuario"]))
  { //Comprovar si las sessiones existen
      if ($_SESSION["rol"] == "administrador" || $_SESSION["rol"] == "registrador" || $_SESSION["rol"] == "invitado") 
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

  <script type="text/javascript">

   //CODIGO PARA MANDAR LLAMAR EL SELECT DEL CHOFER
  var objetoAjax7=new XMLHttpRequest();
  objetoAjax7.open("get","scripts/select_chofer_fecha.php",true);
  objetoAjax7.onreadystatechange=procesaPeticion7;
  objetoAjax7.send(null);

  function procesaPeticion7()
  {
    if(objetoAjax7.readyState==4 && objetoAjax7.status==200)
    {
      var div=document.getElementById("resultado7");
      div.innerHTML=objetoAjax7.responseText;
    }
  }
//CODIGO PARA PONER LA CONSULTA Y CREAR LA TABLA
function elige_fecha(){

    var chofer = document.getElementById("cho").value;
    var fecha1 = document.getElementById("Fecha1").value;
    var fecha2 = document.getElementById("Fecha2").value;

    ObjetoAjax = new XMLHttpRequest();

    ObjetoAjax.open("POST", "scripts/tabla_rango_fechas.php", true);
    ObjetoAjax.onreadystatechange = procesaPeticion;

    ObjetoAjax.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "cho=" + chofer +  "&Fecha1=" + fecha1 + "&Fecha2=" + fecha2;

    ObjetoAjax.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax.readyState == 4 && ObjetoAjax.status==200) {

        var div = document.getElementById("tabla7");
        div.innerHTML = ObjetoAjax.responseText;

      } 
    }

  }

//OBTENER TABLA FECHAS DE RANGOS

/*function traertabla()
{

      Ajax8=new XMLHttpRequest();
      Ajax8.open("get","scripts/tabla_rango_fechas.php",true);
      Ajax8.onreadystatechange=function(){
      var fechas=document.getElementById("tabla");
      fechas.innerHTML=Ajax8.responseText;
      };
      Ajax8.send(null);
    
  }*/   
  </script>
  </head>

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
           AUMENTOS,FECHAS,PAQUETES<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="aumento.php">Aumento</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="fecha_index.php">Rango de fechas</a></li>
           <li role="separator" class="divider"></li>
          <li><a href="modulo_paquete.php">Modulo de paquetes</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="modulo_reportes.php">Modulo de reportes</a></li>           
          </ul>        
      </ul> 

<ul class="nav navbar-nav navbar-right">
          <!--DROPDOWN1-->
          <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <?php echo "<h4> Hola! ".$_SESSION['usuario']."</h4>";?>    
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

<!--FORMULARIO-->
<form class="form-horizontal">

<div class="container well">

 <h3 align="center">Modulo Conduccion De Camiones</h3>
 <br>

 <div class="form-group">
  <label for='id_chofer' class='col-sm-4 control-label'>Elige chofer</label>
  <div id="resultado7" class="col-sm-5"></div>
  </div>
  <br>
  <br>
  <div class="form-group">

  <label for="Fecha1" class="col-sm-1 control-label">Fecha Inicio</label>
  <div class="col-sm-4">
  <input type="date" class="form-control" id="Fecha1" name="Fecha1" placeholder="Fecha Inicio"> 
  </div>

  <label for="Fechas" class="col-sm-1 control-label">A</label>

  <label for="Fecha2" class="col-sm-2 control-label">Fecha Final</label>
  <div class="col-sm-4">
  <input type="date" class="form-control" id="Fecha2" name="Fecha2" placeholder="Fecha Final"> 
  </div>
  </div>

  <button class="btn btn-info" type="button" onclick="elige_fecha()">Aplicar</button>
  <br>
  <br>
  <h3 align="center">Tabla De Resultados</h3>
  <br>
  <div id="tabla7" class="table-responsive"></div>

</div>
</form>
<!--CIERRE DE FORMULARIO-->

</body>
</html>