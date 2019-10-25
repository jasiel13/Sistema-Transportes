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
//CODIGO PARA MANDAR LLAMAR EL SELECT DE REPORTE
  var objetoAjax12=new XMLHttpRequest();
  objetoAjax12.open("get","scripts/select_reporte.php",true);
  objetoAjax12.onreadystatechange=procesaPeticion12;
  objetoAjax12.send(null);

  function procesaPeticion12()
  {
    if(objetoAjax12.readyState==4 && objetoAjax12.status==200)
    {
      var div=document.getElementById("result");
      div.innerHTML=objetoAjax12.responseText;
    }
  } 
  
  //CODIGO PARA ELEGIR OPCIONES DEL SELECT
  function enviar()
  {
    //agarras el value O ID del select para la OPCION
    var valor=document.getElementById("reporte").value;
    //armando una cadena 
    dato="opcion="+valor;

    var ajax14=new XMLHttpRequest();
    ajax14.open("post","scripts/switch_selectreporte.php",true);
    ajax14.onreadystatechange=procesapeticion;
    ajax14.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //variable dato donde se concatena
    ajax14.send(dato);

    /*//agarras el mismo value del select para el texto
    var ajax15=new XMLHttpRequest();
    ajax15.open("post","scripts/switch_selectreporte.php",true)
    ajax15.onreadystatechange=procesapeticion;
    ajax15.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    ajax15.send(dato);*/

    function procesapeticion()
    {
      if(ajax14.readyState==4 && ajax14.status==200)
      { 
        var div=document.getElementById("tabla");
        div.innerHTML=ajax14.responseText;    
        document.getElementById("reporte").value="";

      }
    }

  }   
 
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
     <?php echo "<h4> Hola!  ".$_SESSION['usuario']."</h4>";?>    
      </a>
          <ul class="dropdown-menu">
          <li><?php echo"<a align='center' href='logout.php'>Cerrar sesion</a>";?></li>
          <li role="separator" class="divider"></li>                   
          </ul>        
      </ul> 
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--CIERRE DE NAVBAR-->

<form class="form-horizontal">

<div class="container well">
<h3 align="center">Modulo De Reportes</h3>
<br>

 <div class="form-group">
  <label for='reportes' class='col-sm-4 control-label'>Elige una opcion de reportes</label>
  <div id="result" class="col-sm-5"></div>
  </div>

  <br>
  <br>

  <div id="tabla" class="table-responsive">No hay opcion de tablas de reportes</div>
 
</div>
</form>

</body>
</html>