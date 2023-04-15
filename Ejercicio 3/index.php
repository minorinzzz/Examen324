<html>
    <head>
        <title>Ejemplo formulario</title>
    </head>
    <body>
        <form action="indexresp.php" method="POST">
            <label>Usuario</label>
            <input type="text" name="usuario" value="">
            <br>
            <label>Contraseña</label>
            <input type="password" name="password" value="">
            <br>
            <input type="submit" value="Aceptar" name="Aceptar">
        </form>
        <a href="modificar.php?operacion=agregar"><button>Nuevo usuario</button></a>
    </body>
</html>