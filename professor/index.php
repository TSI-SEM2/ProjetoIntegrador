<?php 
session_start(); 
include "../config/conecta.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"  href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css"  href="../css/estilo.css" />
	<link rel="stylesheet" href="../css/rodape.css">


</head>
<body>

<?php
		if (isset($_SESSION['showMenu'])){
			if ($_SESSION['showMenu']){
				require "../inc/topo.php";
				$_SESSION['logado'] = TRUE ;
			}
		}

?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  
	<?php
		if ($_SESSION['logado'] != TRUE){
			require "login.php";
		} else {
			echo "OK";
		}
	?>
  
  </div>
  <div class="col-md-2"></div>
</div>
<?php

   require "../inc/rodape.html";

?>
</body>
</html>