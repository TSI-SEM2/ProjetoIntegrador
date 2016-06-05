<?php
require "../inc/cabecalho.html";
require "../func/func_msg.php";
?>

<body>
    <div class="container">
		<div class="header_pages">
			<h3 class="form-signin-heading ">Login do Professor</h3>
		</div>

		<hr>		
		<div class="body_presentation">		
		<form class="form-signin" method="POST" action="../func/valida.php">
			<?php
			if (isset($_GET['retorno'])) {
				RetornoMSG( $_GET['retorno'] , $_GET['cod'] ); 
				} elseif (isset($_GET['erro'])){
				LoginMSG( $_GET['erro']) ;
				}
			?>
			<label for="inputEmail" class="sr-only">Email</label>
				<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" autofocus /> 
			<label for="inputPassword" class="sr-only">Senha</label>
				<input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" />
			<button class="btn btn-lg btn-primary btn-block" name="btnSubmit" type="submit">Enviar</button>
		</form>
	
		</div>
	</div>
</body>
</html> 