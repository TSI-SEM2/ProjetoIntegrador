<?php 
session_start(); 
include "../../config/conecta.php";
require "../../inc/cabecalho.html";
require "../../inc/menu.php";

if (isset($_GET['cod'])){
	
	$query = "DELETE FROM Professor WHERE codProfessor = ".$_GET['cod'].";" ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		// $row = odbc_fetch_array($res);	
		$removido = "Removido o ID <b>".$_GET['cod']."</b>";
		$atualizalinha = odbc_exec($conexao, $query);
		header("Location: /professor/usuarios/lista.php?retorno=".$removido);
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