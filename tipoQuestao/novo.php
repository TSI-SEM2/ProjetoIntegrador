<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";

require "../inc/menu.php";

if(isset($_POST['btnSubmit'])){

  $CodTipoQuestao = $_POST['codTipoQuestao'] ;
  $Descricao = $_POST['descricao'] ;
  	
  $query = "INSERT 	INTO TipoQuestao (codTipoQuestao,descricao)
	          VALUES ('$CodTipoQuestao','$Descricao');" ;

	//exit($query);
	
	$insere_ok = "Registro inserido com sucesso.";
	$inserelinha = odbc_exec($conexao, $query);
	header("Location: /tipoQuestao/lista.php?retorno=".$insere_ok);
	exit;

}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    <?php echo $msg;?>
    
		<form class="form-horizontal" method="POST" action="/tipoQuestao/novo.php">
      <div class="form-group">
        <label class="col-sm-2 control-label">CodTipoQuestao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="codTipoQuestao">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Descricao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Descricao">
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