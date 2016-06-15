<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: '.$basedir.'/area/lista.php?retorno='.$refmsg.'&cod=0');
}

if (isset($_GET['cod'])){	
	// Verifica nas tabelas relacionadas SE existe alguma Chave extrangeira Replicada na TABELA ASSUNTO
	$query = 'SELECT codArea FROM Assunto WHERE codArea = '.$_GET['cod'].'';
	$res = odbc_exec($conexao,$query);
	if (odbc_num_rows($res) > 0 ){
		$refmsg = 3;
		header('Location: '.$basedir.'/area/lista.php?retorno='.$refmsg.'&cod='.$_GET['cod']);
		exit;
	}
	//Executa a AÇÃO do REMOVE correspondente ao COD.da ÁREA
	$query = "DELETE FROM Area WHERE codArea = ".$_GET['cod'].";" ;
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else {
		$refmsg = 2;	//	Final desse bloco , passa  a informação de exito retornando para a página de listagem com essa confirmação.
		$atualizalinha = odbc_exec($conexao, $query);
		header('Location: '.$basedir.'/area/lista.php?retorno='.$refmsg.'&cod='.$_GET['cod']);
		exit;
	}
}
?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		<div class="alert alert-warning" role="alert"><p>Para remover um registro 
			<a href="<?php echo $basedir;?>/area/lista.php"
			<button type="button" class="btn btn-link"> ACESSE </button></a></p>
			<p>Ou então informe o parâmetro <b>?cod=</b>  na URL dessa página.</p>
		</div>
	</div>
</div>

</body>
</html>