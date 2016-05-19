<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if (isset($_GET['cod'])){
	
	$query = "SELECT * FROM Area WHERE codArea = ".$_GET['cod'].";" ;
	
	if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
		$row = odbc_fetch_array($res);		
		$codArea = $row[codArea];
		$descricao = $row[descricao];
	}
}

if(isset($_POST['btnSubmit'])){

  $codArea = $_POST['codArea'] ;
  $descricao = $_POST['descricao'] ;
	
  $query = "UPDATE Area 
	SET	
		descricao = '$descricao'
	WHERE 
		codArea = $codArea;";
	//exit($query);
	$update_ok = "Registro Alterado com sucesso.";
	$atualizalinha = odbc_exec($conexao, $query);
	header("Location: /area/lista.php?retorno=".$update_ok);
	exit;

}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    <?php echo $msg;?>
    <form class="form-horizontal" method="POST" action="/area/edita.php">
      <input type="hidden" name="codArea" value="<?php echo $codArea; ?>">

      <div class="form-group">
        <label class="col-sm-2 control-label">Area</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Area" value="<?php echo $descricao; ?>" >
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