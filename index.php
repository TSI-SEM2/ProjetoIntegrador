<?php
header( "HTTP/1.1 301 Moved Permanently" );
$refmsg = 2;
header ('Location: /professor/login.php');
exit(0);
?>