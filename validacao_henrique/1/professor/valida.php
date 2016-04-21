<?php
include "../config/conecta.php";
session_start();

if(isset($_POST['btnSubmit'])){   //verifica se foi pressionado o botão de submit do formulário que o chamou.

	$usuario = $_POST['email']; // ajustando variaves passadas do form para uma variável Local no arquivo valida.
	$senha = $_POST['cod']; 
	
	if ( empty( $_POST['email'] ) || (empty( $_POST['cod'] ) ) ) { // AQUI Verificamos se os campos estao vazios, caso venha Vazio, retorna para o login.php
	
		$msg = "Você não preencheu todos os campos necessários para Acesso! ";
		header("location: login.php?erro='$msg'");
	
	} else { // AO ENTRAR NO ELSE , VALIDAMOS INICIALMENTE A CONEXAO COM BANCO E SEQUENCIALMENTE SE O OBTIDO NA CONSULTA EXISTE A CORRESPONDENCIA NA LINHA DA TABELA CONSULTADA.
	
		$query = "SELECT * FROM dbo.Professor WHERE email='$usuario' AND codProfessor='$senha'";
		$stmt = odbc_prepare ($conexao, $query); 
		$banco = odbc_execute ($stmt);
		
		if( odbc_fetch_row ($stmt)) { // nesse IF verificamos se houve correspondência da consulta definida na query
			/*  Nesse ponto estará logado corretamente, e entao colocamos os valores na SESSION para resgatarmos nos demais arquivos  */
			$_SESSION["showMenu"] = true;
			$_SESSION["codProfessor"] =  $banco['codProfessor'];
			$_SESSION["nomeProfessor"] = $banco['nome'];
			$_SESSION["tipoProfessor"] = $banco['tipo'];
			header("location: topo.php"); // redirecionamos ao arquivo a ser apresentado

		} else {			// se houve erro no login (ou seja, se deu FALSE na consulta , ocorrerá o redirect para a tela de login
			$msg = "Usuário ou Senha Inválidos!";
			header("location: login.php?erro='$msg'");
		}
	}
} else { // aqui evitamos o acesso direto ao arquivo e forçamos o redirect para a tela de Login.
	$msg = "Área Restrita!";
	header("location: login.php?erro='$msg'");
}

?>