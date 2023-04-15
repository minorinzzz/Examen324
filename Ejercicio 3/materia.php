
<?php include 'header.php'; ?>
<?php
// Obtener el valor del parámetro 'titulo' en la URL
$titulo = $_GET['titulo'];

// Definir los enlaces para cada carrera
if ($titulo == "Matemática") {
    $enlace = "http://portal.fcpn.edu.bo/fcpn-carrera-de-matematica/";
} elseif ($titulo == "Física") {
    $enlace = "http://portal.fcpn.edu.bo/carrera-fisica/";
} elseif ($titulo == "Informática") {
    $enlace = "http://portal.fcpn.edu.bo/fcpn-carrera-de-informatica/";
} elseif ($titulo == "Química") {
    $enlace = "http://portal.fcpn.edu.bo/fcpn-carrera-de-ciencias-quimicas/";
}

?>

<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Facultad de Ciencias Puras</p>
                            <h1><?php echo $titulo; ?></h1>
                            <div class="hero-btns">
                                <a href="<?php echo $enlace; ?>" class="boxed-btn">Ver Carrera</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Facultad de Ciencias Puras</p>
                            <h1><?php echo $titulo; ?></h1>
                            <div class="hero-btns">
                                <a href="<?php echo $enlace; ?>" class="boxed-btn">Ver Carrera</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Facultad de Ciencias Puras</p>
                            <h1><?php echo $titulo; ?></h1>
                            <div class="hero-btns">
                                <a href="<?php echo $enlace; ?>" class="boxed-btn">Ver Carrera</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end home page slider -->



        <?php include 'footer.php'; ?>