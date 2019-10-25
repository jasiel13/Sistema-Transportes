<?php
  session_start();

  if ( isset($_SESSION["usuario"]))
  { //Comprovar si las sessiones existen
      if ($_SESSION["rol"] == "administrador")
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

  <script src="/trans/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/trans/dist/sweetalert.css">
	<title>Examen 1</title>

<script type="text/javascript">

 //CODIGO PARA MANDAR LLAMAR EL SELECT DEL USUARIO
  var objetoAjax70=new XMLHttpRequest();
  objetoAjax70.open("get","scripts/select_2.php",true);
  objetoAjax70.onreadystatechange=procesaPeticion51;
  objetoAjax70.send(null);

  function procesaPeticion51()
  {
    if(objetoAjax70.readyState==4 && objetoAjax70.status==200)
    {
      var div=document.getElementById("resultado70");
      div.innerHTML=objetoAjax70.responseText;
    }
  }
//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos3(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos del camion...</h5>"
		}
		else
		{
			Ajax71=new XMLHttpRequest();
           Ajax71.open("get","scripts/tabla_edicamion.php?c="+cadena,true);
           Ajax71.onreadystatechange=function(){
           var ca=document.getElementById("tabla_2");
           ca.innerHTML=Ajax71.responseText;
            };
           Ajax71.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar3(){

    var mat = document.getElementById("b").value;
    var modelo = document.getElementById("mod1").value;
    var tipo = document.getElementById("tip1").value;
    var potencia = document.getElementById("pot1").value;    

    ObjetoAjax72 = new XMLHttpRequest();

    ObjetoAjax72.open("POST", "scripts/actualizar_camion.php", true);
    ObjetoAjax72.onreadystatechange = procesaPeticion;

    ObjetoAjax72.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "b=" + mat + "&mod1=" + modelo +  "&tip1=" + tipo + "&pot1=" + potencia;

    ObjetoAjax72.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax72.readyState == 4 && ObjetoAjax72.status==200) {

        var div = document.getElementById("tabla72");
        div.innerHTML = ObjetoAjax72.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete3(elid){
  $.ajax({
      url : '/trans/scripts/borrar_camion.php',
      data : { id : elid },
      type : 'POST',
      success : function(data) {
        alert(data); 
              
      }
  });
}  
/*if (data == 1) {
            swal("Exito", "Usuario Eliminado!", "success");
          }else{
            swal("Error", "No se elimino el usuario!", "error");
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

     <a class="navbar-brand" href="inicio.php">Inicio</a>

     <ul class="nav navbar-nav">
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            EDITAR,BORRAR,REGISTROS<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="editar_chofer.php">Chofer</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="editar_camion.php">Camion</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="editar_pro.php">Provincia</a></li>
            <li role="separator" class="divider"></li>
                <li><a href="editar_paq.php">Paquete</a></li>
            <li role="separator" class="divider"></li>
                <li><a href="editar_con.php">Conduce</a></li>                 
            </ul>
          </li>
    </ul>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

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
      </li>

      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

<!--CIERRE DE NAVBAR-->

<form class="form-horizontal">

<div class="container well">
<h3 align="center">Actualizar Camion</h3>
<br>
 <div class="form-group">
  <label for='m' class='col-sm-2 control-label'>Elige Camion</label>
  <div id="resultado70" class="col-sm-5"></div>
  </div>

 <!-- <div class="form-group">
  <label for="mo" class="col-sm-2 control-label">Modelo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="mod1" name="mod1" placeholder="Modelo">
  </div>
  </div>

 <div class="form-group">
  <label for="t" class="col-sm-2 control-label">Tipo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="tip1" name="tip1" placeholder="Tipo">
  </div>
  </div>

  <div class="form-group">
  <label for="p" class="col-sm-2 control-label">Potencia</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="pot1" name="pot1" placeholder="Potencia">
  </div>
  </div>--> 
  <div id="tabla_2" class="table-responsive"></div><br>

 <button class="btn btn-info" type="button" onclick="Actualizar3()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete3($('#b').val())">Borrar</button>
  <br>
  <br>

<div id="tabla72" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>