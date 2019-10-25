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
  var objetoAjax90=new XMLHttpRequest();
  objetoAjax90.open("get","scripts/select_4.php",true);
  objetoAjax90.onreadystatechange=procesaPeticion51;
  objetoAjax90.send(null);

  function procesaPeticion51()
  {
    if(objetoAjax90.readyState==4 && objetoAjax90.status==200)
    {
      var div=document.getElementById("resultado90");
      div.innerHTML=objetoAjax90.responseText;
    }
  }
//CODIGO PARA SELECT CHOFER
var objetoAjax100=new XMLHttpRequest();
  objetoAjax100.open("get","scripts/select_editarchof.php",true);
  objetoAjax100.onreadystatechange=procesaPeticion52;
  objetoAjax100.send(null);

  function procesaPeticion52()
  {
    if(objetoAjax100.readyState==4 && objetoAjax100.status==200)
    {
      var div=document.getElementById("resultado100");
      div.innerHTML=objetoAjax100.responseText;
    }
  }
//CODIGO PARA SELECT PROVINCIA
var objetoAjax101=new XMLHttpRequest();
  objetoAjax101.open("get","scripts/select_editarpro.php",true);
  objetoAjax101.onreadystatechange=procesaPeticion53;
  objetoAjax101.send(null);

  function procesaPeticion53()
  {
    if(objetoAjax101.readyState==4 && objetoAjax101.status==200)
    {
      var div=document.getElementById("resultado101");
      div.innerHTML=objetoAjax101.responseText;
    }
  }

//CODIGO PARA MANDAR LLAMAR LA TABLA DE ARRIBA
   function muestraDatos4(cadena){
		if (cadena=="")
		{
			document.getElementById("tabla").innerHTML="<h5>Muestra los datos del paquete...</h5>"
		}
		else
		{
			Ajax91=new XMLHttpRequest();
           Ajax91.open("get","scripts/tabla_edipaq.php?e="+cadena,true);
           Ajax91.onreadystatechange=function(){
           var paq=document.getElementById("tabla_4");
           paq.innerHTML=Ajax91.responseText;
            };
           Ajax91.send(null);
		}
	}
//CODIGO PARA ACTUALIZAR REGISTRO
function Actualizar5(){

    var id = document.getElementById("d").value;
    var desc = document.getElementById("des1").value;
    var dest = document.getElementById("dest1").value;
    var dir= document.getElementById("di1").value;
    var chofer = document.getElementById("editar_chof").value;
    var prov = document.getElementById("editar_pro").value;    

    ObjetoAjax102 = new XMLHttpRequest();

    ObjetoAjax102.open("POST", "scripts/actualizar_paquete.php", true);
    ObjetoAjax102.onreadystatechange = procesaPeticion;

    ObjetoAjax102.setRequestHeader("content-Type","application/x-www-form-urlencoded");

    parametro = "d=" + id + "&des1=" + desc+  "&dest1=" + dest + "&di1=" + dir + "&editar_chof=" + chofer + "&editar_pro=" + prov;

    ObjetoAjax102.send(parametro);

    function procesaPeticion(){
      if (ObjetoAjax102.readyState == 4 && ObjetoAjax102.status==200) {

        var div = document.getElementById("tabla102");
        div.innerHTML = ObjetoAjax102.responseText;

      }
    }

  }
  //CODIGO PARA BORRAR REGISTRO
function delete5(elid){
  $.ajax({
      url : '/trans/scripts/borrar_paquete.php',
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
<h3 align="center">Actualizar Paquete</h3>
<br>
 <div class="form-group">
  <label for='se' class='col-sm-2 control-label'>Elige paquete</label>
  <div id="resultado90" class="col-sm-5"></div>
  </div>

  <!--<div class="form-group">
  <label for="des" class="col-sm-2 control-label">Descripcion</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="des1" name="des1" placeholder="Descripcion">
  </div>
  </div>

 <div class="form-group">
  <label for="dest" class="col-sm-2 control-label">Destinatario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="dest1" name="dest1" placeholder="Destinatario">
  </div>
  </div>

  <div class="form-group">
  <label for="dir" class="col-sm-2 control-label">Dir_Destinatario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="di1" name="di1" placeholder="Dir_Destinatario">
  </div>
  </div>-->

  <div id="tabla_4" class="table-responsive"></div><br>

  <div class="form-group">
  <label for='chof' class='col-sm-2 control-label'>Elige chofer</label>
  <div id="resultado100" class="col-sm-3"></div>
  </div> 

  <div class="form-group">
  <label for='prov' class='col-sm-2 control-label'>Elige provincia</label>
  <div id="resultado101" class="col-sm-3"></div>
  </div>

 <button class="btn btn-info" type="button" onclick="Actualizar5()">Aplicar</button>
  <br>
  <br>

  <button class="btn btn-info" type="button" onclick="delete5($('#d').val())">Borrar</button>
  <br>
  <br>

<div id="tabla102" class="table-responsive"></div><br>
<!--<div id="table" class="table-responsive"></div><br>-->

</div>
</form>

</body>
</html>