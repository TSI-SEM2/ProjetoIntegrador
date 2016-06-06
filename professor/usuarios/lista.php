<?php 
session_start();
include "../../config/conecta.php";
require "../../inc/cabecalho.html";
require "../../func/func_msg.php";
?>

<body>
<?php	require "../../inc/menu.php"; ?>

<div class="row">
	<div class="col-md-offset-2 col-md-8 content-center">
		
		<?php 
			if (isset($_GET['retorno'])) {
				RetornoMSG( $_GET['retorno'] , $_GET['cod'] ); 
				}
		?>
		
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
				
				$qtd_registros_por_pagina = 10;
				$qtd_paginas = 1;
				/* Recebe o número da página via parâmetro na URL */
				$pagina_atual = (isset($_GET['pag']) && is_numeric($_GET['pag'])) ? $_GET['pag'] : 1;
			
				/* Obtem quantidade de registos no banco */
				$query = "SELECT count(codProfessor) as qtd_professor FROM Professor";
        if (!$res = odbc_exec($conexao,$query)) {/* error */} else{
					if( $row = odbc_fetch_array($res) ) {
						$qtd_registros = $row['qtd_professor'];
					}
				}
				/* Cálcula qual será a última página */ 
				$qtd_paginas = ceil($qtd_registros / $qtd_registros_por_pagina);

				/* Cálcula qual será a página anterior em relação a página atual em exibição */ 
				$pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 : 1;

				/* Cálcula qual será a pŕoxima página em relação a página atual em exibição */ 
				$proxima_pagina = ($pagina_atual < $qtd_paginas) ? $pagina_atual +1 : $qtd_paginas; 
			
				$query = "WITH Paginado AS ";
				$query .= "(SELECT ROW_NUMBER() OVER(ORDER BY codProfessor ASC) AS linha, codProfessor, idSenac, tipo, nome, email FROM Professor)";
				$query .= "SELECT TOP (".$qtd_registros_por_pagina.") codProfessor, idSenac, tipo, nome, email ";
				$query .= "FROM Paginado ";
				$query .= "WHERE linha > ".$qtd_registros_por_pagina." * ({$pagina_atual} - 1)"; 
        if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
            if($row['email'] == 'claro@usp.br'){//correcao do erro de excluir o adm principal
							echo "<tr>";
							if($_SESSION["tipoProfessor"] == "A") echo "<td>Admin Principal</td>";
							echo "<td>Admin</td>";
							echo "<td>claro@usp.br</td>";
							echo "<td>000000</td>";
							echo "<td>A</td>";
							echo "</tr>";
							continue;
						}
						
						echo "<tr>";
            
						if($_SESSION["tipoProfessor"] == "A"){
							echo "<td>
											<a href='edita.php?cod=".$row['codProfessor']."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a>
											<a href='remove.php?cod=".$row['codProfessor']."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a>
										</td>";
						}
						echo	 '<td>'.$row['nome'].'</td>
										<td>'.$row['email'].'</td>
										<td>'.$row['idSenac'].'</td> 
										<td>'.$row['tipo'].'</td>
									</tr>'; 
          }
        }

      ?>
    </table>
		<nav>
			<ul class="pagination pagination ">
				<li><a href="./lista.php?pag=<?= $pagina_anterior; ?>" role="button" aria-label="anterior"><span aria-hidden="true">anterior</span></a></li>
				<li><a href="#">página <?= $pagina_atual; ?> de <?= $qtd_paginas; ?></a></li>
				<li><a href="./lista.php?pag=<?= $proxima_pagina; ?>" role="button" aria-label="próxima"><span aria-hidden="true">próxima</span></a></li> 
			</ul>
		</nav>
  </div>
</div>



</body>