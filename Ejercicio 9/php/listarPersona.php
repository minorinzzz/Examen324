<?php
include('../conexion.inc.php');
$response = array('data' => '', 'success' => false, 'message' => '' );
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql1="select usuario,password from usuario;";
    $usuario=$_GET["usuario"];
    $password = $_GET["password"];
    $ress = mysqli_query($con,$sql1);
    $existe=false;
    foreach($ress as $filass){
        if($usuario == $filass["usuario"] && $password == $filass["password"]){
            $response['message'] = "Consulta realizada con éxito";
            $response['success'] = true;
            $sql="select * from persona;";
            $resultado = mysqli_query($con,$sql);
            $miData="[";
            foreach($resultado as $fila){
                $miData.="[".$fila["CI"].",".$fila["nombreCompleto"].",".$fila["fechaDeNacimiento"].",".$fila["telefono"].",".$fila["departamento"]."],";
            }
            $miData = substr($miData, 0, -1);
            $miData .="]";
            $response['data']= $miData;
            $existe=true;
        }
    }
    if(!$existe){
        $response['message'] = "User don't exist";
        $response['success'] = false;
    }

}else{
    $response['message'] = "No method GET.";
    $response['success'] = false;
}
echo json_encode($response);
?>