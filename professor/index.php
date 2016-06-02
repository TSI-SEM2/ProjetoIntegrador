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
		
		Comming soon
		
  </div>
</div>


</body>
</html>