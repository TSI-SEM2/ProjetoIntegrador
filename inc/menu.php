<?php   //essa declaração inicial verificamos se o usuário está autenticado .. SE AUTENTICADO , verá o Menu, senão redirecionado à tela de Login.php
// session_start();

if (!$_SESSION['showMenu']){
	header("Location: /professor/login.php");
	die();
}

if (isset($_SESSION['codProfessor'])) {	?>

<body>

<?php  
	if (isset($_SESSION['showMenu'])) {
		if ($_SESSION['showMenu']) {
?>			
		<div class="row">
			<div class="col-lg-2"><div></div></div>

			<div class="col-lg-8"><div>

				<nav class="navbar navbar-inverse">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand" href="#"><b>Administração</b></a>
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Professor <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/professor/usuarios/lista.php">Listar</a></li>
									<li><a href="/professor/usuarios/novo.php">Criar Novo</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD A<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Dados</a></li>
									<li><a href="#">Criar Novo</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD B<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Dados</a></li>
									<li><a href="#">Criar Novo</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">CRUD C<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Listar Dados</a></li>
									<li><a href="#">Criar Novo</a></li>
								</ul>
							</li>
						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/func/sair.php" >SAIR</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->
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
	header("location: ../professor/index.php?erro='$msg'");
}
?>