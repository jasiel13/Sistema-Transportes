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
  var objetoAjax51=new XMLHttpRequest();
  objetoAjax51.open("get","scripts/select_user.php",true);
  objetoAjax51.onreadystatechange=procesaPeticion51;
  objetoAjax51.send(null);

  function procesaPeticion51()
  {
    if(objetoAjax51.readyState==4 && objetoAjax51.status==200)
    {
      var div=document.getElementById("resultado51");
      div.innerHTML=objetoAjax51.responseText;
    }
  }
//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos1(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos del usuario...</h5>"
		}
		else
		{
			Ajax52=new XMLHttpRequest();
           Ajax52.open("get","scripts/tabla_usuarios.php?u="+cadena,true);
           Ajax52.onreadystatechange=function(){
           var user=document.getElementById("tabla_AU");
           user.innerHTML=Ajax52.responseText;
            };
           Ajax52.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar(){

    var id = document.getElementById("us").value;
    var usuario = document.getElementById("use").value;
    var password = document.getElementById("pas").value;
    var rol = document.getElementById("rol").value;

    ObjetoAjax53 = new XMLHttpRequest();

    ObjetoAjax53.open("POST", "scripts/actualizar_usuario.php", true);
    ObjetoAjax53.onreadystatechange = procesaPeticion;

    ObjetoAjax53.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "us=" + id + "&use=" + usuario +  "&pas=" + password + "&rol=" + rol;

    ObjetoAjax53.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax53.readyState == 4 && ObjetoAjax53.status==200) {

        var div = document.getElementById("tabla54");
        div.innerHTML = ObjetoAjax53.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete1(elid){
  $.ajax({
      url : '/trans/scripts/borrar_user.php',
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

     <a  class="navbar-brand" href="inicio.php">Inicio</a>

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
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

<!--CIERRE DE NAVBAR-->

<form class="form-horizontal">

<div class="container well">
<h3 align="center">Actualizar Usuarios</h3>
<br>

 <div class="form-group">
  <label for='user' class='col-sm-2 control-label'>Elige usuario</label>
  <div id="resultado51" class="col-sm-5"></div>
  </div>

  <!--<div class="form-group">
  <label for="use" class="col-sm-2 control-label">Usuario Nuevo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="use" name="use" placeholder="Nuevo Usuario"> 
  </div>
  </div>

 <div class="form-group">
  <label for="pas" class="col-sm-2 control-label">Password Nuevo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="pas" name="pas" placeholder="Nuevo Password">
  </div>
  </div>

  <div class="form-group">
  <label for="rol" class="col-sm-2 control-label">Rol Nuevo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="rol" name="rol" placeholder="Nuevo Rol">
  </div>
  </div>--> 

  <div id="tabla_AU" class="table-responsive"></div><br>

 <button class="btn btn-info" type="button" onclick="Actualizar()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete1($('#us').val())">Borrar</button>
  <br>
  <br>

<div id="tabla54" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>