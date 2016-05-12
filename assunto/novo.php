<?php 
//session_start(); 

include "../config/conecta.php";
require "../inc/cabecalho.html";

require "../inc/menu.php";

if(isset($_POST['btnSubmit'])){

  $descricao = $_POST['descricao'] ;
	$codarea = $_POST['codArea'];
	
	$stmt = odbc_prepare($conexao, "INSERT INTO Assunto (codArea,descricao)   
	VALUES (?,?)") ;
	$success= odbc_execute($stmt,array($codarea,$descricao));
	$insere_ok = "Registro inserido com sucesso.";
if ($success==true){
	echo"$insere_ok";
}	
	else{
		echo"Falha";
	}
	header("Location: /assunto/lista.php?retorno=".$insere_ok);
	exit;

}

?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
    <?php if(isset($msg)) echo $msg;?>
    <form class="form-horizontal" method="POST">
			<div><select name="codArea">
 			<?php
			$querya = "SELECT * FROM Area";
        if (!$res = odbc_exec($conexao,$querya)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
			  //exit($res);
					echo"<option value=".$row['codArea'].">".$row['descricao']."</option>\n";	
					}
				}
			?>
			</select></div>
			<div class="form-group">
        <label class="col-sm-2 control-label">descricao</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="descricao">
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