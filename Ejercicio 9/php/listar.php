<?php
include('../conexion.inc.php');
$response = array('data' => '', 'success' => false, 'message' => '' );
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $response['message'] = "Consulta realizada con éxito";
    $response['success'] = true;
    $sql="select * from usuario;";
    $resultado = mysqli_query($con,$sql);
    $miData="[";
    foreach($resultado as $fila){
        $miData.="[".$fila["CI"].",".$fila["usuario"].",".$fila["password"].",".$fila["ROL"]."],";
    }
    $miData = substr($miData, 0, -1);
    $miData .="]";
    $response['data']= $miData;
}else{
    $response['message'] = "No method GET.";
    $response['success'] = false;
}
echo json_encode($response);
?>