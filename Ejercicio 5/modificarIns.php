<?php
include "conexion.inc.php";
if(isset($_GET["operacion"])){
    $sql="SELECT max(idInscripcion) as idInscripcion FROM inscripcion;";
    $resultado=mysqli_query($con,$sql);
    $datos=mysqli_fetch_array($resultado);
    $id=$datos["idInscripcion"]+1;
    $CI="";
    $nota1="";
    $nota2="";
    $nota3="";
    $sigla="";
    $notaFinal="";
    $nombre="";
}else{ 
    //Editando datos
    $id=$_GET["id"];
    $sql="SELECT * FROM inscripcion where idInscripcion=$id;";
    $resultado=mysqli_query($con,$sql);
    $datos=mysqli_fetch_array($resultado);
    $CI=$datos["CIestudiante"];
    $nota1=$datos["nota1"];
    $nota2=$datos["nota2"];
    $nota3=$datos["nota3"];
    $notaFinal=$datos["notaFinal"];
    $sigla=$datos["sigla"];
    $sql="SELECT * FROM persona where CI=$CI;";
    $resultado=mysqli_query($con,$sql);
    $datos2=mysqli_fetch_array($resultado);
    $nombre=$datos2["nombreCompleto"];
}
?>



<?php include 'headerIndex.php'; ?>


        <section id="home" class="home">
            <div class=" formcontainer">


<form action="modificarInsG.php" method="POST" class="formModificar">
<label for="">idInscripcion</label>

<?php
    if(isset($_GET["operacion"])) echo '<input type="hidden" name="operacion" id="" value="operacion" />';
?>

<input type="text" name="id" id="" value="<?php echo $id;?>" readonly required>
<br>

<?php
    if($nombre!=""){
?>
<label for="">CI</label>
<input type="number" name="CI" id="" value="<?php echo $CI;?>" readonly>
<br>
<label for="">Nombre Completo</label>
<input type="text" name="nombre" id="" value="<?php echo $nombre;?>" readonly>
<br>

<?php
    }else{
        echo "<label for=''>Estudiante</label><select name='CI' id='' required>";
        $resultado = mysqli_query($con,"select * from usuario;");
        while($datos = mysqli_fetch_array($resultado)){
            if($datos["ROL"]=="ESTUDIANTE"){
                $resultado2 = mysqli_query($con,"select * from persona;");
                while($datos2 = mysqli_fetch_array($resultado2)){
                    if($datos["CI"]==$datos2["CI"]){
                        $nombre=$datos2["nombreCompleto"];
                        break;
                    }
                }
            echo "<option value=".$datos["CI"].">".$nombre."</option>";
            }
        }
        echo "</select>";
    }
?>
<br>
<label for="">Nota 1</label>
<input type="number" name="nota1" id="" value="<?php echo $nota1;?>" required>
<br>
<label for="">Nota 2</label>
<input type="number" name="nota2" id="" value="<?php echo $nota2;?>" required>
<br>
<label for="">Nota 3</label>
<input type="number" name="nota3" id="" value="<?php echo $nota3;?>" required>
<br>
<label for="">Sigla</label>
<input type="text" name="sigla" id="" value="<?php echo $sigla;?>" required>
<br>
<input type="submit" value="aceptar" name="aceptar">
</form>
<a href="listado.php"><button>Cancelar</button></a>

</div>       
                   
                   </section>


<?php include 'footer.php'; ?>
    