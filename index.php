<?php
header( "HTTP/1.1 301 Moved Permanently" );
$refmsg = 2;
header ('Location: /professor/login.php?retorno='.$refmsg.'&cod=0');
exit(0);
?>