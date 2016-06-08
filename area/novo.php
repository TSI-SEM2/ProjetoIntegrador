<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: /area/lista.php?retorno='.$refmsg.'&cod=0');
}

if(isset($_POST['btnSubmit'])){
	//	Bloco iniciado com base nos dados enviados por POST
  $codArea = $_POST['codArea'] ;
  $descricao = $_POST['descricao'] ;
 	//	Ajustados dados como variaveis de nome associativo, monta-se a Query
  $query = "INSERT INTO Area (descricao) VALUES ('$descricao');" ;
	//	As linhas sequenciais que finalizam esse bloco , definem a informação de exito retornando para a página de listagem com essa confirmação.
	$refmsg = 1;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: /area/lista.php?retorno='.$refmsg.'&cod=0');
	exit;
}
?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

    <form class="form-horizontal" method="POST" action="/area/novo.php">
      
			<div class="form-group">
        <label class="col-sm-2 control-label">Área</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Area">
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