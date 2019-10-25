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
 
  <style type="text/css">    
      .login
      { 
        max-width: 350px;
        padding:15px;
        margin: 0 auto;

      }
      #avatar
      { 
        width: 100px;
        height: 100px;
        display: block;
        border-radius: 50px;
        margin: 0 auto 10px;

      }
      #contenedor
      {
        max-width: 400px;
        border-radius: 10px;

      }
      #msj
      {
        max-width: 500px;
        margin: 0 auto;
      }
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function()
    {
      $('#entrar').click(function()
      {
        login();

      });
      
    });

    function login()
    {
      var username=$("#user").val();
      var password=$("#pass").val();
      //var roles=$("#rol").val();

      if($.trim(username).length>0 && $.trim(password).length>0){
        $.ajax({
          method:"post",
          url:"validaLogin.php",
          data:{user:username,pass:password},
          success:function(data)
          {
            if(data=="ok")
            {
              $(location).attr('href','welcome.php');
            }
            else
              {
$("#mensaje").html("<div class='alert alert-danger alert-dismissible' fade in' role='alert' id='msj'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>:Error:</strong>Datos incorrectos</div>");
            }
          }

        });
      } 
    }

//CODIGO PARA MANDAR LLMAR EL SELECT DEL ROLES
  var objetoAjax21=new XMLHttpRequest();
  objetoAjax21.open("get","scripts/select_rol.php",true);
  objetoAjax21.onreadystatechange=procesaPeticion1;
  objetoAjax21.send(null);

  function procesaPeticion1()
  {
    if(objetoAjax21.readyState==4 && objetoAjax21.status==200)
    {
      var div=document.getElementById("resultado21");
      div.innerHTML=objetoAjax21.responseText;
    }
  }
 </script>
</head>

<body>
<!--inicio de navbar-->
<nav class="navbar navbar-default" style="background-color:  #A9E2F3;">
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
      <ul class="nav navbar-nav navbar-right"">
          <!--DROPDOWN1-->
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <h4></h4>
           </a>                
      </ul>    
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--CIERRE DE NAVBAR-->


<div class="container well" id="contenedor">
 <div class="row">
 <div class="col-xs-12">
   <img src="img/avatar.png" class="image-responsive" id="avatar">
    </div>
    <form id="formulario" action="#" method="post" class="login">

    <div class="form-group">
      <input type="text" class="form-control" name="user" placeholder="Usuario" id="user" required autofocus>
    </div>

    <div class="form-group">
      <input type="password" class="form-control" name="pass" placeholder="Contraseña" id="pass" required>
    </div>

     <!--<div class="form-group">
      <input type="text" class="form-control" name="rol" placeholder="Rol" id="rol" required">
    </div>-->

  <!--<div class="form-group">   
  <div id="resultado21" class="col-sm-15"></div>
  </div>-->
  
    <input type="button" class="btn btn-lg btn-primary btn-block"  name="entrar" id="entrar" value="Iniciar Sesion">
    </form>

    <div id="mensaje"></div>

</div>
</div>
 
</body>
</html>
