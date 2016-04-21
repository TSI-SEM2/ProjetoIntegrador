<!DOCTYPE html>
<html>
<head>

	<title>Login Professor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Acesso ao sistema do QUIZ para Professores.">
    <meta name="author" content="Henrique , Paulo , Renato">
	
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css" />

    <link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
	
</head>
<body>
    <div class="container">
		<div class="header_pages">
			<h3 class="text-muted">Login do Professor</h3>
		</div>

		<hr>
		
		<div class="body_presentation">
			<h4>Informe seus dados de acesso</h4>
		
		<?php
			if (isset($_GET['erro'])) {
				$msg = $_GET['erro'];
				echo "<p class='alert'>$msg</p>";
			}
		?>
		
		<form method="POST" action="valida.php">
			<p>Email:  <input type="text" name="email"/></p>
			<p>Cod:  <input type="text" name="cod"/></p>
			<p><input type="submit" class="btn btn-mg btn-success" name="btnSubmit" value="Enviar" role="button"></input></p>
		</form>
	
		</div>
	</div>
</body>
</html>