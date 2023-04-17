<?php
include "conexion.inc.php";
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$encontro=false;
$CI = 0;
if(isset($_POST["Aceptar"])){
    $resultado = mysqli_query($con,"select * from usuario;");
    while($datos = mysqli_fetch_array($resultado)){
        if($datos["usuario"]==$usuario && $datos["password"]==$password){
            if(session_status()==0){
                session_start();
                $_SESSION["contador"]=1;
            }else{
                $_SESSION["contador"]=$_SESSION["contador"]+1;
            }
            $encontro=true;
            $CI=$datos["CI"];
            $rol=$datos["ROL"];
            $resultado2 = mysqli_query($con,"select * from persona where CI=$CI;");
            $datos2 = mysqli_fetch_array($resultado2);
            if($rol == "ESTUDIANTE"){
                header('Location: inicio.php');
            }else{
                header('Location: listado.php');
            }
            exit;
            break;
        }
    }   
    if(!$encontro){
        echo "<h2>El usuario no existe</h2>";
        include "index.php";
    }
}
?>