<?php
include('../conexion.inc.php');
$response = array('success' => false, 'message' => '' );
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql1="select usuario,password from usuario;";
    $usuario=$_POST["usuario"];
    $password = $_POST["password"];
    $ress = mysqli_query($con,$sql1);
    $existe=false;
    foreach($ress as $filass){
        if($usuario == $filass["usuario"] && $password == $filass["password"]){
            $response['message'] = "Consulta realizada con éxito";
            $response['success'] = true;
            $CI=$_POST["CI"];
            $telefono=$_POST["telefono"];
            $departamento=$_POST["departamento"];
            $fechaDeNacimiento=$_POST["fechaDeNacimiento"];
            $nombreCompleto=$_POST["nombreCompleto"];
            
            $sql="update persona 
            set nombreCompleto='$nombreCompleto',fechaDeNacimiento='$fechaDeNacimiento',
            telefono='$telefono',departamento='$departamento'
            where CI=$CI;";
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