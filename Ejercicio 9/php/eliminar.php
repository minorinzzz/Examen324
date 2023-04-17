<?php
include('../conexion.inc.php');
$response = array('success' => false, 'message' => '' );
if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $sql1="select usuario,password from usuario;";
    $usuario=$_GET["usuario"];
    $password = $_GET["password"];
    $ress = mysqli_query($con,$sql1);
    $existe=false;
    foreach($ress as $filass){
        if($usuario == $filass["usuario"] && $password == $filass["password"]){
            $CI = $_GET["CI"];
            $response['message'] = "Eliminacion realizada con éxito";
            $response['success'] = true;
            $sql="DELETE FROM persona WHERE $CI = CI;";
            $resultado = mysqli_query($con,$sql);
            $existe=true;
        }
    }
    if(!$existe){
    $response['message'] = "User don't exist";
    $response['success'] = false;
    }

}else{
$response['message'] = "No method POST.";
$response['success'] = false;
}
echo json_encode($response);
?>