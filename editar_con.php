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
  var objetoAjax40=new XMLHttpRequest();
  objetoAjax40.open("get","scripts/select_5.php",true);
  objetoAjax40.onreadystatechange=procesaPeticion41;
  objetoAjax40.send(null);

  function procesaPeticion41()
  {
    if(objetoAjax40.readyState==4 && objetoAjax40.status==200)
    {
      var div=document.getElementById("resultado40");
      div.innerHTML=objetoAjax40.responseText;
    }
  }
  //SELECT CHOFER
  var objetoAjax45=new XMLHttpRequest();
  objetoAjax45.open("get","scripts/select_editarchof2.php",true);
  objetoAjax45.onreadystatechange=procesaPeticion46;
  objetoAjax45.send(null);

  function procesaPeticion46()
  {
    if(objetoAjax45.readyState==4 && objetoAjax45.status==200)
    {
      var div=document.getElementById("resultado400");
      div.innerHTML=objetoAjax45.responseText;
    }
  }
//select matricula
var objetoAjax47=new XMLHttpRequest();
  objetoAjax47.open("get","scripts/select_editarmat.php",true);
  objetoAjax47.onreadystatechange=procesaPeticion48;
  objetoAjax47.send(null);

  function procesaPeticion48()
  {
    if(objetoAjax47.readyState==4 && objetoAjax47.status==200)
    {
      var div=document.getElementById("resultado401");
      div.innerHTML=objetoAjax47.responseText;
    }
  }

//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos5(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos de conduce...</h5>"
		}
		else
		{
			Ajax42=new XMLHttpRequest();
           Ajax42.open("get","scripts/tabla_edicon.php?f="+cadena,true);
           Ajax42.onreadystatechange=function(){
           var con=document.getElementById("tabla_5");
           con.innerHTML=Ajax42.responseText;
            };
           Ajax42.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar6(){

    var id = document.getElementById("e").value;
    //var chofer = document.getElementById("editar_chof2").value;
    var mat = document.getElementById("editar_mat").value; 
    var fecha = document.getElementById("editar_fecha").value;   

    ObjetoAjax49 = new XMLHttpRequest();

    ObjetoAjax49.open("POST", "scripts/actualizar_con.php", true);
    ObjetoAjax49.onreadystatechange = procesaPeticion;

    ObjetoAjax49.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "e=" + id + "&editar_mat=" + mat + "&editar_fecha=" + fecha ;

    ObjetoAjax49.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax49.readyState == 4 && ObjetoAjax49.status==200) {

        var div = document.getElementById("tabla49");
        div.innerHTML = ObjetoAjax49.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete6(elid){
  $.ajax({
      url : '/trans/scripts/borrar_conduce.php',
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
<h3 align="center">Actualizar Conduce</h3>
<br>
<div id="tabla_5" class="table-responsive"></div><br>

 <div class="form-group">
  <label for='id' class='col-sm-2 control-label'>Elige conduce</label>
  <div id="resultado40" class="col-sm-5"></div>
  </div>

<!--<div class="form-group">
  <label for='id_c' class='col-sm-2 control-label'>Elige chofer</label>
  <div id="resultado400" class="col-sm-5"></div>
  </div>-->

  <div class="form-group">
  <label for='id_m' class='col-sm-2 control-label'>Elige matricula</label>
  <div id="resultado401" class="col-sm-5"></div>
  </div>

  <div class="form-group">
  <label for="Fecha" class="col-sm-2 control-label">Elige fecha</label>
  <div class="col-sm-5">
  <input type="date" class="form-control" id="editar_fecha" name="editar_fecha" placeholder="Fecha"> 
  </div>
  </div>
  

 <button class="btn btn-info" type="button" onclick="Actualizar6()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete6($('#e').val())">Borrar</button>
  <br>
  <br>

<div id="tabla49" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>