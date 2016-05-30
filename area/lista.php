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
				<th></th>
        <!-- th>Código da Área</th -->
        <th>Descrição</th>
			</thead>
      <?php

        $query = "SELECT * FROM Area";
        if (!$res = odbc_exec($conexao,$query)) { /* error */} else{
          while( $row = odbc_fetch_array($res) ) {
            echo "<tr>
            <td>
							<a href='edita.php?cod=".$row[codArea]."'<button type='button' class='btn btn-primary btn-sm'>Editar</button></a>
							<a href='remove.php?cod=".$row[codArea]."'<button type='button' class='btn btn-danger btn-sm'>Apagar</button></a>
						</td>  
            <td>".$row[descricao]."</td>
            </tr>"; 
					}
				}
      ?>
    </table>
  </div>
</div>

</body>
</html>