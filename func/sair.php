<?php 
session_start();
session_destroy();
header("location: ../professor/index.php")
?>