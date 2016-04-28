<?php require "../config/conecta.php"  ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<title>PI 2º Semestre - Criar Acesso</title>
</head>
<body>
  

<form method="POST" action="incluir.php">
  <p>Nome:  <input type="text" name="nome"/></p>
  <p>Email:  <input type="text" name="email"/></p>
  <p>Senha:  <input type="password" name="senha"/></p>
  <p>IdSenac:  <input type="text" name="idsenac"/></p>
  <p>Tipo de Acesso:  <input type="text" name="tipoacesso"/></p>
  <p><input type="submit" class="btn btn-mg btn-info" name="btnSubmit" value="Enviar" role="button"></input></p>
</div></div></div>

<?php

$nome = $_POST['nome'] ;
$email = $_POST['email'] ;
$senha = $_POST['senha'] ;
$idsenac = $_POST['idsenac'] ;
$tipo = $_POST['tipoacesso'] ;

$query = "INSERT INTO Professor (nome,email,senha,tipo) VALUES ('$nome','$email', HASHBYTES('SHA1','$senha') ,'$tipo');" ;

if(isset($_POST['btnSubmit'])){
	$inserelinha = odbc_exec($conexao, $query) ;
	echo "<span class='label label-sucess'><h3>Voce inseriu os dados:<h3></p>";
	//print_r ($_POST);
	echo "<br>Nome: ".$_POST['nome']."<br>Email: ".$_POST['email']."<br>Senha: ".$_POST['senha']."<br>ID Senac: ".$_POST['idsenac']."<br> Tipo: ".$_POST['tipo'];
} elseif(odbc_error()){
	echo odbc_errormsg($conexao);
}

?>

<hr>
<button class="well-lg btn-info" name="btnList">Dados na tabela Professor</button>

<?php
if(isset($_POST['btnList'])){
	require "list.php";
}
?>


</body>
</html>