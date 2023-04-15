
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
</head>
<body>
    

<?php
include("conexion.inc.php");
$resultado = mysqli_query($con,"select * from inscripcion;");
$nro=1;
?>
<h1>Estudiantes</h1>
<table border="1px">
    <tr>
        <td>Nro</td>
        <td>CI</td>
        <td>Nombre Completo</td>
        <td>Departamento</td>
        <td>Sigla</td>
        <td>nota1</td>
        <td>nota2</td>
        <td>nota3</td>
        <td>Nota Final</td>
        <td colspan="2">Operaciones</td>
    </tr>
<?php
while($datos = mysqli_fetch_array($resultado)){
    echo "<tr>";
    echo "<td>".$nro."</td>";
    $CI=$datos["CIestudiante"];
    echo "<td>".$CI."</td>";
    $resultado2 = mysqli_query($con,"select * from persona;");
    while($datos2 = mysqli_fetch_array($resultado2)){
        if($CI = $datos2["CI"]){
            echo "<td>".$datos2["nombreCompleto"]."</td>";
            echo "<td>".$datos2["departamento"]."</td>";
            break;
        }
    }
    echo "<td>".$datos["sigla"]."</td>";
    echo "<td>".$datos["nota1"]."</td>";
    echo "<td>".$datos["nota2"]."</td>";
    echo "<td>".$datos["nota3"]."</td>";
    echo "<td>".$datos["notaFinal"]."</td>";
    echo "<td><a href='modificarIns.php?id=".$datos["idInscripcion"]."'>Modificar</a></td>";
    echo "<td><a href='eliminar.php?id=".$datos["idInscripcion"]."'>Eliminar</a></td>";
    echo "</tr>";
    $nro=$nro+1;
}
?>
</table>
<a href="modificarIns.php?operacion=adicionar"><button>Adicionar</button></a>
<a href="index.php"><button>Cerrar Sesion</button></a>
</body>
</html>