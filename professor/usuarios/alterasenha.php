<?php 
session_start(); 
if($_SESSION["tipoProfessor"] != "A"){
	$refmsg = 4;
	header('Location: '.$basedir.'/professor/usuarios/lista.php?retorno='.$refmsg);
	exit;
}

include "../../config/conecta.php";
require "../../inc/cabecalho.html";
require "../../inc/menu.php";

if (isset($_GET['cod'])){
	
	$query = "	SELECT codProfessor	FROM Professor WHERE codProfessor = ".$_GET['cod'].";" ;
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);
		$codProfessor = $row['codProfessor'];
	}
}

if(isset($_POST['btnSubmit'])){
	
	$codProfessor = $_POST['codProfessor'];

	$senha = $_POST['senha'] ;
	$query = "	UPDATE 
					Professor 
				SET 	
					senha = HASHBYTES('SHA1','$senha') 
				WHERE 
					codProfessor = ".$codProfessor." ; ";
	$refmsg = 2;
	$inserelinha = odbc_exec($conexao, $query);
	header('Location: '.$basedir.'/professor/usuarios/edita.php?retorno='.$refmsg.'&cod='.$codProfessor);
	exit;
}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

	<form class="form-horizontal" method="POST" action="<?php echo $basedir;?>/professor/usuarios/alterasenha.php">
			<input type="hidden" name="codProfessor" value="<?php echo $codProfessor; ?>">

			<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-4">
				<input type="password" class="form-control" name="senha" placeholder="Senha" />
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