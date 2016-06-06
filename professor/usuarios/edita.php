<?php 
session_start(); 
include "../../config/conecta.php";
require "../../inc/cabecalho.html";
require	"../../func/func_msg.php";
require "../../inc/menu.php";

if (isset($_GET['cod'])){
	
	$query = "	SELECT codProfessor, nome, email, senha, idSenac, tipo
				FROM Professor WHERE codProfessor = ".$_GET['cod'].";" ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);
			
		$codProfessor = $row['codProfessor'];
		$nome = $row['nome'];
		$email = $row['email'];
		$senha = $row['senha'];
		$idsenac = $row['idSenac'];
		$tipo = $row['tipo'];		
	}
}

if(isset($_POST['btnSubmit'])){ // Caso selecionado o Radio Button em SIM para alteração de Senha efetua esse bloco
	$codProfessor = $_POST['codProfessor'];
	$nome = $_POST['nome'] ;
	$email = $_POST['email'] ;
	$senha = $_POST['senha'] ;
	$idsenac = $_POST['idsenac'] ;
	$tipo = $_POST['tipoacesso'] ;

	$query = "	UPDATE Professor 
				SET	
					nome = '".$nome."', 
					email = '".$email."',
					senha = HASHBYTES('SHA1','".$senha."'),
					idsenac = ".$idsenac.",
					tipo = '".$tipo."'	
				WHERE 
					codProfessor = ".$codProfessor." ; ";
	//exit($query);
	//	As linhas sequenciais que finalizam esse bloco , definem a informação de exito retornando para a página de listagem com essa confirmação.
	$refmsg = 2;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: /professor/usuarios/lista.php?retorno='.$refmsg.'&cod='.$codProfessor);
	exit;
}

?>

<body>

<div class="row">
	<div class="col-md-offset-2 col-md-8 content-center">

		<form class="form-horizontal" method="POST" action="/professor/usuarios/edita.php">
			<input type="hidden" name="codProfessor" value="<?php echo $codProfessor; ?>">
				<?php 
				if (isset($_GET['retorno'])) {
					RetornoMSG( $_GET['retorno'] , $_GET['cod'] ); 
				}
				?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>" >
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-4">
						<a href="/professor/usuarios/alterasenha.php?cod=<?php echo $codProfessor; ?>"><button type="button" class="btn btn-info form-control">Clique aqui para alterar a senha</button></a>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">IdSenac</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="idsenac" placeholder="IdSenac" value="<?php echo $idsenac; ?>" >
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-2 control-label">Perfil</label>
				<div class="col-sm-4">
					<div class="radio">
					<label class="col-sm-2 control-label">
						<input type="radio" name="tipoacesso" id="optionsRadios1" value="A" <?php if ($tipo == "A") echo "checked"; ?>> Administrador	</label>
					</div>
					<div class="radio">
					<label class="col-sm-2 control-label">
						<input type="radio" name="tipoacesso" id="optionsRadios2" value="P" <?php if ($tipo == "P") echo "checked"; ?>> Professor </label>
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


</body>
</html>