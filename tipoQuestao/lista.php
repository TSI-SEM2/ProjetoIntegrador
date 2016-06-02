<?php 
session_start();
include "../config/conecta.php";
require "../inc/cabecalho.html";
require '../func/func_msg.php';
?>
<body>
<?php	require "../inc/menu.php"; ?>

<div class="row">
  <div class="col-md-offset-2 col-md-8 content-center">
		
		<?php
			RetornoMSG( $_GET['retorno'] , $_GET['cod'] );
		?>
	
    <table class='table table-bordered table-striped table-hover'>
      <thead>
        <?php if($_SESSION["tipoProfessor"] == "A"){ ?>
        	<th>Funcoes</th>
				<?php } ?>
        <th>CodTipo Questao</th>
			  <th>Descricao</th>
			</thead>
      <?php
        $query = "SELECT * FROM TipoQuestao";
        if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
						echo "<tr>";
							if($_SESSION["tipoProfessor"] == "A") {
								echo "<td>";
									echo "<a href='edita.php?cod=".$row['codTipoQuestao']."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a>";
									echo "<a href='remove.php?cod=".$row['codTipoQuestao']."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a>";
								echo "</td>";
							}
							echo "<td>".$row['codTipoQuestao']."</td>";
							echo "<td>".$row['descricao']."</td>";
						echo "</tr>";
								
					}
        }

      ?>
    </table>
  </div>
</div>

</body>
</html>