<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if(isset($_POST['btnSubmit'])){

  $codArea = $_POST['codArea'] ;
  $descricao = $_POST['descricao'] ;
 	
  $query = "INSERT INTO Area (descricao) VALUES ('$descricao');" ;

	$refmsg = 1;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: /area/lista.php?retorno='.$refmsg);
	exit;
}
?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

    <form class="form-horizontal" method="POST" action="/area/novo.php">
      
			<div class="form-group">
        <label class="col-sm-2 control-label">Area</label>
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