<?php   //essa declaração inicial verificamos se o usuário está autenticado .. SE AUTENTICADO , verá o Menu, senão redirecionado à tela de Login.php
session_start();
if (isset($_SESSION['codProfessor'])) {		?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css" />
		<!-- Aqui chamamos o nosso arquivo css externo -->
		<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
</head>
<body>
		
<?php  
	if (isset($_SESSION['showMenu'])){
		if ($_SESSION['showMenu']){
			?>			
			<div>  
				<ul class="menu">
					<li><a href="#">CRUD A</a></li>
					<li><a href="#">CRUD B</a></li>
					<li><a href="#">CRUD C</a></li>
					<li><a href="../func/sair.php">Sair</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->
				</ul>
			</div>	

<?php
		}
	}
?>

</body>
</html>

<?php 
} else {
	$msg = "Área Restrita!";
	header("location: login.php?erro='$msg'");
}
?>