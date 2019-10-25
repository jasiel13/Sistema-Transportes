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
  var objetoAjax80=new XMLHttpRequest();
  objetoAjax80.open("get","scripts/select_3.php",true);
  objetoAjax80.onreadystatechange=procesaPeticion51;
  objetoAjax80.send(null);

  function procesaPeticion51()
  {
    if(objetoAjax80.readyState==4 && objetoAjax80.status==200)
    {
      var div=document.getElementById("resultado80");
      div.innerHTML=objetoAjax80.responseText;
    }
  }
//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos3(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos de la provincia...</h5>"
		}
		else
		{
			Ajax81=new XMLHttpRequest();
           Ajax81.open("get","scripts/tabla_edipro.php?d="+cadena,true);
           Ajax81.onreadystatechange=function(){
           var pro=document.getElementById("tabla_3");
           pro.innerHTML=Ajax81.responseText;
            };
           Ajax81.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar4(){

    var id = document.getElementById("c").value;
    var nombre = document.getElementById("nombre1").value;    

    ObjetoAjax82 = new XMLHttpRequest();

    ObjetoAjax82.open("POST", "scripts/actualizar_pro.php", true);
    ObjetoAjax82.onreadystatechange = procesaPeticion;

    ObjetoAjax82.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "c=" + id + "&nombre1=" + nombre;

    ObjetoAjax82.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax82.readyState == 4 && ObjetoAjax82.status==200) {

        var div = document.getElementById("tabla82");
        div.innerHTML = ObjetoAjax82.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete4(elid){
  $.ajax({
      url : '/trans/scripts/borrar_pro.php',
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
<h3 align="center">Actualizar Provincia</h3>
<br>

 <div class="form-group">
  <label for='n' class='col-sm-2 control-label'>Elige Provincia</label>
  <div id="resultado80" class="col-sm-5"></div>
  </div>

  <!--<div class="form-group">
  <label for="no" class="col-sm-2 control-label">Nombre</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Nombre Provincia">
  </div>
  </div>-->
  <div id="tabla_3" class="table-responsive"></div><br>
 
 <button class="btn btn-info" type="button" onclick="Actualizar4()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete4($('#c').val())">Borrar</button>
  <br>
  <br>

<div id="tabla82" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>