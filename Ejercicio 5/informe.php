

<?php include 'headerIndex.php'; ?>

	<!-- hero area -->
    <section id="home" class="home">
            
            <div class=" formcontainer">
<?php
include("conexion.inc.php");
$resultado = mysqli_query($con,"select 
sum(case when departamento='01' then cantidad else 0 end) as LA_PAZ,
sum(case when departamento='02' then cantidad else 0 end) as COCHABAMBA,
sum(case when departamento='03' then cantidad else 0 end) as ORURO,
sum(case when departamento='04' then cantidad else 0 end) as CHUQUISACA,
sum(case when departamento='05' then cantidad else 0 end) as BENI,
sum(case when departamento='06' then cantidad else 0 end) as TARIJA,
sum(case when departamento='07' then cantidad else 0 end) as POTOSI,
sum(case when departamento='08' then cantidad else 0 end) as SANTA_CRUZ,
sum(case when departamento='09' then cantidad else 0 end) as PANDO
from 
(
SELECT distinct p.departamento, count(e.idInscripcion) as cantidad
FROM persona p, usuario u, inscripcion e
where u.rol='ESTUDIANTE'
and u.CI = p.CI
and e.CIestudiante = p.CI
group by p.departamento) as depto;");

$resultado2 = mysqli_query($con,"select 
sum(case when departamento='01' then cantidad else 0 end) as LA_PAZ,
sum(case when departamento='02' then cantidad else 0 end) as COCHABAMBA,
sum(case when departamento='03' then cantidad else 0 end) as ORURO,
sum(case when departamento='04' then cantidad else 0 end) as CHUQUISACA,
sum(case when departamento='05' then cantidad else 0 end) as BENI,
sum(case when departamento='06' then cantidad else 0 end) as TARIJA,
sum(case when departamento='07' then cantidad else 0 end) as POTOSI,
sum(case when departamento='08' then cantidad else 0 end) as SANTA_CRUZ,
sum(case when departamento='09' then cantidad else 0 end) as PANDO
from 
(
SELECT distinct p.departamento, SUM(e.notaFinal) as cantidad
FROM persona p, usuario u, inscripcion e
where u.rol='ESTUDIANTE'
and u.CI = p.CI
and e.CIestudiante = u.CI
group by p.departamento) as depto;");

$nro=1;
?>

<h1 style="color: #fff;">Media de notas por Departamento</h1>
<table border="1px">
    <tr>
        <td><strong>La Paz</strong>  </td>
        <td><strong>Cochabamba</strong></td>
        <td><strong>Santa Cruz</strong></td>
        <td><strong>Beni</strong></td>
        <td><strong>Pando</strong></td>
        <td><strong>Tarija</strong></td>
        <td><strong>Chuquisaca</strong></td>
        <td><strong>Oruro</strong></td>
        <td><strong>Potosi</strong></td>
    </tr>

<?php
$datos = mysqli_fetch_array($resultado);
$datos2 = mysqli_fetch_array($resultado2);
if($datos["LA_PAZ"]==0) $LP=0;
else $LP=$datos2["LA_PAZ"]/$datos["LA_PAZ"];

if($datos["SANTA_CRUZ"]==0) $SC=0;
else $SC=$datos2["SANTA_CRUZ"]/$datos["SANTA_CRUZ"];

if($datos["POTOSI"]==0) $PO=0;
else $PO=$datos2["POTOSI"]/$datos["POTOSI"];

if($datos["BENI"]==0) $BN=0;
else $BN=$datos2["BENI"]/$datos["BENI"];

if($datos["ORURO"]==0) $OR=0;
else $OR=$datos2["ORURO"]/$datos["ORURO"];

if($datos["PANDO"]==0) $PD=0;
else $PD=$datos2["PANDO"]/$datos["PANDO"];

if($datos["CHUQUISACA"]==0) $CH=0;
else $CH=$datos2["CHUQUISACA"]/$datos["CHUQUISACA"];

if($datos["TARIJA"]==0) $TJ=0;
else $TJ=$datos2["TARIJA"]/$datos["TARIJA"];

if($datos["COCHABAMBA"]==0) $CB=0;
else $CB=$datos2["COCHABAMBA"]/$datos["COCHABAMBA"];

echo "<tr>";
echo "<td>".$LP."</td>";
echo "<td>".$CB."</td>";
echo "<td>".$SC."</td>";
echo "<td>".$BN."</td>";
echo "<td>".$PD."</td>";
echo "<td>".$TJ."</td>";
echo "<td>".$CH."</td>";
echo "<td>".$OR."</td>";
echo "<td>".$PO."</td>";
echo "</tr>";
?>
</table>

<a href="listado.php"><button>Volver</button></a>
</div>       
</div>       
                   
                   </section>


<?php include 'footer.php'; ?>
    