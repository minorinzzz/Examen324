<?php
if(isset($_POST["cancelar"])){
    header("Location: index.php");
}
else{
    include "conexion.inc.php";
    $id=$_POST["id"];
    $CI=$_POST["CI"];
    $CI=intval($CI);
    $nota1=$_POST["nota1"];
    $nota2=$_POST["nota2"];
    $nota3=$_POST["nota3"];
    $notaFinal=$nota1+$nota2+$nota3;
    $sigla=$_POST["sigla"];
    
    if(!isset($_POST["operacion"])){
        $sql="update inscripcion set CIestudiante=$CI,nota1='$nota1',nota2='$nota2',sigla='$sigla',notaFinal='$notaFinal',nota3='$nota3' where idInscripcion=$id;";
    }else{
        $sql="insert inscripcion(idInscripcion,CIestudiante,nota1,nota2,nota3,sigla,notaFinal) ";
        $sql.="values($id,$CI,$nota1,$nota2,$nota3,'$sigla',$notaFinal);";
    }
    mysqli_query($con,$sql);    
    header("Location: listado.php");
}
?>
