<?php
  session_start();  

  if ( isset($_SESSION["usuario"]))
  { //Comprovar si las sessiones existen
      if ($_SESSION["rol"] == "administrador" || $_SESSION["rol"] == "registrador") 
      {
        
      } 
      else {
        header("location:accesso_denegado.php");
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
  var objetoAjax6=new XMLHttpRequest();
  objetoAjax6.open("get","scripts/select_chofer_salario.php",true);
  objetoAjax6.onreadystatechange=procesaPeticion6;
  objetoAjax6.send(null);

  function procesaPeticion6()
  {
    if(objetoAjax6.readyState==4 && objetoAjax6.status==200)
    {
      var div=document.getElementById("resultado5");
      div.innerHTML=objetoAjax6.responseText;
    }
  }

  //OBTENER TABLA CHOFER LA QUE APARECE ARRIBA
  function muestraDatos(cadena){
		if (cadena=="") 
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos del chofer...</h5>"
		}
		else 
		{
			Ajax6=new XMLHttpRequest();
           Ajax6.open("get","scripts/tabla_chofer_salario.php?q="+cadena,true);
           Ajax6.onreadystatechange=function(){
           var chofer_salario=document.getElementById("tabla");
           chofer_salario.innerHTML=Ajax6.responseText;
            };
           Ajax6.send(null);
		}
	}

  /*//OBTENER TABLA CON EL SALARIO ACTUALIZADO
  var objetoAjax7=new XMLHttpRequest();
  objetoAjax7.open("get","scripts/tabla_actualizada.php",true);
  objetoAjax7.onreadystatechange=procesaPeticion7;
  objetoAjax7.send(null);

  function procesaPeticion7()
  {
    if(objetoAjax7.readyState==4 && objetoAjax7.status==200)
    {
      var div=document.getElementById("tabla2");
      div.innerHTML=objetoAjax7.responseText;
    }
  }

	 function refresca(){
      location.reload(true)
    }*/

//FUNCION PARA TRAER Y ENVIAR DATOS DEL SALARIO Y EL ID CHOFER
/*$(function(){
	$("#evento-actualizar").click(function(){	
    //metodo ajax
		$.ajax({
			url:"scripts/actualizar_salario.php",// URL a la que se enviará la solicitud Ajax
			type:"POST",//peticion 
			dataType:"json",// Formato de datos que se espera en la respuesta del servidor.
      //objeto json con los parametros del salario y el id es donde se almacenan y son los datos a enviar
			data:{salario:$("#salario2").val(),id:$("#id-chofer").text()},
			success:function(response){
				alert(response.resultado)
			}

		});
	});

});*/

function Actualiza(){

    var chofer = document.getElementById("chof").value;
    var porcen = document.getElementById("porcen").value;

    ObjetoAjax = new XMLHttpRequest();

    ObjetoAjax.open("POST", "scripts/actualizar_salario.php", true);
    ObjetoAjax.onreadystatechange = procesaPeticion;

    ObjetoAjax.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "chof=" + chofer +  "&porcen=" + porcen;

    ObjetoAjax.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax.readyState == 4 && ObjetoAjax.status==200) {

        var div = document.getElementById("resultadoActualizado");
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

<form class="form-horizontal">

<div class="container well">
<h3 align="center">Modulo De Incremento De Salario</h3>
<br>
<div id="tabla" class="table-responsive"></div><br>

 <div class="form-group">
  <label for='id_chofer' class='col-sm-2 control-label'>Elige chofer y salario</label>
  <div id="resultado5" class="col-sm-5"></div>
  </div>

  <div class="form-group">
  <label for="porcen" class="col-sm-2 control-label">Ingrese aumento</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="porcen" name="porcen" placeholder="Aumento de salario">
  </div>
  </div>

 <button class="btn btn-info" type="button" onclick="Actualiza()">Aplicar</button>
  <br>
  <br>
  <!--<div id="tabla2" class="table_responsive"></div>-->
         <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading"><h4>Panel Chofer Salario Actualizado</h4></div>
            <div class="panel-body">
          
          <div id="resultadoActualizado"></div>

            </div>
          </div>
      </div> 

</div>
</form>

</body>
</html>