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

  //CODIGO PARA MANDAR LLMAR EL SELECT DEL CHOFER
  var objetoAjax1=new XMLHttpRequest();
  objetoAjax1.open("get","scripts/select_idchofer.php",true);
  objetoAjax1.onreadystatechange=procesaPeticion1;
  objetoAjax1.send(null);

  function procesaPeticion1()
  {
    if(objetoAjax1.readyState==4 && objetoAjax1.status==200)
    {
      var div=document.getElementById("resultado");
      div.innerHTML=objetoAjax1.responseText;
    }
  }

 //CODIGO PARA MANDAR LLAMAR EL SELECT DE LA PROVINCIA
  var objetoAjax2=new XMLHttpRequest();
  objetoAjax2.open("get","scripts/select_idprovincia.php",true);
  objetoAjax2.onreadystatechange=procesaPeticion2;
  objetoAjax2.send(null);

  function procesaPeticion2()
  {
    if(objetoAjax2.readyState==4 && objetoAjax2.status==200)
    {
      var div=document.getElementById("resultado2");
      div.innerHTML=objetoAjax2.responseText;
    }
  }

//CODIGO PARA MANDAR LLAMAR AL SELECT CHOFER EN EL REGISTRO DE CONDUCE
  var objetoAjax3=new XMLHttpRequest();
  objetoAjax3.open("get","scripts/select_nuevoconduce.php",true);
  objetoAjax3.onreadystatechange=procesaPeticion3;
  objetoAjax3.send(null);

  function procesaPeticion3()
  {
    if(objetoAjax3.readyState==4 && objetoAjax3.status==200)
    {
      var div=document.getElementById("resultado3");
      div.innerHTML=objetoAjax3.responseText;
    }
  }
//CODIGO PARA MANDAR LLAMAR AL SELECT MATRICULA DE CONDUCE
var objetoAjax4=new XMLHttpRequest();
  objetoAjax4.open("get","scripts/select_matricula.php",true);
  objetoAjax4.onreadystatechange=procesaPeticion4;
  objetoAjax4.send(null);

  function procesaPeticion4()
  {
    if(objetoAjax4.readyState==4 && objetoAjax4.status==200)
    {
      var div=document.getElementById("resultado4");
      div.innerHTML=objetoAjax4.responseText;
    }
  }

//CODIGO PARA MANDAR LLAMAR AL SELECT CHOFER EN EL REGISTRO DE PAQUETE
  var objetoAjax11=new XMLHttpRequest();
  objetoAjax11.open("get","scripts/select_idchofis.php",true);
  objetoAjax11.onreadystatechange=procesaPeticion11;
  objetoAjax11.send(null);

  function procesaPeticion11()
  {
    if(objetoAjax11.readyState==4 && objetoAjax11.status==200)
    {
      var div=document.getElementById("resultado11");
      div.innerHTML=objetoAjax11.responseText;
    }
  }

//CODIGO PARA REGISTRAR CHOFER
function registrarChofer()
  {
    objeto =new XMLHttpRequest();
    objeto.open("post","scripts/reg_chofer.php",true);

    objeto.onreadystatechange=function(){
      if(objeto.readyState==4 && objeto.status==200){
        alert(objeto.responseText);
      }
    }

    function Envio(){
    var nombre=document.getElementById("Nombre").value;
    var ap_pat=document.getElementById("ap_Pat").value;
    var ap_mat=document.getElementById("ap_Mat").value;
    var direccion=document.getElementById("Direccion").value;
    var telefono=document.getElementById("Telefono").value;
    var salario=document.getElementById("Salario").value;
    var ciudad=document.getElementById("Ciudad").value;

    var cadena="Nombre="+nombre+"&ap_Pat="+ap_pat+"&ap_Mat="+ap_mat+"&Telefono="+telefono+"&Direccion="+direccion+"&Salario="+salario+"&Ciudad="+ciudad;   

      return cadena;
    }

    objeto.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto.send(Envio());

     document.getElementById("Nombre").value="";
     document.getElementById("ap_Pat").value="";
     document.getElementById("ap_Mat").value="";
     document.getElementById("Telefono").value="";
     document.getElementById("Direccion").value="";
     document.getElementById("Salario").value="";
      document.getElementById("Ciudad").value="";

    document.getElementById("Nombre").focus();

  }

  function refresca()
  {
    location.reload(true)
  }

  
