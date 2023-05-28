<?php
include "StateConnections/conexion.php";
session_start();

if (!empty($_SESSION["id"])) {
    header("location: home.php");  
  } 

if(!empty($_POST["btningresar"])){

   if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
    
        $usuario=$_POST["usuario"];
        $password=sha1($_POST["password"]);

        $sql=$conexion->query(" select * from usuarios where nombreusuario='$usuario' and contrasena='$password'");
        
        if($datos=$sql->fetch_object()){

            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellido"]=$datos->apellido;
            $_SESSION["nombreusuario"]=$usuario;

            header("location:home.php");

        }else{

            echo "<div class='alert-danger'>
            <img src='../Recursos/x.png' alt='x'>
            <p class='textoblanco'>Acceso denegado</p>
            </div>";

        }



   } else {
    echo"campos vacios";
   }
   

}


?>