<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../func/func_msg.php";
?>

<body>

<?php	
//die('test');
if (isset($_SESSION['showMenu'])){
	require "../inc/menu.php"; 
} else {
	$refmsg = 2;
	header ( 'Location: '.$basedir.'/professor/login.php?erro='.$refmsg.'&cod=');
	exit;
}	

?>

<div class="row">
	<div class="col-md-offset-2 col-md-8 content-center">

	<div class="jumbotron">
	
	<h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Últimos PROFESSORES cadastrados.</h2>
		<table class='table table-bordered table-striped table-hover'>
			<thead>
				<th>Nome Do Usuário</th>
				<th>Email</th>
			</thead>
		
			<?php 

			 $query = "SELECT TOP 5 * FROM Professor ORDER BY codProfessor DESC"; 
			 if (!$res = odbc_exec($conexao,$query)) { /* error */} else{ 
			   while( $row = odbc_fetch_array($res) ) { 
				echo "<tr>";  
				echo "<td>$row[nome]</td>";  
				echo "<td>$row[email]</td>";       
				echo "</tr>";  
			  } 
			} 

			?> 

		
		</table>
		<a class="btn btn-lg btn-primary" href="<?php echo $basedir; ?>/professor/usuarios/lista.php" role="button">Clique para ver a lista de Professores</a>
	</p>
	</div>

	

	</div>
</div>
</div>

</body>
</html>