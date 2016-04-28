<!DOCTYPE html>
<html>
<head>
<title>Login Professor</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Acesso ao sistema do QUIZ para Professores.">
	<meta name="author" content="Henrique , Paulo , Renato">

	<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
</head>
<body>
	<h4>Informe seus dados de acesso</h4>
		<?php
			if (isset($_GET['erro'])) {
				$msg = $_GET['erro'];
				echo "<p class='alert'>$msg</p>";
			}
		?>
	<form method="POST" action="../func/valida.php">
		<p>Email: <input type="text" name="email"/></p>
		<p>Senha: <input type="password" name="senha"/></p>
		<p><input type="submit" class="btn btn-info" name="btnSubmit" value="Enviar" role="button"></input></p>
	</form>
	
</body>
</html>