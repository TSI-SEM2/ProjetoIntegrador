<?php
require "../inc/cabecalho.html";
require "../func/func_msg.php";
?>

<body>
    <div class="container">
		<div class="header_pages">
			<h3 class="text-muted">Login do Professor</h3>
		</div>

		<hr>
		
		<div class="body_presentation">
			<h4>Informe seus dados de acesso</h4>
		
		<?php
			RetornoMSG( $_GET['retorno'] , $_GET['cod'] );
			LoginMSG( $_GET['erro']) ;
		?>
		
		<form method="POST" action="../func/valida.php">
			<p>Email:  <input type="text" name="email"/></p>
			<p>Senha:  <input type="password" name="senha"/></p>
			<p><input type="submit" class="btn btn-mg btn-success" name="btnSubmit" value="Enviar" role="button"></input></p>
		</form>
	
		</div>
	</div>
</body>
</html> 