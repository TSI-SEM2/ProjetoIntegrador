<?php 
session_start(); 
include "../../config/conecta.php";
require "../../inc/cabecalho.html";

require "../../inc/menu.php";

if(isset($_POST['btnSubmit'])){

  $nome = $_POST['nome'] ;
  $email = $_POST['email'] ;
  $senha = $_POST['senha'] ;
  $idsenac = $_POST['idsenac'] ;
  $tipo = $_POST['tipoacesso'] ;
	
  $query = "INSERT 	INTO Professor (nome,email,senha,idsenac,tipo)
	          VALUES ('$nome','$email', HASHBYTES('SHA1','$senha'), '$idsenac' ,'$tipo');" ;

	$insere_ok = "Registro inserido com sucesso.";
	$inserelinha = odbc_exec($conexao, $query);
	header("Location: /professor/usuarios/lista.php?retorno=".$insere_ok);
	exit;

}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    <?php echo $msg;?>
    <form class="form-horizontal" method="POST" action="/professor/usuarios/novo.php">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Senha</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" name="senha" placeholder="Senha" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">IdSenac</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="idsenac" placeholder="IdSenac">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Perfil</label>
				<div class="col-sm-4">
					<div class="radio">
					<label class="col-sm-2 control-label"><input type="radio" name="tipoacesso" id="optionsRadios1" value="A"> Administrador	</label>
					</div>
					<div class="radio">
					<label class="col-sm-2 control-label"><input type="radio" name="tipoacesso" id="optionsRadios2" value="P" checked> Professor </label>
					</div>
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

<?php

   require "../../inc/rodape.html";

?>
</body>
</html>