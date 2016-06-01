<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

//	Aqui se recebe a referencia do codigo via GET para trazer do banco a correspondência exata.
if (isset($_GET['cod'])){
 
	$query = "SELECT * FROM Assunto WHERE codAssunto = ".$_GET['cod'].";" ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);
		// dos dados retornados 
		$codAssunto = $row['codAssunto'];
		$descricao = $row['descricao'];
		
	}
}

if(isset($_POST['btnSubmit'])){
  //exit(print_r($_POST));
  $descricao = $_POST['descricao'];
	$codArea = $_POST['codArea'];
	
  $query = "UPDATE Assunto 
						SET
							descricao = '".$descricao."', codArea = ".$codArea."
						WHERE 
							codAssunto = $codAssunto";
	$refmsg = 2;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: /assunto/lista.php?retorno='.$refmsg.'&cod='.$codAssunto);
	exit;
}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

		<form class="form-horizontal" method="POST" action="/assunto/edita.php">
    
			<input type="hidden" name="codAssunto" value="<?php echo $codAssunto; ?>">
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Descrição do Assunto</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="descricao" placeholder="Descricao" value="<?php echo $descricao; ?>" >
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Area Relacionada do Assunto</label>
				<div class="col-sm-4">
					<select class="form-control" name="codArea">

						<?php
						$queryA = "SELECT * FROM Area";

						if (!$res = odbc_exec($conexao,$queryA)) { /* error */} else{

								while( $Arow = odbc_fetch_array($res) ) {

									if ( $row['codArea'] == $Arow['codArea'] ) {
										echo"<option value=".$Arow['codArea']." selected>".$Arow['descricao']."</option>\n";	
									} else {
									echo"<option value=".$Arow['codArea'].">".$Arow['descricao']."</option>\n";	
									}

								}

							}

						?>

					</select>
				</div>
			</div>
			
      <div class="col-sm-6 content_center">
      	<button type="submit" name="btnSubmit" class="btn btn-default">Enviar</button>
      </div>
	
		</form>
  </div>
</div>

</body>
</html>