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
			RetornoMSG( $_GET['retorno'] , $_GET['cod'] );
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

        $query = "SELECT * FROM Professor";
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
  </div>
</div>



</body>