//CODIGO PARA REGISTRAR CAMION
function registrarcamion()
  {
    objeto2 =new XMLHttpRequest();
    objeto2.open("post","scripts/reg_camion.php",true);

    objeto2.onreadystatechange=function(){
      if(objeto2.readyState==4 && objeto2.status==200){
        alert(objeto2.responseText);
      }
    }

    function Envio2(){
    var Modelo=document.getElementById("Modelo").value;
    var Tipo=document.getElementById("Tipo").value;
    var Potencia=document.getElementById("Potencia").value;

    var cadena2="Modelo="+Modelo+"&Tipo="+Tipo+"&Potencia="+Potencia;   

      return cadena2;
    }

    objeto2.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto2.send(Envio2());

     document.getElementById("Modelo").value="";
     document.getElementById("Tipo").value="";
     document.getElementById("Potencia").value="";    

    document.getElementById("Modelo").focus();

  }

  function refresca()
  {
    location.reload(true)
  }
//CODIGO PARA REGISTRAR PROVINCIA

function registrarprovincia()
  {
    objeto3 =new XMLHttpRequest();
    objeto3.open("post","scripts/reg_provincia.php",true);

    objeto3.onreadystatechange=function(){
      if(objeto3.readyState==4 && objeto3.status==200){
        alert(objeto3.responseText);
      }
    }

    function Envio3(){
    var nombre=document.getElementById("nom_pro").value;    

    var cadena3="nom_pro="+nombre;   

      return cadena3;
    }

    objeto3.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto3.send(Envio3());

     document.getElementById("nom_pro").value="";      

    document.getElementById("nom_pro").focus();

  }

  function refresca()
  {
    location.reload(true)
  }
//CODIGO PARA REGISTRAR PAQUETE

function guardarPaquete()
  {
    objeto4 =new XMLHttpRequest();
    objeto4.open("post","scripts/reg_paquete.php",true);

    objeto4.onreadystatechange=function(){
      if(objeto4.readyState==4 && objeto4.status==200){
        alert(objeto4.responseText);
      }
    }

    function Envio4(){
      var descripcion= document.getElementById("Descripcion").value;
      var destinatario= document.getElementById("Destinatario").value;
      var dir_destinatario= document.getElementById("dir_destinatario").value;
      var chofer= document.getElementById("chofert").value;
      var provincia= document.getElementById("provincia").value;

      var cadena4="Descripcion="+descripcion+"&Destinatario="+destinatario+"&dir_destinatario="+dir_destinatario+"&chofert="+chofer+"&provincia="+provincia;

      return cadena4;
    }

    objeto4.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto4.send(Envio4());

    document.getElementById("Descripcion").value="";
    document.getElementById("Destinatario").value="";
    document.getElementById("dir_destinatario").value="";

    document.getElementById("Descripcion").focus();

  }

  function refresca(){
      location.reload(true)
    }

 //CODIGO PARA REGISTRAR CONDUCE

 function guardarconduce()
  {
    objeto5 =new XMLHttpRequest();
    objeto5.open("post","scripts/reg_conduce.php",true);

    objeto5.onreadystatechange=function(){
      if(objeto5.readyState==4 && objeto5.status==200){
        alert(objeto5.responseText);
      }
    }

    function Envio5(){
      var chofer= document.getElementById("c").value;
      var matricula= document.getElementById("matricula").value;
      var fecha= document.getElementById("Fecha").value;    

      var cadena5="c="+chofer+"&matricula="+matricula+"&Fecha="+fecha;       

      return cadena5;
    }

    objeto5.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
    objeto5.send(Envio5());

      document.getElementById("c").value="";
    document.getElementById("matricula").value="";
    document.getElementById("Fecha").value="";
    
    document.getElementById("Fecha").focus();

  }

  function refresca(){
      location.reload(true)
    }

