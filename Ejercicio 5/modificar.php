<?php
include "conexion.inc.php";
if(isset($_GET["operacion"])){
    $CI="";
    $usuario="";
    $password="";
    $nombre="";
    $fechaNac="";
    $telefono="";
    $departamento="";
    $rol ="";
}else{ 
    //Editando datos
    $CI=$_GET["CI"];
    $sql="SELECT * FROM persona where CI=$CI";
    $resultado=mysqli_query($con,$sql);
    $datos=mysqli_fetch_array($resultado);
    $id=$datos["id"];
    $nombre=$datos["nombreCompleto"];
    $fechaNac=$datos["fechaDeNacimiento"];
    $telefono=$datos["telefono"];
    $departamento=$datos["departamento"];
    $sql2="SELECT * FROM usuario where CI=$CI";
    $resultado2=mysqli_query($con,$sql2);
    $datos2=mysqli_fetch_array($resultado2);
    $usuario=$datos2["usuario"];
    $password=$datos2["password"];
    $rol=$datos2["rol"];
}
?>
<?php include 'headerIndex.php'; ?>



<!-- Start Slider  -->
<section id="home" class="home">
    
                    <div class=" formcontainer">

                        <form action="modificarG.php" method="POST" class="formIndex">
                            <label for="">CI</label>

                            <?php
                                if(isset($_GET["operacion"])) echo '<input type="hidden" name="operacion" id="" value="operacion" />';
                            ?>

                            <input type="number" name="CI" id="" value="<?php echo $CI;?>" <?php if(!isset($_GET["operacion"])) echo "readonly";?> required>
                            <br>

                            <label for="">Nombre Completo</label>
                            <input type="text" name="nombre" id="" value="<?php echo $nombre;?>">
                            <br>
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNac" id="" value="<?php echo $fechaNac;?>">
                            <br>
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" id="" value="<?php echo $telefono;?>">
                            <br>
                            <label for="">Departamento (Tamaño: 2, Solo numeros)</label>
                            <input type="text" name="departamento" id="" pattern="[0-9]{0,2}" maxlength="2" value="<?php echo $departamento;?>">
                            <br>
                            <label for="">Usuario</label>
                            <input type="text" name="usuario" id="" value="<?php echo $usuario;?>">
                            <br>
                            <label for="">Password</label>
                            <input type="password" name="password" id="" value="<?php echo $password;?>">
                            <br>
                            <label for="">Rol</label>
                            <select name="rol" id="">
                                <option value="ESTUDIANTE">Estudiante</option>
                                <option value="DIRECTOR">Director</option>
                            </select>
                            <br>
                            <input type="submit" value="aceptar" name="aceptar">
                            <input type="submit" value="cancelar" name="cancelar">
                        </form>   
                    </div>       
           
</section>
  <!-- End Slider  -->






<?php include 'footer.php'; ?>
