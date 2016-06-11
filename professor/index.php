<?php 
session_start(); 
include "../config/conecta.php";
require "../inc/cabecalho.html";
require "../func/func_msg.php";




?>

<body>

<?php	

if (isset($_SESSION['showMenu'])){
	require "../inc/menu.php"; 
} else {
	$refmsg = 1;
	header ( 'Location: /professor/login.php?erro='.$refmsg.'&cod=');
	exit;
}	

?>

<div class="row">
	<div class="col-md-offset-2 col-md-8 content-center">

	<div class="jumbotron">
	
	<h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Últimos PROFESSORES cadastrados.</h2>
		<table class='table table-bordered table-striped table-hover'>
			<thead>
				<?php if($_SESSION["tipoProfessor"] == "A"){ ?>
				<th>Funções</th>
				<?php } ?>
				<th>Nome Do Usuário</th>
				<th>Email</th>
				<th>Id Senac</th>
				<th>Tipo De Acesso</th>
			</thead>
		
			<?php 

			 $query = "SELECT TOP 5 * FROM Professor ORDER BY codProfessor DESC"; 
			 if (!$res = odbc_exec($conexao,$query)) { /* error */} else{ 
			   while( $row = odbc_fetch_array($res) ) { 
				echo "<tr>"; 
				echo "<td>  
				<a href='edita.php?cod=".$row['codProfessor']."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a> 
				<a href='remove.php?cod=".$row['codProfessor']."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a> 
				</td>";   
				echo "<td>$row[nome]</td>";  
				echo "<td>$row[email]</td>";       
				echo "<td>$row[idSenac]</td>";  
				echo "<td>$row[tipo]</td>";  
				 
							echo "</tr>";  
			  } 
			} 

			?> 

		
		</table>
		<a class="btn btn-lg btn-primary" href="/professor/usuarios/lista.php" role="button">Clique para ver a lista de Professores</a>
	</p>
	</div>

	

	</div>
</div>
</div>

</body>
</html>