//OBTENER TABLA CHOFER

function traertabla1()
{

      Ajax1=new XMLHttpRequest();
      Ajax1.open("get","scripts/tabla_chofer.php",true);
      Ajax1.onreadystatechange=function(){
      var chofer=document.getElementById("tabla");
      chofer.innerHTML=Ajax1.responseText;
      };
      Ajax1.send(null);
    
  }

//OBTENER TABLA CAMION

function traertabla2()
{

      Ajax2=new XMLHttpRequest();
      Ajax2.open("get","scripts/tabla_camion.php",true);
      Ajax2.onreadystatechange=function(){
      var camion=document.getElementById("tabla");
      camion.innerHTML=Ajax2.responseText;
      };
      Ajax2.send(null);
    
  }

//OBTENER TABLA PROVINCIA

function traertabla3()
{

      Ajax3=new XMLHttpRequest();
      Ajax3.open("get","scripts/tabla_provincia.php",true);
      Ajax3.onreadystatechange=function(){
      var provincia=document.getElementById("tabla");
      provincia.innerHTML=Ajax3.responseText;
      };
      Ajax3.send(null);
    
  }

//OBTENER TABLA PAQUETE

function traertabla4()
{

      Ajax4=new XMLHttpRequest();
      Ajax4.open("get","scripts/tabla_paquete.php",true);
      Ajax4.onreadystatechange=function(){
      var paquete=document.getElementById("tabla");
      paquete.innerHTML=Ajax4.responseText;
      };
      Ajax4.send(null);
    
  }

//OTENER TABLA CONDUCE 

