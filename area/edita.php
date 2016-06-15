<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";
require "../func/func_msg.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: '.$basedir.'/area/lista.php?retorno='.$refmsg.'&cod=0');
}

if (isset($_GET['cod'])){
	// Sessão onde buscamos o Cod correspondente ao item escolido
	$query = "SELECT * FROM Area WHERE codArea = ".$_GET['cod'].";" ;
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);		
		$codArea = $row['codArea'];
		$descricao = $row['descricao'];
	}
}
	//	Neste bloco, tratamos a informação recebida dessa mesma página por POST.
if(isset($_POST['btnSubmit'])){
  $codArea = $_POST['codArea'] ;
  $descricao = $_POST['descricao'] ;
	//	Definida a query a ser executada para o UPDATE da informação enviada via POST.
  $query = "UPDATE Area 
	SET	
		descricao = '$descricao'
	WHERE 
		codArea = $codArea;";
	//	As linhas sequenciais que finalizam esse bloco , definem a informação de exito retornando para a página de listagem com essa confirmação.
	$refmsg = 2;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: '.$basedir.'/area/lista.php?retorno='.$refmsg.'&cod='.$codArea);
	exit;
}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

		<form class="form-horizontal" method="POST" action="<?php echo $basedir;?>/area/edita.php">
			<input type="hidden" name="codArea" value="<?php echo $codArea; ?>">
			<!-- Início do Bloco com a informação principal do obtido na tela anterior 	-->
			<div class="form-group">
				<label class="col-sm-2 control-label">Área</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="descricao" placeholder="Area" value="<?php echo $descricao; ?>" >
				</div>
			</div>
			<!-- Sessãp do botão -->
			<div class="form-group">
				<div class="col-sm-6 content_center">
					<button type="submit" name="btnSubmit" class="btn btn-default">Enviar</button>
				</div>
			</div>

		</form>
		
  </div>
</div>


</body>
</html>