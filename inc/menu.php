<?php   
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 

if (!$_SESSION['showMenu']){
	$refmsg = 2;
	header ('Location: '.$basedir.'/professor/login.php?erro='.$refmsg);
	exit;
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
					<a class="navbar-brand" href="<?php echo $basedir;?>/professor"><b>Administração</a></b>
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Área<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $basedir;?>/area/lista.php">Listar</a></li>
									<?php if($_SESSION["tipoProfessor"] == "A"){ ?>
										<li><a href="<?php echo $basedir;?>/area/novo.php">Criar Novo</a></li>
									<?php } ?>
								</ul>
							</li>
						<!-- CRUD Assunto -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Assunto<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $basedir;?>/assunto/lista.php">Listar</a></li>
									<?php if($_SESSION["tipoProfessor"] == "A"){ ?>
										<li><a href="<?php echo $basedir;?>/assunto/novo.php">Criar Novo</a></li>
									<?php } ?>
								</ul>	
							</li>
						<!-- CRUD Tipo Questão -->	
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipo Questão<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $basedir;?>/tipoQuestao/lista.php">Listar</a></li>
								</ul>
							</li>
						<!-- CRUD Professor -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Professor<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo $basedir;?>/professor/usuarios/lista.php">Listar</a></li>
									<?php if($_SESSION["tipoProfessor"] == "A"){ ?>
										<li><a href="<?php echo $basedir;?>/professor/usuarios/novo.php">Criar Novo</a></li>
									<?php } ?>
								</ul>
							</li>
						
						</ul>
				<!-- Lado superior do Menu com o campo de Identificação de quem estará logado e o Link para SAIR do Sistema -->
				<ul class="nav navbar-nav navbar-right">
					<li><p class="navbar-text navbar-right"> Olá <?php echo $_SESSION['nomeProfessor']; ?> </p></li>
					<li>&ensp;</li>
					<li><a href="<?php echo $basedir;?>/func/sair.php" >SAIR</a></li> <!-- Aqui definimos a um arquivo único referenciado para o Logoff destruindo a sessao -->
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
	$refmsg = 2;
	header ('Location: '.$basedir.'/professor/login.php?erro='.$refmsg);
}
?>