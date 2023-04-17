<?php include 'headerIndex.php'; ?>

<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							

                        <form action="indexresp.php" method="POST" class="formIndex">
                            <label>Usuario</label>
                            <input type="text" name="usuario" value="">
                            <br>
                            <label>Contraseña</label>
                            <input type="password" name="password" value="">
                            <br>
                            <input type="submit" value="Aceptar" name="Aceptar">
                            <a class="buttonIndex" href="modificar.php?operacion=agregar">Nuevo Usuario</a>
                        </form>
                        





						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>