function traertabla5()
{

      Ajax5=new XMLHttpRequest();
      Ajax5.open("get","scripts/tabla_conduce.php",true);
      Ajax5.onreadystatechange=function(){
      var conduce=document.getElementById("tabla");
      conduce.innerHTML=Ajax5.responseText;
      };
      Ajax5.send(null);
    
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

    <a class="navbar-brand" href="#">Transportes Frontera</a>           
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <!--DROPDOWN1-->
      <?php 
          switch ($_SESSION['rol']) {
          case "administrador":
            include("nav.php");
          break;
          case "registrador":
            include("nav_reg.php");
          break;
          
          case "invitado":
            include("nav_invitado.php");
          break;

          default:
            break; 
            } 
      ?> 
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
<!--CIERRE DE NAVBAR-->

<!--MODAL CHOFER-->
<div class="modal fade" id="my-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3> Registro de Choferes</h3>
  <br>          
         
  <form class="form-horizontal">
  
  <div class="form-group">
  <label for="Nombre" class="col-sm-1 control-label">Nombre</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
  </div>
  </div>

  <div class="form-group">
  <label for="ap_Pat" class="col-sm-1 control-label">Apellido Paterno</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="ap_Pat" name="ap_Pat" placeholder="Apellido paterno">
  </div>
  </div>

  <div class="form-group">
  <label for="ap_Mat" class="col-sm-1 control-label">Apellido Materno</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="ap_Mat" name="ap_Mat" placeholder="Apellido materno">
  </div>
  </div>

  <div class="form-group">
  <label for="Telefono" class="col-sm-1 control-label">Telefono</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
  </div>
  </div>

  <div class="form-group">
  <label for="Direccion" class="col-sm-1 control-label">Direccion</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Direcccion">
  </div>
  </div>  

  <div class="form-group">
  <label for="Salario" class="col-sm-1 control-label">Salario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Salario" name="Salario" placeholder="Salario">
  </div>
  </div>

  <div class="form-group">
  <label for="Ciudad" class="col-sm-1 control-label">Ciudad</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad">
  </div>
  </div> 
</form>             

 </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="registrarChofer()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div>    
 <!--CIERRE DE MODAL CHOFER--> 

<!--MODAL CAMION-->
<div class="modal fade" id="my-modal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3>Registro de Camiones</h3>
  <br>          
         
  <form class="form-horizontal">
  
  <div class="form-group">
  <label for="Modelo" class="col-sm-1 control-label">Modelo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
  </div>
  </div>

  <div class="form-group">
  <label for="Tipo" class="col-sm-1 control-label">Tipo</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Tipo" name="Tipo" placeholder="Tipo">
  </div>
  </div>

  <div class="form-group">
  <label for="Potencia" class="col-sm-1 control-label">Potencia</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Potencia" name="Potencia" placeholder="Potencia">
  </div>
  </div>

</form>             

 </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="registrarcamion()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div> 

<!--CIERRE DE MODAL CAMION-->

<!--MODAL PROVINCIA-->
<div class="modal fade" id="my-modal3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3>Registro de la Provincia</h3>
  <br>          
         
  <form class="form-horizontal">

  <div class="form-group">
  <label for="nom_pro" class="col-sm-1 control-label">Nombre Provincia</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="nom_pro" name="nom_pro" placeholder="Nombre Provincia">
  </div>
  </div> 

</form>             

 </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="registrarprovincia()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div> 

<!--CIERRE DE MODAL PROVINCIA-->

<!--MODAL PAQUETE-->
<div class="modal fade" id="my-modal4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3>Registro de Paquetes</h3>
  <br>          
         
  <form class="form-horizontal">

  <div class="form-group">
  <label for="Descripcion" class="col-sm-1 control-label">Descripcion</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion">
  </div>
  </div>

  <div class="form-group">
  <label for="Destinatario" class="col-sm-1 control-label">Destinatario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="Destinatario" name="Destinatario" placeholder="Destinatario">
  </div>
  </div>

  <div class="form-group">
  <label for="dir_destinatario" class="col-sm-1 control-label">DIR_Destinatario</label>
  <div class="col-sm-5">
  <input type="text" class="form-control" id="dir_destinatario" name="dir_destinatario" placeholder="DIR_Destinatario">
  </div>
  </div>

  <div class="form-group"> 
  <label for='id_chofer' class='col-sm-1 control-label'>ID_chofer</label>  
  <div id="resultado11" class="col-sm-5"></div>
  </div>

  <div class="form-group">
  <label for='id_provincia' class='col-sm-1 control-label'>IDprovincia</label>
  <div id="resultado2" class="col-sm-5"></div>
  </div>
  
               
</form>             

 </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="guardarPaquete()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div> 
<!--CIERRE DEL MODAL PAQUETE-->

<!--MODAL CONDUCE-->
<div class="modal fade" id="my-modal5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
       <div class="modal-content"> 
       <div class="modal-header modal-header-info">
<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<h4>Hola! Ingresa tus Datos</h4> 
</div>
 <div class="modal-body">
  <br>
  <div class="container">
  <h3>Registro del que Conduce</h3>
  <br>          
         
  <form class="form-horizontal">

  <div class="form-group">
  <label for='id_chofer' class='col-sm-1 control-label'>ID_chofer</label>
  <div id="resultado3" class="col-sm-5"></div>
  </div>
  

  <div class="form-group">
  <label for='matricula' class='col-sm-1 control-label'>Matricula</label>
  <div id="resultado4" class="col-sm-5"> </div>
  </div>
  
  
 <div class="form-group">
  <label for="Fecha" class="col-sm-1 control-label">FECHA</label>
  <div class="col-sm-5">
  <input type="date" class="form-control" id="Fecha" name="Fecha" placeholder="Fecha"> 
  </div>
  </div>

</form>             

 </div>

   <div class="modal-footer">
      <button type="submit" class="btn btn-primary" onclick="guardarconduce()">Guardar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="refresca()">Cerrar</button>
    </div>
        
       </div>
    </div>
  </div> 
 </div> 

<!--CIERRE DE MODAL CONDUCE-->


<div class="container well">
<div id="tabla" class="table-responsive"></div><br>
</div>

</body>
</html>