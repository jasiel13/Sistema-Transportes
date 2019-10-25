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
  var objetoAjax8=new XMLHttpRequest();
  objetoAjax8.open("get","scripts/select_chofer_pakete.php",true);
  objetoAjax8.onreadystatechange=procesaPeticion8;
  objetoAjax8.send(null);

  function procesaPeticion8()
  {
    if(objetoAjax8.readyState==4 && objetoAjax8.status==200)
    {
      var div=document.getElementById("resultado8");
      div.innerHTML=objetoAjax8.responseText;
    }
  }

//CODIGO PARA MANDAR LLAMAR EL SELECT DE LA PROVINCIA
  var objetoAjax9=new XMLHttpRequest();
  objetoAjax9.open("get","scripts/select_provin_pakete.php",true);
  objetoAjax9.onreadystatechange=procesaPeticion9;
  objetoAjax9.send(null);

  function procesaPeticion9()
  {
    if(objetoAjax9.readyState==4 && objetoAjax9.status==200)
    {
      var div=document.getElementById("resultado9");
      div.innerHTML=objetoAjax9.responseText;
    }
  }

  //CODIGO PARA MANDAR LLAMAR LA TABLA PAQUETE
 var objetoAjax10=new XMLHttpRequest();
  objetoAjax10.open("get","scripts/tabla_paquete.php",true);
  objetoAjax10.onreadystatechange=procesaPeticion10;
  objetoAjax10.send(null);

  function procesaPeticion10()
  {
    if(objetoAjax10.readyState==4 && objetoAjax10.status==200)
    {
      var div=document.getElementById("resultado10");
      div.innerHTML=objetoAjax10.responseText;
    }
  }

//CODIGO PARA PONER LA CONSULTA Y CREAR LA TABLA
function elige_provin(){

    var chofer = document.getElementById("ch").value;
    var provincia = document.getElementById("provin").value;   

    ObjetoAjax = new XMLHttpRequest();

    ObjetoAjax.open("POST", "scripts/pakete_bet.php", true);//tabla_pakete
    ObjetoAjax.onreadystatechange = procesaPeticion;

    ObjetoAjax.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "ch=" + chofer +  "&provin=" + provincia;

    ObjetoAjax.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax.readyState == 4 && ObjetoAjax.status==200) {

        var div = document.getElementById("resultado10");
        div.innerHTML = ObjetoAjax.responseText;

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

<!--FORMULARIO-->
<form class="form-horizontal">

<div class="container well">

 <h3 align="center">Modulo Gestion De Paquetes</h3>
 <br>

 <div class="form-group">
  <label for='id_chofer' class='col-sm-1 control-label'>Elige chofer</label>
  <div id="resultado8" class="col-sm-4"></div> 

  <label for='id_provin' class='col-sm-2 control-label'>Elige provincia</label>
  <div id="resultado9" class="col-sm-4"></div>
  </div>

  <br>
  <h3 align="center">Tabla De Paquetes</h3>
  <br>
  <div id="resultado10" class="table-responsive"></div>

</div>
</form>
<!--CIERRE DE FORMULARIO-->

</body>
</html>