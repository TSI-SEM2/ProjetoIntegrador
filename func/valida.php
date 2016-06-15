<?php
require "../config/conecta.php";
session_start();
include('../integracao/loginFunc.php');
lidaBasicAuthentication ('../../portal/naoautorizado.php');


if(isset($_POST['btnSubmit'])){   //verifica se foi pressionado o botão de submit do formulário que o chamou.

	$usuario = $_POST['email']; // ajustando variaves passadas do form para uma variável Local no arquivo valida.
	$senha = $_POST['senha']; 
	
	if ( empty( $_POST['email'] ) || (empty( $_POST['senha'] ) ) ) { // AQUI Verificamos se os campos estao vazios, caso venha Vazio, retorna para o login.php
	
		$msg = "Você não preencheu todos os campos necessários para Acesso! ";
		header("location: ../professor/index.php?erro=$msg");
	
	} else { // AO ENTRAR NO ELSE , VALIDAMOS INICIALMENTE A CONEXAO COM BANCO E SEQUENCIALMENTE SE O OBTIDO NA CONSULTA EXISTE A CORRESPONDENCIA NA LINHA DA TABELA CONSULTADA.
	
		$query = "SELECT * FROM dbo.Professor WHERE email='$usuario' AND senha=HASHBYTES('SHA1','$senha')";		//		$stmt = odbc_prepare ($conexao, $query); 
		$result = odbc_exec ( $conexao, $query );
		
		if( $dados = odbc_fetch_array ($result)) { // nesse IF verificamos se houve correspondência da consulta definida na query
			/*  Nesse ponto estará logado corretamente, e entao colocamos os valores na SESSION para resgatarmos nos demais arquivos  */
			//var_dump($dados);
			$_SESSION["showMenu"] = TRUE;
			$_SESSION["codProfessor"] =  $dados['codProfessor'];
			$_SESSION["nomeProfessor"] = $dados['nome'];
			$_SESSION["tipoProfessor"] = $dados['tipo'];
			
			header("location: ../professor/index.php"); // redirecionamos ao arquivo a ser apresentado

		} else {			// se houve erro no login (ou seja, se deu FALSE na consulta , ocorrerá o redirect para a tela de login
			$msg = "Usuário ou Senha Inválidos!";
			header("location: ../professor/index.php?erro=$msg");
		}
	}
} else { // aqui evitamos o acesso direto ao arquivo e forçamos o redirect para a tela de Login.
	$msg = "Área Restrita!";
	header("location: ../professor/index.php?erro=$msg");
}

?>