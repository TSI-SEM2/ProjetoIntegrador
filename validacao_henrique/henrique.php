<?php
$senha=$_POST['senha'];
$usuario=$_POST['usuario'];

//banco entra no array
$banco=array();
foreach($banco as usuariobanco => senhabanco){
	if((usuario==usuariobanco)&&(senha==senhabanco)){
		$_SESSION['showMenu']="logado";
		break;
	}
}
	if($_SESSION['showMenu']=="logado"){
		
	
		require_once "topo.php";
	}
	else{
		header(" location :login.php ");
	}
?>