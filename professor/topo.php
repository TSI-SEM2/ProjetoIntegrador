<?php   //essa declaração inicial verificamos se o usuário está autenticado .. SE AUTENTICADO , verá o Menu, senão redirecionado à tela de Login.php
session_start();
if (isset($_SESSION['codProfessor'])) {		?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
		<title>Dashboard</title>
		
		<!-- Aqui chamamos o css externo Bootstrap -->
		<link rel="stylesheet" type="text/css"  href="../css/bootstrap.min.css" />
		
		<!-- Aqui chamamos o nosso arquivo css externo -->
		<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
		
		<!-- Aqui requisitamos a Biblioteca do Bootstrap para funções JavaScript jQuery - Ex.: Dropdown-MENU | botao em Colapse -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		
</head>
<body>
		
<?php  
	if (isset($_SESSION['showMenu'])){
		if ($_SESSION['showMenu']){
			?>			

		<div class="row">
			<div class="col-lg-2"><div></div></div>
			<div class="col-lg-8"><div>
								
				<nav class="navbar navbar-inverse">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand" href="#">Administração</a>
					<div class="navbar-header sm-well">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD A<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Questões</a></li>
									<li><a href="#">Criar novo Registro</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD B<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Questões</a></li>
									<li><a href="#">Criar novo Registro</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD C<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Questões</a></li>
									<li><a href="#">Criar novo Registro</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="../func/sair.php" >SAIR</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
				
			</div></div>
			<div class="col-lg-2"><div></div></div>
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