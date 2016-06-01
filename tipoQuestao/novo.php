<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if(isset($_POST['btnSubmit'])){

  $CodTipoQuestao = $_POST['codTipoQuestao'] ;
  $Descricao = $_POST['descricao'] ;
  
	$valida = "SELECT codTipoQuestao FROM TipoQuestao WHERE codTipoQuestao = '".$_POST['codTipoQuestao']."'; ";
	$valres = odbc_exec($conexao, $valida);
	$valued = odbc_fetch_array ($valres);
	if ($CodTipoQuestao == $valued['codTipoQuestao'] ){
		$refmsg = 5;
		header('Location: /tipoQuestao/lista.php?retorno='.$refmsg.'&cod='.$CodTipoQuestao);
	} else {
		$query = "INSERT 	INTO TipoQuestao (codTipoQuestao,descricao)
							VALUES ('$CodTipoQuestao','$Descricao');" ;	
		$refmsg = 1;
		$atualizalinha = odbc_exec($conexao, $query);
		header('Location: /tipoQuestao/lista.php?retorno='.$refmsg);
		exit;
	}
}
?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		
		<form class="form-horizontal" method="POST" action="/tipoQuestao/novo.php">
      
			<div class="form-group">
        <label class="col-sm-2 control-label">Código Tipo da Questao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="codTipoQuestao" placeholder="Letra Correspondente">
        </div>
      </div>
      
			<div class="form-group">
        <label class="col-sm-2 control-label">Descricao do Tipo da Questão</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Descrição do Tipo Questão">
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