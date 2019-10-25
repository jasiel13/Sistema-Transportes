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
  var objetoAjax60=new XMLHttpRequest();
  objetoAjax60.open("get","scripts/select_1.php",true);
  objetoAjax60.onreadystatechange=procesaPeticion51;
  objetoAjax60.send(null);

  function procesaPeticion51()
  {
    if(objetoAjax60.readyState==4 && objetoAjax60.status==200)
    {
      var div=document.getElementById("resultado60");
      div.innerHTML=objetoAjax60.responseText;
    }
  }
//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos2(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos del chofer...</h5>"
		}
		else
		{
			Ajax61=new XMLHttpRequest();
           Ajax61.open("get","scripts/tabla_edichofer.php?b="+cadena,true);
           Ajax61.onreadystatechange=function(){
           var ch=document.getElementById("tabla_1");
           ch.innerHTML=Ajax61.responseText;
            };
           Ajax61.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar2(){

    var id = document.getElementById("a").value;
    var nombre = document.getElementById("nom1").value;
    var ap1 = document.getElementById("ap1").value;
    var ap2 = document.getElementById("ap2").value;
    var tel1 = document.getElementById("tel1").value;
    var dir1 = document.getElementById("dir1").value;
    var sal = document.getElementById("sal1").value;
    var ciu = document.getElementById("ci1").value; 

    ObjetoAjax62 = new XMLHttpRequest();

    ObjetoAjax62.open("POST", "scripts/actualizar_chofer.php", true);
    ObjetoAjax62.onreadystatechange = procesaPeticion;

    ObjetoAjax62.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "a=" + id + "&nom1=" + nombre +  "&ap1=" + ap1 + "&ap2=" + ap2 + "&tel1=" + tel1 + "&dir1=" + dir1 + "&sal1=" + sal + "&ci1=" + ciu;

    ObjetoAjax62.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax62.readyState == 4 && ObjetoAjax62.status==200) {

        var div = document.getElementById("tabla62");
        div.innerHTML = ObjetoAjax62.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete2(elid){
  $.ajax({
      url : '/trans/scripts/borrar_chofer.php',
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
<h3 align="center">Actualizar Chofer</h3>
<br>

 <div class="form-group">
  <label for='c' class='col-sm-2 control-label'>Elige chofer</label>
  <div id="resultado60" class="col-sm-5"></div>
  </div>

  <!--<div class="form-group">
  <label for="ch" class="col-sm-2 control-label">Nombre</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="nom1" name="nom1" placeholder="Nombre">
  </div>
  </div>

 <div class="form-group">
  <label for="ap" class="col-sm-2 control-label">Apellido paterno</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="ap1" name="ap1" placeholder="Apellido Paterno">
  </div>
  </div>

  <div class="form-group">
  <label for="ap" class="col-sm-2 control-label">Apellido materno</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="ap2" name="ap2" placeholder="Apellido Materno">
  </div>
  </div>

  <div class="form-group">
  <label for="t" class="col-sm-2 control-label">Telefono</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="tel1" name="tel1" placeholder="Telefono">
  </div>
  </div>

  <div class="form-group">
  <label for="dir" class="col-sm-2 control-label">Direccion</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="dir1" name="dir1" placeholder="Direccion">
  </div>
  </div>

  <div class="form-group">
  <label for="sal" class="col-sm-2 control-label">Salario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="sal1" name="sal1" placeholder="Salario">
  </div>
  </div>

  <div class="form-group">
  <label for="ciu" class="col-sm-2 control-label">Ciudad</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="ci1" name="ci1" placeholder="Ciudad">
  </div>
  </div>-->
  <div id="tabla_1" class="table-responsive"></div><br>

 <button class="btn btn-info" type="button" onclick="Actualizar2()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete2($('#a').val())">Borrar</button>
  <br>
  <br>

<div id="tabla62" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>