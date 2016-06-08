<?php 
session_start(); 
include "../../config/conecta.php";
require "../../inc/cabecalho.html";
require "../../inc/menu.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: /professor/usuarios/lista.php?retorno='.$refmsg.'&cod=0');
}

if (isset($_GET['cod'])){
	
	$query = 'SELECT codProfessor FROM Evento WHERE codProfessor = '.$_GET['cod'].'';
	$res = odbc_exec($conexao,$query);
	if (odbc_num_rows($res) > 0 ){
		$refmsg = 3;
		header('Location: /professor/usuarios/lista.php?retorno='.$refmsg.'&cod='.$_GET['cod']);
		exit;
	}
	
	$query = 'SELECT codProfessor FROM Questao WHERE codProfessor = '.$_GET['cod'].'';
	$res = odbc_exec($conexao,$query);
	if (odbc_num_rows($res) > 0 ){
		$refmsg = 3;
		header('Location: /professor/usuarios/lista.php?retorno='.$refmsg.'&cod='.$_GET['cod']);
		exit;
	}
		
	$query = "DELETE FROM Professor WHERE codProfessor = ".$_GET['cod'].";" ;
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
	$refmsg = 2;
	$remove = odbc_exec($conexao, $query);
	header('Location: /professor/usuarios/lista.php?retorno='.$refmsg.'&cod='.$_GET['cod']);
	exit;
	}
}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		<div class="alert alert-warning" role="alert"><p>Para remover um registro 
			<a href=" <?php echo $_SERVER['DOCUMENT_ROOT'].'professor/usuarios/lista.php' ?> " 
			<button type="button" class="btn btn-link"> ACESSE </button></a></p>
			<p>Ou então informe o parâmetro <b>?cod=</b>  na URL dessa página.</p>
		</div>
	</div>
</div>
   

</body>
</html>