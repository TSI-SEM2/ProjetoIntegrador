<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if (isset($_GET['cod'])){
 
	$query = "SELECT * FROM Assunto WHERE codAssunto = ".$_GET['cod'].";" ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);
		
		$codAssunto = $row[codAssunto];
		$descricao = $row[descricao];
		
	}
}

if(isset($_POST['btnSubmit'])){
  
	//$codAssunto = $row[codAssunto];
  $descricao = $_POST['descricao'];
	
  $query = "UPDATE Assunto
						SET	
							descricao = '".$descricao."'
						WHERE 
							codAssunto = $codAssunto";
	
	$update_ok = "Registro Alterado com sucesso.";
	$atualizalinha = odbc_exec($conexao, $query);
	header("Location: /assunto/lista.php?retorno=".$update_ok);
	exit;

}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    <?php echo $msg;?>
    <form class="form-horizontal" method="POST" action="/assunto/edita.php">
      <input type="hidden" name="codAssunto" value="<?php echo $codAssunto; ?>">
			<div class="form-group">
        <label class="col-sm-2 control-label">Descricao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Descricao" value="<?php echo $descricao; ?>" >
        </div>
      </div>
        <div class="col-sm-6 content_center">
          <button type="submit" name="btnSubmit" class="btn btn-default">Enviar</button>
        </div>
      </div>
    </form>
  
</div>


</body>
</html>