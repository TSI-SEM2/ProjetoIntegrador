<?php 
session_start();
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../inc/menu.php";

if ($_SESSION["tipoProfessor"] != 'A'){
	$refmsg = 4;
	header('Location: /assunto/lista.php?retorno='.$refmsg.'&cod=0');
}

if(isset($_POST['btnSubmit'])){  
	$descricao = $_POST['descricao'] ;
	$codarea = $_POST['codArea'];
	
	$stmt = odbc_prepare($conexao, "INSERT INTO Assunto (codArea,descricao) VALUES (?,?)") ;
	$success= odbc_execute($stmt,array($codarea,$descricao));
	
	$refmsg = 1;
	$atualizalinha = odbc_exec($conexao, $query);
	header('Location: /assunto/lista.php?retorno='.$refmsg.'&cod=0');
	exit;
}
?>

<body>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">

    <form class="form-horizontal" method="POST" action="/assunto/novo.php">
      
			<div class="form-group">
        <label class="col-sm-2 control-label">Descrição : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="descricao" placeholder="Descrição do Assunto">
        </div>
      </div>
			
			<div class="form-group">
        <label class="col-sm-2 control-label">Escolha a Área do Assunto : </label>
        <div class="col-sm-4">
					
					<select class="form-control" name="codArea"> 			
							<?php
							$querya = "SELECT * FROM Area";
								if (!$res = odbc_exec($conexao,$querya)) { /* error */} else{
								  while( $row = odbc_fetch_array($res) ) {
										echo"<option value=".$row['codArea'].">".$row['descricao']."</option>\n";	
									}
								}
							?>
						</select>
					
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