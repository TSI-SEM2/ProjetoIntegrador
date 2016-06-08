<?php
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: /tipoQuestao/lista.php?retorno='.$refmsg.'&cod=0');
}

if (isset($_GET['cod'])){
	
	$query = "SELECT * FROM TipoQuestao WHERE codTipoQuestao = '".$_GET['cod']."' ; " ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);
		
		$CodTipoQuestao = $row['codTipoQuestao'];
		$Descricao = $row['descricao'];
		}
}

if(isset($_POST['btnSubmit'])){

		$CodTipoQuestao = $_POST['codTipoQuestao'] ;
		$Descricao = $_POST['descricao'] ;

		$query = "UPDATE TipoQuestao  
								SET	descricao = '".$Descricao."'
							WHERE 
								codTipoQuestao = '".$CodTipoQuestao."' ; ";
		$refmsg = 2;
		$atualizalinha = odbc_exec($conexao, $query);
		header('Location: /tipoQuestao/lista.php?retorno='.$refmsg.'&cod='.$CodTipoQuestao);
		exit;
}

?>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    
		<form class="form-horizontal" method="POST" action="/tipoQuestao/edita.php" />
      
		<input type="hidden" name="codTipoQuestao" value="<?php echo $CodTipoQuestao; ?>" />
			
			<div class="form-group">
        <label class="col-sm-2 control-label">Descricao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Descricao" value="<?php echo $Descricao; ?>" />
        </div>
      </div>
      
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