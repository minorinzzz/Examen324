
<?php include 'headerIndex.php'; ?>




        <!-- Start Slider  -->
        <section id="home" class="home">
            
                            <div class=" formcontainer">
<?php
include("conexion.inc.php");
$resultado = mysqli_query($con,"select * from inscripcion;");
$nro=1;
?>
<h1 style="color: #fff;">Estudiantes</h1>
<table border="1px">
    <tr>
        <td><strong>Nro</strong> </td>
        <td><strong>CI</strong>  </td>
        <td><strong>Nombre Completo</strong>  </td>
        <td><strong>Departamento</strong>  </td>
        <td><strong>Sigla</strong>  </td>
        <td><strong>Nota1</strong>  </td>
        <td><strong>Nota2</strong>  </td>
        <td><strong>Nota3</strong>  </td>
        <td><strong>Nota Final</strong>  </td>
        <td colspan="2"><strong>Operaciones</strong>  </td>
    </tr>
<?php
while($datos = mysqli_fetch_array($resultado)){
    echo "<tr>";
    echo "<td>".$nro."</td>";
    $CI=$datos["CIestudiante"];
    echo "<td>".$CI."</td>";
    $resultado2 = mysqli_query($con,"select * from persona;");
    while($datos2 = mysqli_fetch_array($resultado2)){
        if($CI == $datos2["CI"]){
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

<div class="botonesTable">

<a href="modificarIns.php?operacion=adicionar"><button>Adicionar</button></a>
<a href="index.php"><button>Cerrar Sesion</button></a>


</div>
</div>       
                   
                   </section>


<?php include 'footer.php'; ?>
    