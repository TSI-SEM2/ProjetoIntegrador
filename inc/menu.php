<?php   
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 

if (!$_SESSION['showMenu']){
	header("Location: /professor/login.php");
}
if (isset($_SESSION['codProfessor'])) {	?>
<body>
<?php
	if (isset($_SESSION['showMenu'])) {
		if ($_SESSION['showMenu']) {
//essa declaração inicial verificamos se o usuário está autenticado .. SE AUTENTICADO , verá o Menu, senão redirecionado à tela de Login.php
?>			
		<div class="row">
			<div class="col-lg-2"><div></div></div>

			<div class="col-lg-8"><div>

				<nav class="navbar navbar-inverse">
					<!-- Link para a página INICIAL do Sistema -->
					<a class="navbar-brand" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/professor"><b>Administração</a></b>
					<!-- Menu reduzido de acordo com a Responsividade -->
					<div class="navbar-header sm-well">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
						<!-- CRUD Area -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Area<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/area/lista.php">Listar</a></li>
									<li><a href="/area/novo.php">Criar Novo</a></li>
								</ul>
							</li>
						<!-- CRUD Assunto -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Assunto <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/assunto/lista.php">Listar</a></li>
									<li><a href="/assunto/novo.php">Criar Novo</a></li>
								</ul>	
							</li>
						<!-- CRUD Tipo Questão -->	
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipo Questão<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/tipoQuestao/lista.php">Listar</a></li>
									<li><a href="/tipoQuestao/novo.php">Criar Novo</a></li>
								</ul>
							</li>
						<!-- CRUD Professor -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Professor <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/professor/usuarios/lista.php">Listar</a></li>
									<li><a href="/professor/usuarios/novo.php">Criar Novo</a></li>
								</ul>
							</li>
						
						</ul>
				<!-- Lado superior do Menu com o campo de Identificação de quem estará logado e o Link para SAIR do Sistema -->							
				<ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text navbar-right"> Olá <?php echo $_SESSION['nomeProfessor']; ?> </p></li>
					<li><a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/func/sair.php" >SAIR</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->
						</ul>	
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
	$msg = "Você não está autenticado, realize o Login para administrar os dados do sistema → <b><a href='..'>Clique aqui</a></b>.";
	return;
}
?>