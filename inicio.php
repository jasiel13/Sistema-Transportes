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
	<title>Examen 1</title>
	</head>
  <script type="text/javascript">
    
    //CODIGO PARA REGISTRAR USUARIO
function registrarusuario()
  {
    objeto20=new XMLHttpRequest();
    objeto20.open("post","scripts/reg_usuarios.php",true);

    objeto20.onreadystatechange=function(){
      if(objeto20.readyState==4 && objeto20.status==200){
        alert(objeto20.responseText);
      }
    }

    function Envio(){
    var usuario=document.getElementById("usuario").value;
    var password=document.getElementById("password").value;
    var rol=document.getElementById("rol").value;    

    var cadena="usuario="+usuario+"&password="+password+"&rol="+rol;  

      return cadena;
    }

    objeto20.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto20.send(Envio());

     document.getElementById("usuario").value="";
     document.getElementById("password").value="";
     document.getElementById("rol").value="";    

    document.getElementById("usuario").focus();

  }

  function refresca()
  {
    location.reload(true)
  } 

  function tabla_usuarios()
{

      Ajax50=new XMLHttpRequest();
      Ajax50.open("get","scripts/tabla_usuarios2.php",true);
      Ajax50.onreadystatechange=function(){
      var usuarios=document.getElementById("tabla");
      usuarios.innerHTML=Ajax50.responseText;
      };
      Ajax50.send(null);
    
  }
  </script>

	<body>
<!--inicio de navbar-->
<nav class="navbar navbar-default" style="background-color: #A9E2F3;">
  <div class="container-fluid">

    <div class="navbar-header">  
    
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    <a class="navbar-brand" href="#"><h4>Transportes Frontera</h4></a>      
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
          <!--DROPDOWN1-->
          <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <?php echo "<h4>Bienvenido ".$_SESSION['usuario']."</h4>";?>    
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

<h1 align="center">HOLA ! Administrador</h1>

<!--PANEL DE OPCIONES-->
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading"><h4 align="center">PANEL DE ACCESO</h4></div>
            <div class="panel-body" id="color">
          
            <div>
            <h4 align="center"><a href="transportes_frontera.php">Pagina de inicio</a></h4>
            <br>
            <h4 align="center"><a href="#my-modal6" data-toggle="modal">Registro de usuarios</a></h4>
            </div>
            <br>
            <h4 align="center"><a href="#" onclick="tabla_usuarios()">Tabla de usuarios</a></h4>
            <br>
             <h4 align="center"><a href="actualizar_user.php">Actualizar usuario</a></h4>

            </div>
          </div>
      </div> 
    </div> 
 </div> 
 <!--CIERRE DE PANEL DE OPCIONES-->

 <!--MODAL DE REGISTRO-->
<div class="modal fade" id="my-modal6" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3> Registro de usuarios</h3>
  <br>          
         
  <form class="form-horizontal">
  
  <div class="form-group">
  <label for="usuario" class="col-sm-1 control-label">Usuario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
  </div>
  </div>

  <div class="form-group">
  <label for="password" class="col-sm-1 control-label">Password</label>
  <div class="col-sm-5">
  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  </div>

  <!--<div class="form-group">
  <label for="rol" class="col-sm-1 control-label">Rol</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="rol" name="rol" placeholder="Rol">
  </div>
  </div>-->

  <div class="form-group">
  <label for="rol" class="col-sm-1 control-label">Rol</label>
  <div class="col-sm-5">
        <select id="rol" class="form-control">
        <option value="">Seleccionar rol...</option> 
        <option value="administrador">Administrador</option> 
        <option value="registrador">Registrador</option>
        <option value="invitado">Invitado</option>  
      </select> 
  </div>
  </div>

</form>
 </div>
   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="registrarusuario()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div>    
 <!--CIERRE DE MODAL USUARIO-->
 
 <div class="container well">
<div id="tabla" class="table-responsive"></div><br>
</div>

</body>
</html>