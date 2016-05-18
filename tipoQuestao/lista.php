<?php 
session_start();
include "../config/conecta.php";
require "../inc/cabecalho.html";
?>

<body>
<?php	require "../inc/menu.php"; ?>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		
		<?php 
		if (isset($_GET['retorno'])) {
			echo "<p class='bg-success'>".$_GET['retorno']."</p>";
		}
		?>
		
    <table class='table table-bordered table-striped table-hover'>
      <thead>
        <th>Funcoes</th>
        <th>CodTipo Questao</th>
			  <th>Descricao</th>
			</thead>
      <?php
        $query = "SELECT * FROM TipoQuestao";
        if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
					//print_r($row);
						echo "<tr>
									<td>
									<a href='edita.php?cod=".$row['codTipoQuestao']."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a>
									<a href='remove.php?cod=".$row['codTipoQuestao']."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a>
									</td>
									<td>".$row['codTipoQuestao']."</td>
									<td>".$row['descricao']."</td>
								</tr>";
								
					}
        }

      ?>
    </table>
  </div>
</div>



</body>
</html>