<?php   //essa declaração inicial verificamos se o usuário está autenticado .. SE AUTENTICADO , verá o Menu, senão redirecionado à tela de Login.php
session_start();
if ($_SESSION['showMenu'] == TRUE) {		?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
		<title>Dashboard</title>
		<!-- Aqui chamamos o nosso arquivo css externo -->
		<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
	</head>
	<body>
	<nav>
		<ul class="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#">Sobre</a></li>
				<li><a href="#">O que fazemos?</a>
					<ul>
						  <li><a href="#">Web Design</a></li>
						  <li><a href="#">SEO</a></li>
						  <li><a href="#">Design</a></li>                   
					</ul>
				</li>
			<li><a href="#">Links</a></li>
			<li><a href="../func/sair.php">Logoff</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->    
		</ul>
	</nav>
	</body>
	</html>
<?php 
} else {
	$msg = "Área Restrita!";
	header("location: login.php?erro='$msg'");
}
?>