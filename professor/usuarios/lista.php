<?php 
session_start();
include "../../config/conecta.php";
require "../../inc/cabecalho.html";
?>

<body>
<?php	require "../../inc/menu.php"; ?>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		
		<?php 
		if (isset($_GET['retorno'])) {
			echo "<p class='bg-success'>".$_GET['retorno']."</p>";
		}
		?>
		
    <table class='table table-bordered table-striped table-hover'>
      <thead>
        <th>Funções</th>
        <th>Nome Do Usuário</th>
        <th>Email</th>
        <th>Id Senac</th>
        <th>Tipo De Acesso</th>
			</thead>
      <?php

        $query = "SELECT * FROM Professor";
        if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
            if($row['email'] == 'claro@usp.br'){//correcao do erro de excluir o adm principal
							echo "<tr>
										<td>Admin Principal</td>
										<td>Admin</td>
        						<td>claro@usp.br</td>
										<td>000000</td>
										<td>A</td>
										</tr>";
							continue;
						}
						echo "<tr>";
            
						echo "<td>
						
						<a href='edita.php?cod=".$row[codProfessor]."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a>
						<a href='remove.php?cod=".$row[codProfessor]."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a>
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
  </div>
</div>



</body>