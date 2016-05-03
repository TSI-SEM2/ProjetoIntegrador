<?php require "../inc/cabecalho.html"; ?>
<body>
<div class="container">

	<form class="form-signin" method="POST" action="../func/valida.php">
		<?php
			if (isset($_GET['erro'])) {
				$msg = $_GET['erro'];
				echo "<p class='alert'>$msg</p>";
			}
		?>
		<h2 class="form-signin-heading">Informe seus dados:</h2>
		<label for="inputEmail" class="sr-only">Email</label>
		<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
		<label for="inputPassword" class="sr-only">Senha</label>
		<input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
		<button class="btn btn-lg btn-primary btn-block" name="btnSubmit" type="submit">Enviar</button>
	</form>

</div> <!-- /container -->
</body>
</html>